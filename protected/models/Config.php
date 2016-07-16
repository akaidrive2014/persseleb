<?php
Class Config extends CActiveRecord{
	public $name;
	public $title;
	public $keywords;
	public $description;
	public $favicon;
	public $logo;
	public $copyright;
	public $tagline;
	public $phone;
	public $contact = array(
			'contact'=>array(
				'description'=>'',
				'address'=>'',
				'email'=>'',
				'skype'=>'',
				'mobile'=>'',
			),
	);
	public $facebook;
	public $twitter;
	
	public $inject_code;
	public $og_facebook;
	public $og_twitter;
	public $google_analytic;
	
	public $seoWebsite = array(
		'name','title','keywords','description','favicon','logo','logo','copyright','google_analytic','tagline','phone','contact','facebook','twitter',
	);
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'sb_config';
	}
	
	public function rules(){
		return array(
			array('name,title,logo','required'),
			array('keywords,description,copyright,google_analytic,favicon,inject_code,og_facebook,og_twitter,tagline,phone,facebook,twitter','safe')
		);
	}
	
	public function attributeLabels(){
		return array(
			'name'=>'Website name',
			'title'=>'Website title',
			'keywords'=>'Website keywords',
			'description'=>'Website description',
			'favicon'=>'Favicon',
			'logo'=>'Logo',
			'copyright'=>'Copyright',	
			'google_analytic'=>'Google Analytic Code',
			'tagline'=>'Tag Line',
			'phone'=>'Contact Number',
		);
	}

	public function saveSeoWebsite($value){
		foreach($this->seoWebsite as $var){
			$DATA = $this::model()->find(
				array(
						'condition'=>'name=:name',
						'params'=>array(':name'=>$var)
					)
			);
			if(!empty($DATA)){
				if($var!='contact'){
					$DATA->value  = $value->{$var};
					$DATA->save(FALSE);
				}
			}
		}
		return TRUE;
	}
	
	public function saveContact($value){
		foreach($this->seoWebsite as $var){
			$DATA = $this::model()->find(
				array(
						'condition'=>'name=:name',
						'params'=>array(':name'=>'contact')
					)
			);
			
			$DATA->value  = $value;
			$DATA->save(FALSE);
			
		}
		return TRUE;
	}
	
	
	public function data(){
		$DATA =  $this::model()->findAll(array("order"=>'name ASC'));
		$WD = array();
		foreach($DATA as $value){
			$WD[$value->name] = $value->value;
		}
		foreach($WD as $key=>$val){		
			$this->{$key} = $val;
		}
		return;
	}
}