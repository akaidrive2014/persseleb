<?php
Class AdminController extends Controller{
	public $layout = "tisa";
	
	public function init(){
		 
		//$segment = explode('/',$this->id);
	 
		$this->forceAdminAuth();
		 
		parent::init();
	}
	public function isChecked($right,$list_rights){
	    $this->forceAdminAuth();
		if(in_array($right,$list_rights)){
			return 'checked=checked';
		}
	}
	public function forceAdminAuth(){
		if(Yii::app()->user->isGuest){
			$this->redirect(array('/adminosu'));
		}
	}
	public function haveRights($right){
	    $this->forceAdminAuth();
		if(!in_array($right,Yii::app()->user->rights)){
			$this->redirect(array('/adminosu'));
		}
	}
	public function forceHaveRights($right){
		$this->forceAdminAuth();
		if(!in_array($right,Yii::app()->user->rights)){
			exit;
		}
	}
	public function isRights($right){
	    $this->forceAdminAuth();
		if(in_array($right,Yii::app()->user->rights)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getAllPages(){
		return SBPage::model()->findAll(array('order'=>'page_name ASC'));
	}
	
	public function getAllModules(){
		return SBModule::model()->findAll(array('order'=>'module_name ASC'));
	}
	
	public function getAllBannersliders(){
		return SBBannerslider::model()->findAll(array('order'=>'positions ASC'));
	}
	
	public function getAllImageByNewsID($news_id){
		return SBNewsImage::model()->findAll(array('condition'=>'news_id=:news_id','params'=>array(':news_id'=>$news_id)));
	}
	
	
	
	/*
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'expression'=>true,
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'expression'=>true,
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'expression'=>true,
				'actions'=>array('admin','delete'),
				 
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

}
