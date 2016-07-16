<?php

/**
 * This is the model class for table "sb_users".
 *
 * The followings are the available columns in table 'sb_users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property string $username
 * @property string $password
 * @property integer $group_id
 * @property string $reset_password_code
 * @property string $reset_password_date
 * @property string $reset_password_exp
 * @property string $have_reseted
 */
class SBUser extends CActiveRecord
{
	
	public $input_password;
	public $createdDate;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, username, input_password, group_id', 'required'),
			array('email','email'),
			array('username,email','unique'),
			array('mobile,group_id,is_active', 'numerical', 'integerOnly'=>true),
			array('mobile','length','min'=>10,'max'=>13),
			array('name, email', 'length', 'max'=>35),
			array('username','length','max'=>15,'min'=>5),
			array('avatar, reset_password_key,reset_password_token', 'length', 'max'=>500),
			array('input_password', 'length', 'max'=>15,'min'=>8),
			array('have_reseted', 'length', 'max'=>3),
			array('reset_password_date, reset_password_exp,password,avatar,mobile,city,country,street,created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, avatar, username, password, group_id, reset_password_key, reset_password_token,reset_password_date, reset_password_exp, have_reseted', 'safe', 'on'=>'search'),
		);
	}
	
	/*digunakan untuk meng-engkrip password dengan dengan md5*/
	protected function beforeSave() {
		if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->password = PasswordHash::create_hash($this->input_password);
				$this -> created_date = date('Y-m-d H:i:s');
			}
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function afterSave(){
		if($this->isNewRecord){
			$mail = New Mail;
			$Template = $mail->template(1);
			$mail->send_to = $this->email;
			$mail->email_subject = $Template->email_subject;
			$message = str_replace('#RECEIVER_NAME#', $this->name, $Template->template_html);
			$message_1 = str_replace('#RECEIVER_EMAIL#', $this->email, $message);
			$message_2 = str_replace('#USERNAME#', $this->username, $message_1);
			$message_3 = str_replace('#PASSWORD#', $this->input_password, $message_2);
			$mail->message = $message_3;
			$mail->sendEmail();
		}
		parent::afterSave();
	}

	public function sendResetPasswordCode($model){
		$UserData = $this::model()->find(array(
			'condition'=>'username=:username AND email=:email',
			'params'=>array(':username'=>$model->username,':email'=>$model->email)
		));
		if($UserData===NULL){
			exit(json_encode(array(
				'success'=>FALSE,
				'message'=>'Incorrect username or email.'
			)));
		}else{			
			$mail = New Mail;
			$Template = $mail->template(2);
			$mail->send_to = $model->email;
			$mail->email_subject = $Template->email_subject;
			$message = str_replace('#RECEIVER_NAME#', $UserData->name, $Template->template_html);
			$message_1 = str_replace('#RECEIVER_EMAIL#', $model->email, $message);
			$message_2 = str_replace('#USERNAME#', $model->username, $message_1);
			$token = md5(uniqid(rand(), true)).'_'.uniqid(rand());
			$key = uniqid().'.'.$UserData->id;
			$message_3 = str_replace('#RESET_PASSWORD#', Yii::app()->getBaseUrl(TRUE)."/adminosu/reset-password?key={$key}&amp;token={$token}", $message_2);
			$mail->message = $message_3;
			$this->resetPassword($model,$key,$token);
			if($mail->sendEmail()){
				return TRUE;
			}
		}
	}

	public function resetPassword($model,$key,$token){
		//get data matched
		$matchedData = $this::model()->find(array(
			'condition'=>'username=:username AND email=:email',
			'params'=>array(':username'=>$model->username,':email'=>$model->email)
		));
		if(count($matchedData)==1){
			//double strike.. :)
			if($model->username == $matchedData->username && $matchedData->email==$model->email){	
				$matchedData->reset_password_token = $token;
				$matchedData->reset_password_key = $key;
				$matchedData->reset_password_date = date('Y-m-d H:i:s');
				$matchedData->reset_password_exp = date('Y-m-d H:i:s',strtotime('+1 hour'));
				$matchedData->have_reseted = 'no';
				if($matchedData->save(FALSE)){
					return TRUE;
				}
			}
		}
	}
	 
	public function afterFind() { 
		$this -> createdDate = date('d F Y H:i:s',strtotime($this -> created_date));
		parent::afterFind();
	}
	
	public function validatePassword($charPassword, $hasPassword){
		return PasswordHash::validate_password($charPassword,$hasPassword);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'SBUsergroup'=>array(self::BELONGS_TO,'SBUsergroup','group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'avatar' => 'Avatar',
			'username' => 'Username',
			'password' => 'Password',
			'input_password' => 'Password',
			'created_date'=>'Created Date',
			'createdDate'=>'Created Date',
			'group_id' => 'Group',
			'reset_password_key' => 'Reset Password Key',
			'reset_password_token' => 'Reset Password Token',
			'reset_password_date' => 'Reset Password Date',
			'reset_password_exp' => 'Reset Password Exp',
			'have_reseted' => 'Have Reseted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('reset_password_token',$this->reset_password_token,true);
		$criteria->compare('reset_password_date',$this->reset_password_date,true);
		$criteria->compare('reset_password_exp',$this->reset_password_exp,true);
		$criteria->compare('have_reseted',$this->have_reseted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
