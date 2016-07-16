<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $admin='adminosu';
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function baseUrl(){
		return Yii::app()->getBaseUrl(TRUE);
	}
	public function baseTheme(){
		return $this->baseUrl().'/themes';
	}
	public function getBaseTheme($EndName,$ThemeName){
		return $this->baseUrl().'/themes/'.$EndName.'/'.$ThemeName.'/';
	}
	public function isAjax(){
		return Yii::app() -> request -> isAjaxRequest;
		 
	}
	public function forceAjaxRequest(){
		if(!$this->isAjax()){
			exit;
		}
	}
	
	public function baseImageUpload(){
		return $this->baseUrl().'/assets/uploads/images/';
	}
	
	public function avoidDoubleLoadJS() {
		$cs = Yii::app() -> clientScript;
		return $cs -> scriptMap = array(
			'jquery.js' => false, 
			'jquery.ui.js' => false, 
		);
	}
	public function action(){
		return Yii::app()->controller->action->id;
		//return $this->action->id;
	}
}