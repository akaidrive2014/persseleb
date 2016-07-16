<?php

/**
 * This is the model class for table "os_put_project".
 *
 * The followings are the available columns in table 'os_put_project':
 * @property integer $id
 * @property string $name
 * @property string $company_name
 * @property string $email
 * @property integer $phone
 * @property string $subject
 * @property string $message
 */
class OSPutProject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'os_put_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone, subject, message', 'required'),
			array('email','email'),
			array('phone', 'length', 'max'=>15,'min'=>6),
			array('phone', 'numerical', 'integerOnly'=>true),
			array('name, company_name, email, subject', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, company_name, email, phone, subject, message', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Nama',
			'company_name' => 'Company Name',
			'email' => 'Email',
			'phone' => 'No. Telepone/HP',
			'subject' => 'Subject',
			'message' => 'Pesan',
		);
	}
	
	public function afterSave(){
		if($this->isNewRecord){
			$mail = New Mail;
			$Template = $mail->template(4);
			$mail->send_to = $this->email;
			$mail->email_subject = $Template->email_subject;
			$message = str_replace('#RECEIVER_EMAIL#', $this->email, $Template->template_html);
			$message_2 = str_replace('#RECEIVER_NAME#', $this->name, $message);
			$message_3 = str_replace('#MESSAGE#', nl2br($this->message), $message_2);
			$mail->message = $message_3;
			$mail->sendEmail();
			
			$mail->send_to = '';
			$mail->email_subject = $this->subject;
			$mail->message = nl2br($this->message);
			$mail->message .= nl2br("<p style=\"font-style:italic;\">
				Sender Info:
				   - Name : {$this->name}
				   - Email : {$this->email}
				   - Phone: {$this->phone}
			</p>");
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OSPutProject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
