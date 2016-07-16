<?php

/**
 * This is the model class for table "sb_pages".
 *
 * The followings are the available columns in table 'sb_pages':
 * @property integer $page_id
 * @property string $page_name
 * @property string $page_image
 * @property string $page_slug
 * @property string $page_content
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class SBPage extends CActiveRecord
{
	public $url_link;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_name, page_content', 'required'),
			array('page_slug,page_name','unique'),
			array('page_name, page_slug', 'length', 'max'=>100),
			array('seo_title, seo_keywords', 'length', 'max'=>3000),
			array('page_image, seo_description,page_slug', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('page_id, page_name, page_image, page_slug, page_content, seo_title, seo_keywords, seo_description', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->page_slug = empty($this->page_slug) ? Website::slug($this->page_name) : Website::slug($this->page_slug);
			if(empty($this->page_banners)){
				$data = array(
					'banner'=>array(
						'banner_title'=>'',
						'banner_image'=>'',
					)
				);
				$this->page_banners = json_encode($data);
			}
			return TRUE;
		}
	}
	
	public function afterFind(){
		$this->url_link = Website::baseUrl().'/'.$this->page_slug;
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
			'page_id' => 'ID',
			'page_name' => 'Page Name',
			'page_image' => 'Page Image',
			'page_slug' => 'Page Slug',
			'page_content' => 'Page Content',
			'seo_title' => 'Seo Title',
			'seo_keywords' => 'Seo Keywords',
			'seo_description' => 'Seo Description',
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

		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('page_name',$this->page_name,true);
		$criteria->compare('page_image',$this->page_image,true);
		$criteria->compare('page_slug',$this->page_slug,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('seo_description',$this->seo_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBPage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
