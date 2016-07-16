<?php

/**
 * This is the model class for table "sb_emails".
 *
 * The followings are the available columns in table 'sb_emails':
 * @property integer $email_id
 * @property string $email
 * @property string $note
 * @property string $type
 */
class SBEmail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sb_emails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('email','email'),
			array('email','unique'),
			array('email, note, type', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email_id, email, note, type', 'safe', 'on'=>'search'),
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
			'email_id' => 'Email',
			'email' => 'Email',
			'note' => 'Note',
			'type' => 'Type',
		);
	}
	
	public function afterSave(){
		if($this->isNewRecord){
			$mail = New Mail;
			$Template = $mail->template(3);
			$mail->send_to = $this->email;
			$mail->email_subject = $Template->email_subject;
			$message = str_replace('#RECEIVER_EMAIL#', $this->email, $Template->template_html);
			$mail->message = $message;
			$mail->sendEmail();
		}
		parent::afterSave();
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

		$criteria->compare('email_id',$this->email_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SBEmail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
