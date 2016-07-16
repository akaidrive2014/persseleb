<?php

/**
 * This is the model class for table "sb_menus".
 *
 * The followings are the available columns in table 'sb_menus':
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $menu_name
 * @property string $action
 * @property integer $page_id
 * @property integer $category_news_id
 * @property string $url_link
 * @property string $link_key
 * @property string $target
 * @property integer $positions
 */
class SBFooterMenu extends CActiveRecord
{
	
	public $action_menu = array(
		'link-to-page'=>'Link to Page',
		'link-to-category-news'=>'Link to Category News',
		'link-to-module'=>'Link to Module',
		'link-to-url'=>'Link to Url',
	);
	public $page_action;
	public $page_name;
	public $page_content;
	public $link;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_footer_menus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_name, action', 'required'),
			array('menu_name','unique'),
			array('page_id','checkPage'),
			array('page_action,page_name,page_content,page_id','safe'),
			array('parent_id, category_news_id, positions', 'numerical', 'integerOnly'=>true),
			array('menu_name, action, url_link, module', 'length', 'max'=>100),
			array('target', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('menu_id, parent_id, menu_name, action, page_id, category_news_id, url_link, link_key, target, positions', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			if($this->action=='link-to-page'){
				$this->module = NULL;
				$this->url_link = NULL;
				$this->category_news_id = NULL;
				if($this->page_action=='existing-page'){
					$Page = Tools::getPageByName($this->page_id);
					$this->page_id = $Page->page_id;
				}
				if($this->page_action=='new-page'){
					$SBPage = New SBPage;
					$SBPage->page_name = $this->page_name;
					$SBPage->page_content = $this->page_content;
					if($SBPage->save()){
						$this->page_id = $SBPage->primaryKey;
					}
				}
				
			}
			if($this->action=='link-to-category-news'){
				$this->page_id = NULL;
				$this->url_link = NULL;
				//$this->category_news_id = NULL;	
				$this->module = $this->module;
			}
			if($this->action=='link-to-module'){
				$this->page_id = NULL;
				$this->url_link = NULL;
				$this->category_news_id = NULL;	
				//$this->module = $this->module;
			}
			if($this->action=='link-to-url'){
				$this->page_id = NULL;
				$this->module = NULL;
				$this->category_news_id = NULL;		
				//$this->url_link = $this->url_link;
			}
			return TRUE;
		}
	}
	
	public function afterFind(){
		if($this->action=='link-to-page'){
		 	$Page = Tools::getPageById($this->page_id);
			
			if($Page === NULL){
				$this->link = Website::baseUrl();
			}else{
				$this->link = Website::baseUrl().'/page/'.$Page->page_slug;
				$this->page_id=$Page->page_name;
			}
			if($this->action=='link-to-url'){
				$this->link = $this->url_link;
			}
		}
		
		if($this->action=='link-to-category-news'){
			$Slug = Tools::getCategoryNewsById($this->category_news_id);
			$this->link = Website::baseUrl().'/category/'.$this->category_news_id.'/'.Website::slug($Slug->category_name);
		}
		
		if($this->action=='link-to-module'){
			$this->link = Website::baseUrl().'/'.$this->module;
		}
		if($this->action=='link-to-url'){
			$this->link = $this->url_link;
		}
		
		parent::afterFind();
	}

	public function checkPage(){
		if($this->action=='link-to-page'){
			
			 
			if($this->page_action=='existing-page'){
				$Page = Tools::getPageByName($this->page_id);
				if($Page===NULL){
					$this->addError('page_id','This page is not found in database');
				}	
			}
			if($this->page_action=='new-page'){
				$Page = Tools::getPageByName($this->page_name);
				if(empty($this->page_name)){
					$this->addError('page_name','Page name cannot be blank');
				}
				if(empty($this->page_content)){
					$this->addError('page_content','Page content cannot be blank');
				}	
				if(!empty($Page)){
					$this->addError('page_name','Page sudah ada');
				}
			}
		}
		if($this->action=='link-to-module'){
			if(empty($this->module)){
				$this->addError('module','Module cannot be blank');
			}
		}
		if($this->action=='link-to-category-news'){
			if(empty($this->category_news_id)){
				$this->addError('category_news_id','Category News cannot be blank');
			}
		}
		if($this->action=='link-to-url'){
			if(empty($this->url_link)){
				$this->addError('url_link','Url Link cannot be blank');
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'menu_id' => 'ID',
			'parent_id' => 'Parent',
			'menu_name' => 'Menu Name',
			'action' => 'Action',
			'page_id' => 'Page Name',
			'category_news_id' => 'Category News',
			'url_link' => 'Url Link',
			'module' => 'Module',
			'target' => 'Open New Tab',
			'positions' => 'Positions',
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

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('category_news_id',$this->category_news_id);
		$criteria->compare('url_link',$this->url_link,true);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('positions',$this->positions);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
