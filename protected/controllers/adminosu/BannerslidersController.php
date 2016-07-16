<?php
Class BannerslidersController extends AdminController{
	public $modelName ='SBBannerlider';
	public function init(){
	 	//$this->haveRights('page_banners');
	 	//parent::init();
	}
	
	public function actionCreate(){
		$this->forceAjaxRequest();
		$model=New SBBannerslider;
		$this->performAjaxValidation($model);
		if(isset($_POST['SBBannerslider'])){
			$model->attributes = $_POST['SBBannerslider'];
			if($model->validate()){
				if($model->save()){
					exit(
						json_encode(array(
							'success'=>true
						))
					);
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}
		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>'Add Home Banner Sliding',
		),FALSE,TRUE);
	}
	
	public function actionUpdate($id){
		$this->forceAjaxRequest();
		$model=$this->loadModel($id);
		$this->performAjaxValidation($model);
		if(isset($_POST['SBBannerslider'])){
			$model->attributes = $_POST['SBBannerslider'];
			if($model->validate()){
				if($model->save()){
					exit(
						json_encode(array(
							'success'=>true
						))
					);
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}
		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>"Edit Home Banner Sliding <b>#{$model->banner_title}</b>",
		),FALSE,TRUE);
	}
	
	public function actionIndex(){
		$this->renderPartial('admin');
	}
	
	public function loadModel($id)
	{
		$model=SBBannerslider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SBMenu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->modelName.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
