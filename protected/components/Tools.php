<?php
Class Tools{
	
	public static function getPageById($id){
		return $DATA = SBPage::model()->findByPk($id);
	}
	public static function getPageByName($page_name){
		return $DATA = SBPage::model()->findByAttributes(array('page_name'=>$page_name));
	}
	public static function getCategoryNewsById($id){
		return $DATA = SBNewsCategory::model()->findByPk($id);
	}
	public static function getAllParentsCategoryNews(){
		return SBNewsCategory::model()->findAll(
			array(
				'condition'=>'parent_id IS NULL',
				'order'=>'category_name ASC',
			)
		);
	}
	
	public static function getAllChildsCategoryNews($parent_id){
		return SBNewsCategory::model()->findAll(
			array(
				'condition'=>'parent_id =:parent_id',
				'order'=>'category_name ASC',
				'params'=>array(':parent_id'=>$parent_id),
			)
		);
	}

	public static function getNewsSliding(){
		return SBNews::model()->findAll(
			array(
				'condition'=>'issliding=:value',
				'order'=>'news_id ASC',
				'params'=>array(':value'=>1)
			)
		);
	}
	public static function getNewsForBanners(){
		return SBNews::model()->findAll(
			array(
				'condition'=>'topnewsbanner=:value',
				'order'=>'topnewsbanner ASC',
				'limit'=>7,
				'params'=>array(':value'=>1)
			)
		);
	}
	
}
