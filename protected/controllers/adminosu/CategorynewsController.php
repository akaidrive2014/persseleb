<?php

class CategorynewsController extends AdminController
{
	 public $modelName = 'SBNewsCategory';
	 
	 public function init(){
	 	$this->haveRights('categorynews');
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
		
			$model=new SBNewsCategory;
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
			
			if(isset($_POST['SBNewsCategory']))
			{
				$model->attributes=$_POST['SBNewsCategory'];
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
				'title'=>'Add New Category',
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
	
			if(isset($_POST['SBNewsCategory']))
			{
				$model->attributes=$_POST['SBNewsCategory'];
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
				'title'=>'Edit Category',
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
		$dataProvider=new CActiveDataProvider('SBNewsCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new SBNewsCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SBNewsCategory']))
			$model->attributes=$_GET['SBNewsCategory'];

		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Manage News Categories'
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SBNewsCategory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SBNewsCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SBNewsCategory $model the model to be validated
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
