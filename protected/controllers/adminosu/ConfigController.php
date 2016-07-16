<?php
Class ConfigController extends AdminController{
	public function init(){
	 	$this->haveRights('setting');
	 	parent::init();
	 }
	public function actionIndex(){
		$WebsiteData = New Config;
		$SMTP = ConfigSmtpEmail::model()->findByPk(1);
		if($this->isAjax()){
			if(isset($_POST['Config'])){
				$this->forceHaveRights('websitedata');
				$WebsiteData->attributes = $_POST['Config'];	
				if($WebsiteData->validate()){
					if($WebsiteData->saveSeoWebsite($WebsiteData)){
						exit(
							json_encode(
								array(
									'success'=>TRUE
								)
							)
						);
					}
				}else{
					exit(CActiveForm::validate($WebsiteData));
				}
			}
			if(isset($_POST['ConfigSmtpEmail'])){
				$this->forceHaveRights('smtpmail');
				$SMTP->attributes = $_POST['ConfigSmtpEmail'];	
				if($SMTP->validate()){
					if($SMTP->save()){
						exit(
							json_encode(
								array(
									'success'=>TRUE
								)
							)
						);
					}
				}else{
					exit(CActiveForm::validate($SMTP));
				}
			}
			if(isset($_POST['Contact'])){
				//$this->forceHaveRights('websitedata');
				$Contact = $_POST['Contact'];
				$Contact = array(
					'contact'=>array(
						'description'=>$Contact['description'],
						'address'=>$Contact['address'],
						'email'=>$Contact['email'],
						'skype'=>$Contact['skype'],
						'mobile'=>$Contact['mobile']
					),
				);
				if($WebsiteData->saveContact(json_encode($Contact))){
					exit(json_encode(array('success'=>true)));
				}
			}
		}
		$WebsiteData->data();
		$this->render('index',array(
				'config'=>$WebsiteData,
				'smtp'=>$SMTP,
			)
		);
	}
	
}
