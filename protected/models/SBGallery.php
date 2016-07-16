<?php

/**
 * This is the model class for table "sb_galleries".
 *
 * The followings are the available columns in table 'sb_galleries':
 * @property integer $gallery_id
 * @property string $gallery_title
 * @property string $gallery_cover
 * @property string $seo_keywords
 * @property string $seo_title
 * @property string $seo_description
 * @property integer $positions
 */
class SBGallery extends CActiveRecord
{
	public $url_link;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_galleries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_title', 'required'),
			array('gallery_title','unique'),
			array('positions', 'numerical', 'integerOnly'=>true),
			array('gallery_title', 'length', 'max'=>300),
			array('gallery_cover', 'length', 'max'=>500),
			array('seo_keywords, seo_title, seo_description,url_live', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gallery_id, gallery_title, gallery_cover, seo_keywords, seo_title, seo_description, positions', 'safe', 'on'=>'search'),
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
			'gallery_id' => 'ID',
			'gallery_title' => 'Gallery Title',
			'gallery_cover' => 'Gallery Cover',
			'seo_keywords' => 'Seo Keywords',
			'seo_title' => 'Seo Title',
			'seo_description' => 'Seo Description',
			'positions' => 'Positions',
		);
	}

	public function afterFind(){
		$this->url_link = Yii::app()->getBaseUrl(TRUE).'/portfolio/'.$this->gallery_id.'/'.Website::slug($this->gallery_title);
		parent::afterFind();
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->url_live = 'http://'.str_replace('http://','',$this->url_live);
			return true;
		}
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

		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('gallery_title',$this->gallery_title,true);
		$criteria->compare('gallery_cover',$this->gallery_cover,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('positions',$this->positions);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBGallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
