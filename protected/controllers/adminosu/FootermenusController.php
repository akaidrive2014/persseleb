<?php

class FootermenusController extends AdminController
{
	public $modelName = 'SBFooterMenu';
	
	public function init(){
	 	$this->haveRights('footermenus');
	 	parent::init();
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if($this->isAjax()){
			$model=new SBFooterMenu;
			
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['SBFooterMenu']))
			{
				$model->attributes=$_POST['SBFooterMenu'];
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
				'title'=>'Add New Menu',
				'modelName'=>strtolower(get_class($model))
			),FALSE,TRUE);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if($this->isAjax()){
			$model=$this->loadModel($id);
	
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['SBFooterMenu']))
			{
				$model->attributes=$_POST['SBFooterMenu'];
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
				'title'=>"Edit Menu #{$model->menu_id} $model->menu_name",
				'modelName'=>strtolower(get_class($model))
			),FALSE,TRUE);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SBFooterMenu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SBFooterMenu('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order = 'menu_id DESC';
		if(isset($_GET['SBFooterMenu']))
			$model->attributes=$_GET['SBFooterMenu'];

		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Manage Menus',
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SBFooterMenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SBFooterMenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SBFooterMenu $model the model to be validated
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
