<?php

/**
 * This is the model class for table "resume".
 *
 * The followings are the available columns in table 'resume':
 * @property string $id
 * @property string $user_id
 * @property string $id_city
 * @property string $id_field
 * @property string $name
 * @property string $create_date
 * @property integer $salary
 * @property string $description
 * @property string $id_email
 * @property string $id_phone
 * @property string $id_file
 * @property string $id_photo
 *
 * The followings are the available model relations:
 * @property User $user
 * @property City $idCity
 * @property Field $idField
 * @property Email $idEmail
 * @property Phones $idPhone
 * @property File $idFile
 * @property File $idPhoto
 */
class Resume extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resume';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, id_city, id_field, name, create_date, description, id_email, id_phone', 'required'),
			array('salary', 'numerical', 'integerOnly'=>true),
			array('user_id, id_city, id_field, id_email, id_phone, id_file, id_photo', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, id_city, id_field, name, create_date, salary, description, id_email, id_phone, id_file, id_photo', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'idCity' => array(self::BELONGS_TO, 'City', 'id_city'),
			'idField' => array(self::BELONGS_TO, 'Field', 'id_field'),
			'idEmail' => array(self::BELONGS_TO, 'Email', 'id_email'),
			'idPhone' => array(self::BELONGS_TO, 'Phones', 'id_phone'),
			'idFile' => array(self::BELONGS_TO, 'File', 'id_file'),
			'idPhoto' => array(self::BELONGS_TO, 'File', 'id_photo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Код',
			'user_id' => 'User',
			'id_city' => 'Код города',
			'id_field' => 'Код отрасли',
			'name' => 'Name',
			'create_date' => 'Create Date',
			'salary' => 'Salary',
			'description' => 'Description',
			'id_email' => 'Id Email',
			'id_phone' => 'Id Phone',
			'id_file' => 'Id File',
			'id_photo' => 'Id Photo',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('id_city',$this->id_city,true);
		$criteria->compare('id_field',$this->id_field,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('salary',$this->salary);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id_email',$this->id_email,true);
		$criteria->compare('id_phone',$this->id_phone,true);
		$criteria->compare('id_file',$this->id_file,true);
		$criteria->compare('id_photo',$this->id_photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resume the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
