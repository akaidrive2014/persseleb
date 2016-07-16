<?php
Class SeomatchurlController extends AdminController{
	public $modelName = 'SBUrlseo';
	public function init(){
	 	$this->haveRights('seomatchurl');
	 	parent::init();
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SBUrlseo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SBUrlseo'])){
			$model->attributes=$_GET['SBUrlseo'];
		}	

		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Manage Seo Match Url',
		));
	}
	
	public function actionIndex(){
		$this->redirect(array('admin'));
	}
	
	public function actionCreate()
	{
		$this->forceAjaxRequest();
		$model=new SBUrlseo;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['SBUrlseo']))
		{
			$model->attributes=$_POST['SBUrlseo'];
			if($model->validate()){
				if($model->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}

		$this->renderPartial('_form',array(
				'model'=>$model,
				'title'=>'Add Seo Match Url',
		),FALSE,TRUE);
		
	}
	
	public function actionUpdate($id)
	{
		$this->forceAjaxRequest();
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		//print_r($model->categories);exit;
		if(isset($_POST['SBUrlseo']))
		{
			$model->attributes=$_POST['SBUrlseo'];
			if($model->validate()){
				if($model->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>'Edit Seo Match Url',
		),FALSE,TRUE);
		
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function loadModel($id)
	{
		$model=SBUrlseo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SBNews $model the model to be validated
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
