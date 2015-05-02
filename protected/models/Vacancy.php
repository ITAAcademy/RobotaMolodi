<?php

/**
 * This is the model class for table "vacancy".
 *
 * The followings are the available columns in table 'vacancy':
 * @property string $id
 * @property string $organization_id
 * @property string $creation_date
 * @property string $position
 * @property string $description
 * @property string $salary
 * @property string $id_logo
 *
 * The followings are the available model relations:
 * @property Organization $organization
 * @property File $idLogo
 * @property VacancyCity[] $vacancyCities
 * @property VacancyEmail[] $vacancyEmails
 * @property VacancyField[] $vacancyFields
 * @property VacancyFile[] $vacancyFiles
 * @property VacancyPhone[] $vacancyPhones
 */
class Vacancy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vacancy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization_id, creation_date, position, description', 'required'),
			array('organization_id, salary, id_logo', 'length', 'max'=>10),
			array('position', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, organization_id, creation_date, position, description, salary, id_logo', 'safe', 'on'=>'search'),
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
			'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
			'idLogo' => array(self::BELONGS_TO, 'File', 'id_logo'),
			'vacancyCities' => array(self::HAS_MANY, 'VacancyCity', 'id_vacancy'),
			'vacancyEmails' => array(self::HAS_MANY, 'VacancyEmail', 'id_vacancy'),
			'vacancyFields' => array(self::HAS_MANY, 'VacancyField', 'id_vacancy'),
			'vacancyFiles' => array(self::HAS_MANY, 'VacancyFile', 'id_vacancy'),
			'vacancyPhones' => array(self::HAS_MANY, 'VacancyPhone', 'id_vacancy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Код',
			'organization_id' => 'Код организации',
			'creation_date' => 'Дата создания',
			'position' => 'Позиция',
			'description' => 'Описание',
			'salary' => 'Зарплата',
			'id_logo' => 'Id Logo',
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
		$criteria->compare('organization_id',$this->organization_id,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('salary',$this->salary,true);
		$criteria->compare('id_logo',$this->id_logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vacancy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
