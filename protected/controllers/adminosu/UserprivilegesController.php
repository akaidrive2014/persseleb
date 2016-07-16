<?php 
Class UserprivilegesController extends AdminController{
	public $modelNameUserGroup = 'SBUsergroup';
	public $modelNameUser = 'SBUser';
	
	public function init(){
	 	$this->haveRights('user');
	 	parent::init();
	}
	
	public function actionIndex(){
		$UserGroups = New SBUsergroup('search');
		$UserGroups->unsetAttributes(); 
		$UserGroups->dbCriteria->order='id DESC';
		
		$Users = New SBUser('search');
		$Users->unsetAttributes(); 
		$Users->dbCriteria->order='id DESC';
		
		if(isset($_GET['SBUsergroup'])){
			$UserGroups->attributes = $_GET['SBUsergroup'];
		}
		if(isset($_GET['SBUser'])){
			$Users->attributes = $_GET['SBUser'];
		}
		$this->render('index',array(
			'UserGroups'=>$UserGroups,
			'Users'=>$Users,
			'title'=>'User Access Privileges'
		));
	}
	
	public function actionCreate_user(){
		$this->forceHaveRights('users');
		$this->forceAjaxRequest();
		$modelUser= NEW SBUser;
		$this->performAjaxValidationUser($modelUser);
		if(isset($_POST['SBUser'])){
			$modelUser->attributes=$_POST['SBUser'];
			$modelUser->input_password = uniqid();
			if($modelUser->validate()){
				if($modelUser->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($modelUser));
			}
		}
		
		$this->renderPartial('users/_form',array(
			'modelUser'=>$modelUser,
			'title'=>'Add New User',
		),FALSE,TRUE);
	}
	
	public function actionCreate(){
		$this->forceHaveRights('privileges');
		$this->forceAjaxRequest();
		$modelUserGroups= NEW SBUsergroup;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidationUserGroup($modelUserGroups);

		if(isset($_POST['SBUsergroup']))
		{
			$modelUserGroups->attributes=$_POST['SBUsergroup'];
			if($modelUserGroups->validate()){
				$CHECKKEY_MODULE = array_keys($modelUserGroups->rights);
				$website = in_array('website',$CHECKKEY_MODULE) ? $modelUserGroups->rights['website'] : NULL;
				$media = in_array('media',$CHECKKEY_MODULE) ? $modelUserGroups->rights['media'] : NULL;
				$email = in_array('email',$CHECKKEY_MODULE) ? $modelUserGroups->rights['email'] : NULL;
				$seo = in_array('seo',$CHECKKEY_MODULE) ? $modelUserGroups->rights['seo'] : NULL;				
				$user = in_array('user',$CHECKKEY_MODULE) ? $modelUserGroups->rights['user'] : NULL;
				$setting = in_array('setting',$CHECKKEY_MODULE) ? $modelUserGroups->rights['setting'] : NULL;
				$rights =  array_merge(
					(array)array_keys($modelUserGroups->rights),
					(array)$website,
					(array)$media,
					(array)$email,
					(array)$seo,
					(array)$user,
					(array)$setting
				);
				
				$modelUserGroups->rights = implode(',', $rights);
				if($modelUserGroups->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($modelUserGroups));
			}
		}

		$this->renderPartial('usergroups/_form',array(
			'modelUserGroups'=>$modelUserGroups,
			'title'=>'Add New User Group',
		),FALSE,TRUE);
		
	}
	
	public function actionUpdate_user($id){
		$this->forceHaveRights('users');
		$this->forceAjaxRequest();
		$modelUser= $this->loadModelUser($id);
		$this->performAjaxValidationUser($modelUser);
		if(isset($_POST['SBUser'])){
			$modelUser->attributes=$_POST['SBUser'];
			$modelUser->input_password ='12345678';
			if($modelUser->validate()){
				if($modelUser->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($modelUser));
			}
		}
		
		$this->renderPartial('users/_form',array(
			'modelUser'=>$modelUser,
			'title'=>'Add New User',
		),FALSE,TRUE);
	}
	
	public function actionUpdate($id){
		$this->forceHaveRights('privileges');
		$this->forceAjaxRequest();
		$modelUserGroups= $this->loadModelUsergroup($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidationUserGroup($modelUserGroups);

		if(isset($_POST['SBUsergroup']))
		{
			$modelUserGroups->attributes=$_POST['SBUsergroup'];
			if($modelUserGroups->validate()){
				$CHECKKEY_MODULE = array_keys($modelUserGroups->rights);
				$website = in_array('website',$CHECKKEY_MODULE) ? $modelUserGroups->rights['website'] : NULL;
				$media = in_array('media',$CHECKKEY_MODULE) ? $modelUserGroups->rights['media'] : NULL;
				$email = in_array('email',$CHECKKEY_MODULE) ? $modelUserGroups->rights['email'] : NULL;
				$seo = in_array('seo',$CHECKKEY_MODULE) ? $modelUserGroups->rights['seo'] : NULL;	
				$user = in_array('user',$CHECKKEY_MODULE) ? $modelUserGroups->rights['user'] : NULL;
				$setting = in_array('setting',$CHECKKEY_MODULE) ? $modelUserGroups->rights['setting'] : NULL;
				$rights =  array_merge(
					(array)array_keys($modelUserGroups->rights),
					(array)$website,
					(array)$media,
					(array)$email,
					(array)$seo,
					(array)$user,
					(array)$setting
				);
				
				$modelUserGroups->rights = implode(',', $rights);
				if($modelUserGroups->save()){
					exit(json_encode(array('success'=>TRUE)));
				}
			}else{
				exit(CActiveForm::validate($modelUserGroups));
			}
		}

		$this->renderPartial('usergroups/_form',array(
			'modelUserGroups'=>$modelUserGroups,
			'title'=>'Edit User Group',
		),FALSE,TRUE);
		
	}
	
	/**
	 * delete usergroup
	 */
	public function actionDelete($id){
		$this->forceHaveRights('privileges');
		$this->loadModelUsergroup($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	public function actionDelete_user($id){
		$this->forceHaveRights('users');
		$this->loadModelUser($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	/**
	 * get data by id
	 */
	public function loadModelUsergroup($id){
		$model=SBUsergroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelUser($id){
		$model=SBUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param SBPage $model the model to be validated
	 */
	protected function performAjaxValidationUserGroup($modelUserGroups)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->modelNameUserGroup."-form")
		{
			echo CActiveForm::validate($modelUserGroups);
			Yii::app()->end();
		}
	}
	protected function performAjaxValidationUser($modelUser)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->modelNameUser."-form")
		{
			echo CActiveForm::validate($modelUser);
			Yii::app()->end();
		}
	}
	 
	
}
