<?php
Class PanelController extends AdminController{
	public function actionSettheme(){
		$theme = $_POST['theme'];
		Yii::app()->user->setState('theme',$theme);
	}
}
