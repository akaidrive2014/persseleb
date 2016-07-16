<?php
/*Change Password For Admin
 *Author : Kuuga
 *Email : ryuki.servaiv@gmail.com
 *Site : www.shariveweb.com
 **/
Class ChangePassword extends CActiveRecord {
	/*untuk membuat field 'new password' 
	 *pada form ubah password*/	
	public $newPassword;
	/*untuk membuat field 'old/current password' 
	 *pada form ubah password*/
	public $oldPassword;
	/*untuk membuat field 'confirm password' 
	 *pada formubahpassword*/
	public $compareNewPassword;
	
	public $user;
	
	
	/*digunakan untuk meng-engkrip password dengan dengan md5*/
	protected function beforeSave() {
		if (parent::beforeSave()) {
			$this -> password = PasswordHash::create_hash($this -> compareNewPassword);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'sb_users';
	}
	
	public function rules() {
		/*buat validate form ubah password*/
		return array(
			/*set field old/current password,new password, 
			 *confirm password tidak boleh kosong*/
			array('oldPassword, newPassword, compareNewPassword', 'required'),
			/*set min length password*/
			array('oldPassword,newPassword,compareNewPassword','length','min'=>8,'max'=>15),
			/*set max length password*/
			array('oldPassword,newPassword,compareNewPassword', 'length', 'max'=>35),
			/*bandingkan atau confirm password*/
			array('compareNewPassword','compare','compareAttribute'=>'newPassword'),
			/*validate old password/current password 
			 *dengan function validateCurrentPassword*/
			array('oldPassword','validateCurrentPassword'),
		);
	}
	
	public function attributeLabels(){
		return array(
			'oldPassword'=>'Current Password',
			'newPassword'=>'New Password',
			'compareNewPassword'=>'Retype New Password',
		);
	}
	
	/*function untuk validate current password*/
	public function validateCurrentPassword(){
		/*jika current password tidak sama dengan yang diinputkan maka*/
		$currentPassword = SBUser::model()->findByPk(Yii::app()->user->id);
        if(!$currentPassword->validatePassword($this->oldPassword,$currentPassword->password)){
        	/*set error dengan message 'current password . . . .*/
        	$this -> addError('oldPassword', 'Current Password is not match');
        }else{
        	/*jika benar return TRUE*/
        	return TRUE;
        }
    }
}