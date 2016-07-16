<?php
Class VersionController extends Controller{
	public function actionIndex(){
		echo Yii::getVersion();
	}
}
