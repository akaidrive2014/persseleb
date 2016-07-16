<?php

/**
 * This is the model class for table "sb_videos".
 *
 * The followings are the available columns in table 'sb_videos':
 * @property integer $video_id
 * @property integer $gallery_id
 * @property string $video_title
 * @property string $video_key
 * @property string $video_description
 * @property string $video_thumb
 */
class SBVideo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_id, video_title, video_key', 'required'),
			array('video_key','unique'),
			array('gallery_id', 'numerical', 'integerOnly'=>true),
			array('video_title', 'length', 'max'=>500),
			array('video_key, video_thumb', 'length', 'max'=>5000),
			array('video_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('video_id, gallery_id, video_title, video_key, video_description, video_thumb', 'safe', 'on'=>'search'),
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
			'video_id' => 'ID',
			'gallery_id' => 'Gallery',
			'video_title' => 'Video Title',
			'video_key' => 'Video Key',
			'video_description' => 'Video Description',
			'video_thumb' => 'Video Thumb',
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

		$criteria->compare('video_id',$this->video_id);
		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('video_title',$this->video_title,true);
		$criteria->compare('video_key',$this->video_key,true);
		$criteria->compare('video_description',$this->video_description,true);
		$criteria->compare('video_thumb',$this->video_thumb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBVideo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
