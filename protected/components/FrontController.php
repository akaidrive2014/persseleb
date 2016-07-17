<?php
Class FrontController extends Controller{
    public $layout = "default";
	public $Website;
	
	public function init(){
		$this->Website = New Website;
		$this->Website->defaultMeta();
		$this->Website->seoMatchUrl();
	}
	
	public function getCategories($category_id){
		$DATA = SBNewsCategory::model()->findAll(array('condition'=>'category_id IN('.$category_id.')'));
		$categories = array();
		if(!empty($DATA)){
			foreach($DATA as $category){
				$categories[] = "<a href=\"{$category->url_link}\">{$category->category_name}</a>";
			}
			return implode(',',$categories);
		}
		return NULL;
	}
	
	public function getRandonNews(){
		return $DATA = SBNews::model()->findAll(
			array(
				'condition'=>'news_image_url IS NOT NULL',
				'order'=>'news_id DESC',
				'limit'=>3
			)
		);
	}

	public function getLatestNewsText(){
		return $DATA = SBNews::model()->findAll(
			array(
				//'condition'=>'news_image_url',
				'order'=>'news_id DESC',
				'limit'=>15
			)
		);
	}

	public function getLatestNewsFooter($limit){
		return $DATA = SBNews::model()->findAll(
			array(
				'condition'=>'source="goal.com"',
				'order'=>'news_id DESC',
				'limit'=>$limit
			)
		);
	}

	public function getBreakingNewsTicker($limit){
		return $DATA = SBNews::model()->findAll(
			array(
				'condition'=>'source="okezone.com"',
				'order'=>'news_id DESC',
				'limit'=>$limit,
			)
		);
	}

	public function getNewsTopPopular(){
		return $DATA = SBNews::model()->find(
			array(
				'order'=>'hits DESC',
				'limit'=>1,
			)
		);
	}
	
	public function getPagebySlug($slug){
		$model=SBPage::model()->find(array('condition'=>'page_slug=:page_slug','params'=>array(':page_slug'=>$slug)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getNewsbyId($id){
		$model=SBNews::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$model->hits+=1;
		$model->save(FALSE);
		return $model;
	}
	
	public function getGalleryById($id){
		$model=SBGallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function getNewsCategorybySlug($slug){
		$model=SBNewsCategory::model()->find(array('condition'=>'category_slug=:category_slug','params'=>array(':category_slug'=>$slug)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getNewsCategorybyID($id){
		$model=SBNewsCategory::model()->find(array('condition'=>'category_id=:category_id','params'=>array(':category_id'=>$id)));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function getFeedShariveweb($limit){
		return SBFeed::model()->findAll(array('order'=>'id DESC','limit'=>$limit));
	}
	
	public function getRandomPortofolio($limit){
		return SBGallery::model()->findAll(array('order'=>'RAND()','limit'=>$limit));
	}

	public function getRandomImage($limit){
		return SBImage::model()->findAll(array('order'=>'RAND()','limit'=>$limit));
	}

	public function getLatestProjects($limit){
		return SBGallery::model()->findAll(array('order'=>'gallery_id DESC','limit'=>$limit));
	}
	
	public function getAllBannersliders(){
		return SBBannerslider::model()->findAll(array('order'=>'positions ASC'));
	}
	
	public function getImageByGalleryID($id){
		return SBImage::model()->findAll(array(
			'condition'=>'gallery_id=:id',
			'params'=>array(':id'=>$id)));
	}
	
	/**
	 * Displays the contact page
	 */
	public function Contact(){
		$model=new ContactForm;
		$banner = SBModule::model()->findByPk(4);
		if($this->isAjax()){
			if(isset($_POST['ContactForm']))
			{
				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
					/*$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
					$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
					$headers="From: $name <{$model->email}>\r\n".
						"Reply-To: {$model->email}\r\n".
						"MIME-Version: 1.0\r\n".
						"Content-Type: text/plain; charset=UTF-8";

					mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
					Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
					*///$this->refresh();
                    $mail = New Mail;
                    $mail->send_to = '';
                    $mail->email_subject = $model->name.' | '.$model->subject;
                    $mail->message = nl2br($model->body);
                    $mail->message .= nl2br("<p style=\"font-style:italic;\">
                    Sender Info:
                        - Name : {$model->name}
                        - Email : {$model->email}
                        - Phone: {$model->phone}
                    </p>");
                    $mail->sendEmail();
                    exit(json_encode(array('success'=>true,'message'=>'Terima kasih, pesan anda telah terkirim!')));
				}else{
					exit(CActiveForm::validate($model));
				}
			}
		}
		$this->render('contact',array('model'=>$model,'banner'=>$banner));
	}

	public function getAllImageByNewsID($news_id){
		return SBNewsImage::model()->findAll(array('condition'=>'news_id=:news_id','params'=>array(':news_id'=>$news_id)));
	}
}