<?php
Class GalleriesController extends AdminController{
	public $galleryModelName='SBGallery';
	public function init(){
	 	$this->haveRights('galleries');
	 	parent::init();
	}
	public function actionCreate(){
		$this->forceAjaxRequest();
		$model = New SBGallery;
		$this->performAjaxValidation($model);
		if(isset($_POST['SBGallery'])){
			$model->attributes = $_POST['SBGallery'];
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
			'title'=>'Add New Gallery',
		),FALSE,TRUE);
	}
	public function actionUpdate($id){
		$this->forceAjaxRequest();
		$model = $this->loadModel($id);
		$this->performAjaxValidation($model);
		if(isset($_POST['SBGallery'])){
			$model->attributes = $_POST['SBGallery'];
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
			'title'=>'Edit Gallery',
		),FALSE,TRUE);
	}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SBMenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SBGallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->galleryModelName.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
