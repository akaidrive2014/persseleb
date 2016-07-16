<?php

/**
 * This is the model class for table "sb_bannerbanner".
 *
 * The followings are the available columns in table 'sb_bannerbanner':
 * @property integer $banner_id
 * @property string $banner_title
 * @property string $banner_image
 * @property string $banner_text
 * @property string $url_link
 * @property integer $is_active
 * @property integer $target
 * @property integer $positions
 * @property string $module
 */
class SBBannerslider extends CActiveRecord
{
	public $get_url_link;
	public $get_url_link_live;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_bannerslider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('banner_title, banner_image', 'required'),
			array('is_active, target, positions', 'numerical', 'integerOnly'=>true),
			array('banner_title', 'length', 'max'=>100),
			array('module', 'length', 'max'=>500),
			array('banner_text, url_link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('banner_id, banner_title, banner_image, banner_text, url_link, is_active, target, positions, module', 'safe', 'on'=>'search'),
		);
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
	
	public function afterFind(){
		$this->get_url_link = 'http://'.str_replace('http://', '', $this->url_link);
		$this->get_url_link_live = 'http://'.str_replace('http://', '', $this->url_link_live);
		parent::afterFind();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'banner_id' => 'ID',
			'banner_title' => 'Banner Title',
			'banner_image' => 'Banner Image',
			'banner_text' => 'Banner Text',
			'url_link' => 'Url Link',
			'is_active' => 'Is Active',
			'target' => 'Open New Tab',
			'positions' => 'Positions',
			'module' => 'Module',
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

		$criteria->compare('banner_id',$this->banner_id);
		$criteria->compare('banner_title',$this->banner_title,true);
		$criteria->compare('banner_image',$this->banner_image,true);
		$criteria->compare('banner_text',$this->banner_text,true);
		$criteria->compare('url_link',$this->url_link,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('target',$this->target);
		$criteria->compare('positions',$this->positions);
		$criteria->compare('module',$this->module,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBBannerlider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
