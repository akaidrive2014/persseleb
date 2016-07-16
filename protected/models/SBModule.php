<?php

/**
 * This is the model class for table "sb_modules".
 *
 * The followings are the available columns in table 'sb_modules':
 * @property integer $module_id
 * @property string $module_name
 * @property string $module_banner
 * @property string $banner_text
 */
class SBModule extends CActiveRecord
{
	public $url_link;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_modules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module_id, module_name', 'required'),
			array('module_id', 'numerical', 'integerOnly'=>true),
			array('module_name', 'length', 'max'=>100),
			array('banner_title, banner_image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('module_id, module_name, module_banner, banner_text', 'safe', 'on'=>'search'),
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
			'module_id' => 'Module',
			'module_name' => 'Module Name',
			'module_banner' => 'Module Banner',
			'banner_text' => 'Banner Text',
		);
	}
	
	public function afterFind(){
		$this->url_link = $this->module_name == "home" ? Website::baseUrl() : Website::baseUrl().'/'.$this->module_name;
		parent::afterFind();
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

		$criteria->compare('module_id',$this->module_id);
		$criteria->compare('module_name',$this->module_name,true);
		$criteria->compare('module_banner',$this->module_banner,true);
		$criteria->compare('banner_text',$this->banner_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBModule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
