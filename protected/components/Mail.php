<?php
Class Mail {
	
	public $send_to;
	public $email_subject;
	public $message;
	public $replayTo='';
	
	public function sendEmail() {
		$smtpMail = ConfigSmtpEmail::model() -> findByPk(1);
		$mail = Yii::app() -> Smtpmail -> Host = $smtpMail -> host_smtp;
		$mail = Yii::app() -> Smtpmail -> Username = $smtpMail -> username_smtp;
		$mail = Yii::app() -> Smtpmail -> Password = $smtpMail -> password_smtp;
		$mail = Yii::app() -> Smtpmail -> Port = $smtpMail -> port_smtp;
		$mail = Yii::app() -> Smtpmail;
		$mail -> SetFrom($smtpMail -> email_sender, $smtpMail -> sender_name);
		$mail -> Subject = $this->email_subject;
		$mail -> MsgHTML($this->message);
		$mail -> AddAddress(!empty($this->send_to) ? $this->send_to : $smtpMail -> email_sender, "");
		
		if (!empty($this->replayTo)) {
			$mail -> AddReplyTo($this->replayTo, '');
		}
		/*foreach cc*/
		if (!empty($smtpMail -> carbon_copy)) {
			$ccEmail = explode(';', $smtpMail -> carbon_copy);
			foreach ($ccEmail as $cc) {
				$mail -> AddBCC($cc);
			}
		}
		/*end foreach cc*/
		if ($mail -> Send()) {
			return TRUE;
		} else {
			return $mail->ErrorInfo;
		}
	}
	
	public function template($id){
		return $DATA = SBEmailTemplate::model()->findByPk($id);
	}

}
//host : smtpcorp.com
//port : 2525
//username : kuugamail
//password : kuugakuugamail