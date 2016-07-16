<?php

/**
 * This is the model class for table "sb_urlseo".
 *
 * The followings are the available columns in table 'sb_urlseo':
 * @property integer $id
 * @property string $url_matched
 * @property string $seo_title
 * @property string $keywords
 * @property string $description
 */
class SBUrlseo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_urlseo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url_matched, seo_title, seo_keywords, seo_description', 'required'),
			array('url_matched','unique'),
			array('is_active','numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('seo_id, url_matched, seo_title, seo_keywords, seo_description', 'safe', 'on'=>'search'),
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
			'seo_id' => 'ID',
			'url_matched' => 'Url Matched',
			'seo_title' => 'Title',
			'seo_keywords' => 'Keywords',
			'seo_description' => 'Description',
			'is_active'=>'Active',
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

		$criteria->compare('seo_id',$this->seo_id);
		$criteria->compare('url_matched',$this->url_matched,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBUrlseo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
