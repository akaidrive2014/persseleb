<?php
Class FeedCommand extends CConsoleCommand{
	public function run($args){
		if($args[0]=='shariveweb.com'){
			$this->shariveweb();
		}
		if($args[0]=='bolaokezone'){
			$this->bolaokezone();
		}
		if($args[0]=='goaldotcom'){
			$this->goaldotcom();
		}
	}
	
	public function shariveweb(){
		$XML = simplexml_load_file("http://shariveweb.com/sitemap.xml");
		$i=1;
		foreach($XML->url as $xml){
			$CHECK = SBFeed::model()->find(array('condition'=>'url=:url','params'=>array(':url'=>$xml->loc)));
			if($CHECK===NULL){
				$FeedData = simplexml_load_file("http://ftr.fivefilters.org/makefulltextfeed.php?url={$xml->loc}");
				$FeedData = $FeedData->channel->item;
				$title = explode('|',$FeedData->title);
				$url = $xml->loc;
				$image = $this->Takechar($FeedData->description);
				$content = $FeedData->description;
				$date = date('Y-m-d',strtotime($xml->lastmod));
				$source = "shariveweb.com";
				$Feed = New SBFeed;
				$Feed->title = $title[0];
				$Feed->url = $url;
				$Feed->image_thumb = $image;
				$Feed->content = strip_tags($content);//substr(strip_tags($content),0,500);
				$Feed->date = $date;
				$Feed->source = $source;
				$Feed->save();
			}
		$i++;
		}
	}
	
	//F:\LocalWebserver\htdocs\my-projects\khususbola\protected>yiic feed bolaokezone

	public function Takechar($val='') {

		// keywords are between *
		$str = $val;
		//$str = '<img src="http://cdn03.animenewsnetwork.com/thumbnails/max550x700/cms/news/68122/byevxexcuaadrdg.jpg-large.jpeg"><img src="http://cdn03.animenewsnetwork.com/thumbnails/max550x700/cms/news/68122/byevxexcuaadrdg.jpg-larg.jpeg">';
		//(preg_match_all('/\<a href="(.*?)\"/', $str, $match))
		if (preg_match_all('/\<a href="(.*png)\"/', $str, $match)) {
			 $img= ($match[1][0]);
		}elseif (preg_match_all('/\<a href="(.*jpg)\"/', $str, $match)) {
			 $img= ($match[1][0]);
		}
		//" <img src="www.com.com/image/image.jpg"> ";
		return  empty($img) ? NULL : str_replace('">','',strip_tags($img));
	}

	public function bolaokezone(){
		$XML = simplexml_load_file("http://sindikasi.okezone.com/index.php/bola/RSS2.0");
		$i=1;
		/*foreach($XML->channel->item as $xml) {
			echo '<div>'.$xml->link.'</div>';

		}exit;*/
		foreach($XML->channel->item as $xml){
			//exit($xml->category);
			//exit(date('Y-m-d H:i:s'));
			$CHECK = Yii::app()->db->createCommand("SELECT url FROM sb_news WHERE url='{$xml->link}'")->queryScalar();
			if(empty($CHECK)){
				$FeedData = file_get_contents("http://fivefilters.lc/makefulltextfeed.php?url={$xml->link}&max=5&links=preserve&exc=&format=json&submit=Create+Feed");
				$FeedData = json_decode($FeedData);
				//print_r($FeedData);
				$FeedData = $FeedData->rss->channel;
				$Content = $FeedData->item;
				$title = explode('::',$Content->title);
				$url = $xml->link;
				//$image = $this->Takechar($FeedData->description);
				$content = $Content->description;
				$date = date('Y-m-d H:i:s',strtotime($xml->pubDate));
				$source = "okezone.com";
				$Feed = New SBNews;
				$Feed->news_title = $title[0];
				$Feed->url = $url;
				$Feed->news_thumb_image = null;
				$Feed->news_content = $content;//strip_tags($content,'<b><p><u><i><strong><div><iframe><img>');//substr(strip_tags($content),0,500);
				$Feed->news_date = $date;
				$Feed->source = $source;
				$Feed->category_id = 1;
				$Feed->categories = array(1);
				$Feed->topic_category = $xml->category;
				//exit(CActiveForm::validate($Feed).'=='.$Content->title);
				if($Feed->validate()){
					$Feed->save();
				}
				//exit;
			}
		$i++;
		}
	}
	
	public function goaldotcom(){
		$XML = simplexml_load_file("http://www.goal.com/id-ID/feeds/news?fmt=rss");
		$i=1;
		foreach($XML->channel->item as $xml){
			//echo implode(',',$xml->category);exit;
			$categories = $xml->category;
			$categoriesArray = array();
			foreach($xml->category as $category){
				$categoriesArray[] =  $category;
			}
			$categories = (implode(",",$categoriesArray));
			$news_image_url=null;
			foreach($xml->children() as $enclosure){
				if(isset($enclosure['url'])){
					$news_image_url=$enclosure['url'];
				}
			}

			//exit($xml->title.'<br>'.$xml->pubDate.'<br>'.$xml->category);
			$CHECK = Yii::app()->db->createCommand("SELECT url FROM sb_news WHERE url='{$xml->link}'")->queryScalar();
			if(empty($CHECK)){
				$FeedData = file_get_contents("http://fivefilters.lc/makefulltextfeed.php?url={$xml->link}&max=5&links=preserve&exc=&format=json&submit=Create+Feed");
				$FeedData = json_decode($FeedData);
				$FeedData = $FeedData->rss->channel;
				$Content = $FeedData->item;
				$title = explode('::',$Content->title);
				$url = $xml->link;
				//$image = $this->Takechar($FeedData->description);
				$content = $Content->description;
				$date = date('Y-m-d H:i:s',strtotime($xml->pubDate));
				$source = "goal.com";
				$Feed = New SBNews;
				$Feed->news_title =$Content->title;
				$Feed->url = $url;
				$Feed->news_thumb_image = null;
				$Feed->news_content = $content;//strip_tags($content,'<a><b><p><u><i><strong><div><iframe>');//substr(strip_tags($content),0,500);
				$Feed->news_date = $date;
				$Feed->source = $source;
				$Feed->category_id = 1;
				$Feed->categories = array(1);
				$Feed->topic_category = $categories;
				$Feed->news_image_url = $news_image_url;
				//exit(CActiveForm::validate($Feed));
				if($Feed->validate()){
					$Feed->save();
				}
				//exit;
			}
			$i++;
		}
	}
	
}//abcassassassdasass