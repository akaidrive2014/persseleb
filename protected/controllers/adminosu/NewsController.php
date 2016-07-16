<?php
class NewsController extends AdminController
{
	public $IDname = 'news';
	public function init(){
	 	$this->haveRights('news');
	 	parent::init();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if($this->isAjax()){
			$model=new SBNews;
	
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['SBNews']))
			{
				$model->attributes=$_POST['SBNews'];
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
					'title'=>'Add News',
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
			//print_r($model->categories);exit;
			if(isset($_POST['SBNews']))
			{
				$model->attributes=$_POST['SBNews'];
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
				'title'=>'Edit News',
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
		if($this->loadModel($id)->delete()){
			$CategoriesNewsRelation = SBNewsCategoryRelation::model()->deleteAll('news_id=:id',array(':id'=>$id));
			SBNewsImage::model()->deleteAll(
		    	'news_id=:id',
		    	array('id' => $id)
			);
		}
		
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
		$model=new SBNews('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order="news_id DESC";
		if(isset($_GET['SBNews'])){
			$model->attributes=$_GET['SBNews'];
			//$model->news_date = date('Y-m-d',strtotime(str_replace('/','-',$model->news_date)));
		}	

		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Manage News',
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SBNews the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SBNews::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->IDname.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
