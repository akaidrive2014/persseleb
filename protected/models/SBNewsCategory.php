<?php

/**
 * This is the model class for table "sb_news_category".
 *
 * The followings are the available columns in table 'sb_news_category':
 * @property integer $category_id
 * @property integer $parent_id
 * @property string $category_name
 * @property string $category_slug
 */
class SBNewsCategory extends CActiveRecord
{
	//public $link;
	public $url_link;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_news_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name', 'required'),
			array('category_name,category_slug','unique'),
			array('category_slug,seo_keywords,seo_title,seo_description','safe'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('category_name, category_slug', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, parent_id, category_name, category_slug', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->category_slug = empty($this->category_slug) ? Website::slug($this->category_name) : Website::slug($this->category_slug);
			return TRUE;
		}	
	}
	
	public function afterFind(){
		//$this->link = Website::baseUrl().'/blog/'.$this->category_slug;
		$this->url_link = Website::baseUrl().'/blog/'.$this->category_slug;
		parent::afterFind();
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
			'category_id' => 'ID',
			'parent_id' => 'Parent',
			'category_name' => 'Category Name',
			'category_slug' => 'Category Slug',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_slug',$this->category_slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBNewsCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
