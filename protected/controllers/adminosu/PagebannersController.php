<?php
Class PagebannersController extends AdminController{
	public $modelName ='SBPageBanner';
	public function init(){
	 	//$this->haveRights('page_banners');
	 	//parent::init();
	}
	
	public function actionUpdate($id){
		$this->forceAjaxRequest();
		$model=New SBPageBanner;
		$model->data($id);
		$this->performAjaxValidation($model);
		if(isset($_POST['SBPageBanner'])){
			$model->attributes = $_POST['SBPageBanner'];
			if($model->validate()){
				if($model->update($id)){
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
			'title'=>'Edit Page Banner',
		),FALSE,TRUE);
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
