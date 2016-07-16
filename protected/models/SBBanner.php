<?php

/**
 * This is the model class for table "sb_bannerslider".
 *
 * The followings are the available columns in table 'sb_bannerslider':
 * @property integer $slider_id
 * @property string $slider_title
 * @property string $slider_image
 * @property string $slider_text
 * @property string $url_link
 * @property integer $is_active
 * @property integer $target
 * @property integer $positions
 * @property string $module
 */
class SBBanner extends CActiveRecord
{
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
			array('slider_title, slider_image', 'required'),
			array('is_active, target, positions', 'numerical', 'integerOnly'=>true),
			array('slider_title', 'length', 'max'=>100),
			array('module', 'length', 'max'=>500),
			array('slider_text, url_link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('slider_id, slider_title, slider_image, slider_text, url_link, is_active, target, positions, module', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'slider_id' => 'Slider',
			'slider_title' => 'Slider Title',
			'slider_image' => 'Slider Image',
			'slider_text' => 'Slider Text',
			'url_link' => 'Url Link',
			'is_active' => 'Is Active',
			'target' => 'Target',
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

		$criteria->compare('slider_id',$this->slider_id);
		$criteria->compare('slider_title',$this->slider_title,true);
		$criteria->compare('slider_image',$this->slider_image,true);
		$criteria->compare('slider_text',$this->slider_text,true);
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
	 * @return SBBanner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
