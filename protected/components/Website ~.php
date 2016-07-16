<?php
Class Website {
	public $name;
	public $title;
	public $keywords;
	public $description;
	public $favicon;
	public $logo;
	public $copyright;
	public $tagline;
	public $phone;
	public $contact;
	public $facebook;
	public $twitter;
	
	public $inject_code;
	public $og_facebook;
	public $og_twitter;
	public $google_analytic;
	
	private $db;
	public function __construct() {
		$this -> db = Yii::app() -> db;
	}
	
	public function defaultMeta() {
		$DATA =  Config::model()->findAll(array("order"=>'name ASC'));
		$WD = array();
		foreach($DATA as $value){
			$WD[$value->name] = $value->value;
		}
		foreach($WD as $key=>$val){		
			$this->{$key} = $val;
		}
		return;
		 
	}
	
	public function getSeoByMatchUrl(){
		$url = !empty(static::catchurl()) ? static::catchurl() : '/';
		return $seoMatchUrl = SBUrlseo::model()->find(array(
			'condition'=>'url_matched=:url AND is_active=:active',
			'params'=>array(
					':url'=>$url,
					':active'=>1
				)
			)
		);
	}
	
	public function seoMatchUrl(){		 
		$seoMatchUrl = $this->getSeoByMatchUrl();
		if(!empty($seoMatchUrl)){
			if(!empty($seoMatchUrl->seo_title)){
				$this->title = $seoMatchUrl->seo_title;
			}
			if(!empty( $seoMatchUrl->seo_keywords)){
				$this->keywords =  $seoMatchUrl->seo_keywords;
			}
			if(!empty($seoMatchUrl->seo_description)){
				$this->description =  $seoMatchUrl->seo_description;
			}	
		}
		return;
		
	}
	
	public function seoPage($page){
		$this->title = ucfirst($page->page_name);
		if(!empty($page->seo_title)){
			$this->title = $page->seo_title;
		}
		if(!empty($page->seo_keywords)){
			$this->keywords = $page->seo_keywords;
		}
		if(!empty($page->seo_description)){
			$this->description = $page->seo_description;
		}
		$this->seoMatchUrl();
		return;
	}
	
	public function seoPost($post){
		$this->title = ucfirst($post->news_title);
		if(!empty($post->seo_title)){
			$this->title = $post->seo_title;
		}
		if(!empty($post->seo_keywords)){
			$this->keywords = $post->seo_keywords;
		}
		if(!empty($post->seo_description)){
			$this->description = $post->seo_description;
		}
		$this->seoMatchUrl();
		return;
	}
	
	public function seoBlogCategory($category){
		$this->title = ucfirst($category->category_name);
		if(!empty($category->seo_title)){
			$this->title = $category->seo_title;
		}
		if(!empty($category->seo_keywords)){
			$this->keywords = $category->seo_keywords;
		}
		if(!empty($category->seo_description)){
			$this->description = $category->seo_description;
		}
		$this->seoMatchUrl();
		return;
	}
	
	/*slug url*/
	public static function slug($str, $separator = '-', $lowercase = TRUE) {
		if ($separator == 'dash') {
			$separator = '-';
		} else if ($separator == 'underscore') {
			$separator = '_';
		}
		$q_separator = preg_quote($separator);
		$trans = array('&.+?;' => '', '[^a-z0-9 _-]' => '', '\s+' => $separator, '(' . $q_separator . ')+' => $separator);
		$str = strip_tags($str);
		foreach ($trans as $key => $val) {
			$str = preg_replace("#" . $key . "#i", $val, $str);
		}
		if ($lowercase === TRUE) {
			$str = strtolower($str);
		}
		return trim($str, $separator);
	}
	
	public static function baseUrl(){
		return Yii::app()->getBaseUrl(TRUE);
	}
	
	public static function catchurl(){
		$request = parse_url($_SERVER['REQUEST_URI']);
		$path = $request["path"];
		return $result = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $path), '/');
	}

    public static function catchFullUrl(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    }
}
