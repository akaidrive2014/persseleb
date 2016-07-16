<?php
Class MediaController extends AdminController{
	public $galleryModelName='SBGallery';
	public $imageModelName='SBImage';
	public $videoModelName='SBVideo';
	public function init(){
	 	$this->haveRights('media');
	 	parent::init();
	}
	public function actionIndex(){
		$Gallery = New SBGallery('search');
		$Gallery->unsetAttributes();  // clear any default values
		$Gallery->dbCriteria->order = 'gallery_id DESC';
		if(isset($_GET['SBGallery'])){
			$Gallery->attributes=$_GET['SBGallery'];
		}
		
		$Image = New SBImage('search');
		$Image->unsetAttributes();  // clear any default values
		$Image->dbCriteria->order = 'image_id DESC';
		if(isset($_GET['SBImage'])){
			$Image->attributes=$_GET['SBImage'];
		}
		
		$Video = New SBVideo('search');
		$Video->unsetAttributes();  // clear any default values
		$Video->dbCriteria->order = 'video_id DESC';
		if(isset($_GET['SBVideo'])){
			$Video->attributes=$_GET['SBVideo'];
		}
		
		$this->render('index',array(
				'title'=>'Media Digital',
				'Gallery'=>$Gallery,
				'Image'=>$Image,
				'Video'=>$Video,
			)
		);
	}
	
}
