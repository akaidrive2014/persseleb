<?php
Class ImagesController extends AdminController{
	public $imageModelName='SBImage';
	public function init(){
	 	$this->haveRights('images');
	 	parent::init();
	}
	public function actionCreate(){
		$this->forceAjaxRequest();
		$model = New SBImage;
		$this->performAjaxValidation($model);
		if(isset($_POST['SBImage'])){
			$model->attributes = $_POST['SBImage'];
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
			'title'=>'Add New Image',
		),FALSE,TRUE);
	}
	public function actionUpdate($id){
		$this->forceAjaxRequest();
		$model = $this->loadModel($id);
		$this->performAjaxValidation($model);
		if(isset($_POST['SBImage'])){
			$model->attributes = $_POST['SBImage'];
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
			'title'=>'Edit Image',
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
		$model=SBImage::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->imageModelName.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
