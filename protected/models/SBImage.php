<?php

/**
 * This is the model class for table "sb_images".
 *
 * The followings are the available columns in table 'sb_images':
 * @property integer $image_id
 * @property integer $gallery_id
 * @property string $image_title
 * @property string $image
 * @property integer $positions
 */
class SBImage extends CActiveRecord
{
	public $url_link;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_id, image_title, image', 'required'),
			array('gallery_id, positions', 'numerical', 'integerOnly'=>true),
			array('image_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('image_id, gallery_id, image_title, image, positions', 'safe', 'on'=>'search'),
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
			'image_id' => 'ID',
			'gallery_id' => 'Gallery',
			'image_title' => 'Image Title',
			'image' => 'Image',
			'positions' => 'Positions',
		);
	}
	
	public function afterFind(){
		$this->url_link = Yii::app()->getBaseUrl(TRUE).'/portfolio/'.$this->image_id.'/'.Website::slug($this->image_title);
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

		$criteria->compare('image_id',$this->image_id);
		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('image_title',$this->image_title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('positions',$this->positions);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
