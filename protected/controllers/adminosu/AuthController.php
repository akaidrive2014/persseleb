<?php 
Class AuthController extends Controller{
	public $layout = "adminLogin";
	public function actionLogin(){
		
		if(isset(Yii::app()->user->adminLogin)==TRUE){
			$this->redirect(array($this->admin.'/dashboard'));
		}
		/*panggil model AdminLoginForm
		 *dan di tampung oleh $model*/
		$model = new AdminLoginForm;

		// jika ajax maka divalidasi dengan ajax
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login_form') {
			/*tampilkan hasil validasi form*/
			echo CActiveForm::validate($model);
			/*end/exit/die*/
			Yii::app() -> end();
		}

		// ambil data yang diinput oleh user
		if (isset($_POST['AdminLoginForm'])) {
			$model -> attributes = $_POST['AdminLoginForm'];
			//$model->verifyCode   = $_POST['captcha'];
			/*validaasi data yang diinput oleh user dan
			 * jika valid maka ...
			 */
			if ($model -> validate() && $model -> login()) {
				/*redirect ke halaman yang diinginkan
				 *(dalam hal ini kita direct ke halaman product/admin)
				 **/
				exit(json_encode(array('success'=>true)));
			}else{
				exit(CActiveForm::validate($model));
			}
		}
		// tampilkan login form
		$this -> render('_login', array(
			'model' => $model
			)
		);
	}
	
	public function actionSendresetcode(){
		
		$model = new SBUser;
		if(isset($_POST['SBUser'])){
			$model->attributes = $_POST['SBUser'];
			//reset pasword and validate
			if($model->sendResetPasswordCode($model)){
				exit(json_encode(array(
					'success'=>TRUE,
				)));
			}
		}
	}
	
	public function actionResetpassword(){
		if($this->isAjax()){
			if(isset($_GET['key']) && isset($_GET['token'])){
				$nat_key = $_GET['key'];
				$key = explode('.', $_GET['key']);
				$token = $_GET['token'];
				$model = SBUser::model()->find(array(
					"condition"=>'id=:id AND reset_password_token = :token AND reset_password_key=:key',
					'params'=>array(
						':id'=>$key[1],
						':token'=>$token,
						':key'=>$nat_key,
						)
					)
				);
				if(count($model)==0){
					exit(json_encode(array(
						'success'=>false,
						'message'=>'Your token to change password is not found in database.'
					)));
				}
				if($model->have_reseted=='yes'){
					exit(json_encode(array(
						'success'=>false,
						'message'=>'Your token to change password has been used.'
					)));
				}
				if($model->reset_password_exp<date('Y-m-d H:i:s')){
					exit(json_encode(array(
						'success'=>false,
						'message'=>'Your token to change password has been expired.'
					)));
				}
				if(isset($_POST['SBUser'])){
					$model->attributes = $_POST['SBUser'];
					$model->password = $_POST['SBUser']['retypePassword'];
					$model->have_reseted = 'yes';
					if($model->validate()){
						if($model->password == $model->input_password){
							$model->password = PasswordHash::create_hash($model->input_password);
							if($model->save()){
								exit(json_encode(array(
									'success'=>true,
									'message'=>'Your password has been reseted successfully, please click here to login.'
								)));
							}
						}else{
							exit(json_encode(array(
								'success'=>false,
								'message'=>'Re-Type New Password must be repeated exactly.',
							)));
						}
					}else{
						exit(CActiveForm::validate($model));
					}
					
				}
			}
		}
		$this->render('_resetPassword');
	}
	
	
	public function actionIndex(){
		$this->redirect(array('adminosu/login'));
	}
	
	public function actionLogout() {
		/*logout user*/
		Yii::app() -> user -> logout();
		/*direct ke halaman yang diinginkan*/
		$this -> redirect(array('/adminosu'));
		//$this -> redirect(array('/adminou/login/login-admin'));
	}
}
