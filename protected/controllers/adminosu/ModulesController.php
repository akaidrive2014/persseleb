<?php
Class ModulesController extends AdminController{
	public $modelName ='SBModule';
	public function init(){
	 	//$this->haveRights('page_banners');
	 	//parent::init();
	}
	
	public function actionUpdate($id){
		$this->forceAjaxRequest();
		$model=SBModule::model()->findByPk($id);
		$this->performAjaxValidation($model);
		if(isset($_POST['SBModule'])){
			$model->attributes = $_POST['SBModule'];
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
			'title'=>"Configuration Module <b>#{$model->url_link}</b>",
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
