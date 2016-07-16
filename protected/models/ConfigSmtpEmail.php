<?php
Class ConfigSmtpEmail extends CActiveRecord{
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'sb_smptmail';
	}
	
	public function rules(){
		return array(
			array('email_sender,sender_name,host_smtp,port_smtp,username_smtp,password_smtp','required'),
			array('email_sender','email'),
			array('carbon_copy','safe'),
		);
	}
	
	public function attributeLabels(){
		return array(
			'email_sender'=>'Email From',
			'sender_name'=>'Sender Name',
			'host_smtp'=>'SMTP Host',
			'port_smtp'=>'SMTP Port',
			'username_smtp'=>'SMTP User',
			'password_smtp'=>'SMTP Password',
			'carbon_copy' => 'Email Enquiry (To/CC)',
		);
	}
	
}
