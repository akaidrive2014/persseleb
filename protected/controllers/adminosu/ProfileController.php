<?php
Class ProfileController extends AdminController{
	
	public function actionIndex(){
		$profile = SBUser::model()->findByPk(Yii::app()->user->id);
		$changePassword = ChangePassword::model()->findByPk(Yii::app()->user->id);
		if($this->isAjax()){
			if(isset($_POST['SBUser'])){
				$profile->attributes = $_POST['SBUser'];
				$profile->input_password = '12345678';
				if($profile->validate()){
					if($profile->save()){
						exit(json_encode(array('success'=>true)));
					}
				}else{
					exit(CActiveForm::validate($profile));
				}
			}
			if(isset($_POST['ChangePassword'])){
				$changePassword->attributes = $_POST['ChangePassword'];
				if($changePassword->validate()){
					if($changePassword->save()){
						exit(json_encode(array('success'=>true)));
					}
				}else{
					exit(CActiveForm::validate($changePassword));
				}
			}
		}
		$this->render('index',array('profile'=>$profile,'changePassword'=>$changePassword));
	}
	
}
