<?php

class PagesController extends AdminController
{
	public function init(){
	 	$this->haveRights('pages');
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
			$model=new SBPage;
			
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['SBPage']))
			{
				$model->attributes=$_POST['SBPage'];
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
				'title'=>'Add New Page',
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
	
			if(isset($_POST['SBPage']))
			{
				$model->attributes=$_POST['SBPage'];
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
				'title'=>'Add New Page',
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
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SBPage('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order='page_id DESC';
		if(isset($_GET['SBPage']))
			$model->attributes=$_GET['SBPage'];

		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Manage Pages',
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SBPage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SBPage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SBPage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sbpage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
