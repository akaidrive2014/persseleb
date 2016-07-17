<?php

/**
 * This is the model class for table "sb_news".
 *
 * The followings are the available columns in table 'sb_news':
 * @property integer $news_id
 * @property integer $category_id
 * @property string $news_title
 * @property string $news_date
 * @property string $news_thumb_image
 * @property string $news_content
 * @property string $original_url
 */
class SBNews extends CActiveRecord
{
	public $categories=array();
	public $display_date;
	public $display_categories;
	public $url_link;
	public $display_date_admin;
	
	public $gallery;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categories,news_title, news_date, news_content', 'required'),
			//array('news_title','unique'),
			array('seo_title,seo_keywords,seo_description,gallery,type,source,url,issliding,topnewsbanner,isfeatured','safe'),
			//array('category_id', 'numerical', 'integerOnly'=>true),
			array('news_title', 'length', 'max'=>100),
			array('news_thumb_image, original_url,category_id,topic_category,news_image_url,hits,source', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('news_id, category_id, news_title, news_date, news_thumb_image, news_content, original_url', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->	news_date = date('Y-m-d',strtotime(str_replace('/', '-', $this->news_date)));
			$this->categories = implode(',',$this->categories);
			$this->category_id = $this->categories;
			return TRUE;
		}
	}
	
	public function afterSave(){
		$this->categories=explode(',',$this->categories);
		$CategoriesNewsRelation = SBNewsCategoryRelation::model()->findAll(array('condition'=>'news_id=:id','params'=>array(':id'=>$this->news_id)));
		if(!empty($CategoriesNewsRelation)){
			$CategoriesNewsRelation = SBNewsCategoryRelation::model()->deleteAll('news_id=:id',array(':id'=>$this->news_id));
		}
		foreach($this->categories as $category_id){
			$SBNewsCategoryRelation = NEW SBNewsCategoryRelation;
			$SBNewsCategoryRelation->category_id = $category_id;
			$SBNewsCategoryRelation->news_id = $this->primaryKey;
			$SBNewsCategoryRelation->save();
		}
		
		//save image
		
		//$this->gallery['title'];
		
		if(isset($this->gallery['image'])){
			$images = $this->gallery['image'];
			SBNewsImage::model()->deleteAll(
		    	'news_id=:id',
		    	array('id' => $this->primaryKey)
			);
			if(!empty($images)){
				foreach($images as $image){
					$model = New SBNewsImage;
					$model->news_id = $this->primaryKey;
					$model->image = $image;
					$model->save();
				}
			}
		}
		
		parent::afterSave();
		
	}
	
	public function afterFind(){	 
		$this->	display_date_admin = date('d/m/Y',strtotime($this->news_date));
		$this->display_date = date('M dS, Y',strtotime($this->news_date));
		$this->url_link = Yii::app()->getBaseUrl(TRUE).'/'.date('Y/m/d',strtotime($this->news_date)).'/'.$this->news_id.'/'.Website::slug($this->news_title);
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
			'news_id' => 'ID',
			'categories' => 'Category',
			'news_title' => 'News Title',
			'news_date' => 'Published Date',
			'news_thumb_image' => 'News Thumb Image',
			'news_content' => 'News Content',
			'original_url' => 'Original Url',
			'category_id'=>'Category'
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

		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('news_title',$this->news_title,true);
		$criteria->compare('news_date',$this->news_date,true);
		$criteria->compare('news_thumb_image',$this->news_thumb_image,true);
		$criteria->compare('news_content',$this->news_content,true);
		$criteria->compare('original_url',$this->original_url,true);
		$criteria->compare('source',$this->source,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
