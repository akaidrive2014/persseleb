<?php
class AdminLoginForm extends CFormModel {
	
	/*deklarasi public variabel*/
	public $username;
	public $password;
	public $rememberMe;
	/*deklarasi private variabel*/
	private $_identity;
	//public $verifyCode;
	

	/**
	 * deklarasi validatasi
	 * yang menyatakan username dan password harus diisi.
	 */
	public function rules() {
		return array(
			// username dan password dibutuhkan
			array('username, password', 'required'),
			// untuk rememberMe dan harus sebuah boolean
			array('rememberMe', 'boolean'),
			// password akan diauthenticated
			array('password', 'authenticate'),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * deklarasi atribut labels.
	 */
	public function attributeLabels() {
		return array(
			'rememberMe' => 'Remember me next time',
		);
	}

	/**
	 * buat auth password.
	 */
	public function authenticate($attribute, $params) {
		/*jika tidak hasErrors maka*/
		if (!$this -> hasErrors()) {
			/*panggil component AdminLogin dengan param
			 *username, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new AdminLogin($this -> username, $this -> password);
			/*jika tidak authenticate/authenticate==failed maka*/
			if (!$this -> _identity -> authenticate()){
				/*kasih error*/
				$this -> addError('passwordx', 'Incorrect username or password.');
				$dataUser = $this->checkUsername($this->username);
				if($dataUser){
					$mail = New Mail;
					$message = "Hello {$dataUser->name},<br>";
					$message .="Somebody try to login with your username but wrong password.<br>";
					$message .="IP : ".$_SERVER['REMOTE_ADDR'];;
					$message .="<br>Date : ". date('d F Y').' - '.date('H:i:s');
					$message .="<br>We hope this information is useful for you.";
					$message .="<br><br>Thank you.";
					$message .="<br>Smart Brain Web Creation";
					$mail->send_to = $dataUser->email;
					$mail->email_subject = 'Login Attempt Failed';
					$mail->message = $message;
					$mail->sendEmail();
				}
			}
		}
	}

	/**
	 * admin login, dengan meng-input username dan password
	 */
	public function login() {
		/*jika _indentity null maka*/
		if ($this -> _identity === null) {
			/*panggil component AdminLogin dengan param
			 *username, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new AdminLogin($this -> username, $this -> password);
			/*panggil fungsi authenticate()
			 *yang ada di component AdminLogin
			 *yang akan memvalidasi username dan password*/
			$this -> _identity -> authenticate();
		}
		/*jika errorCode/error username dan password benar maka*/
		if ($this -> _identity -> errorCode === AdminLogin::ERROR_NONE) {
			//membuat remember me durasi 30 hari
			$duration = $this -> rememberMe ? 3600 * 24 * 30 : 0;
			// 30 days
			Yii::app() -> user -> login($this -> _identity, $duration);
			//update last_login_time admin
			//Admin::model() -> updateByPk($this -> _identity -> id, array('last_login_time' => new CDbExpression('NOW()')));
			return true;
		} else {
			return false;
		}
	}
	
	//will return email user
	protected function checkUsername($username){
		$datauser = SBUser::model()->find('username=:username',array(':username'=>$username));
		if(count($datauser)==1){
			return $datauser;
		}
	}

}