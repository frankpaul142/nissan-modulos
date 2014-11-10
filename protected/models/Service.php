<?php

/**
 * This is the model class for table "service".
 *
 * The followings are the available columns in table 'service':
 * @property integer $id
 * @property integer $concessioner_id
 * @property integer $type_id
 * @property string $mail
 * @property string $schedule
 *
 * The followings are the available model relations:
 * @property Phone[] $phones
 * @property Type $type
 * @property Concessioner $concessioner
 */
class Service extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mail, schedule', 'required'),
			array('concessioner_id, type_id', 'numerical', 'integerOnly'=>true),
			array('mail, schedule', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, concessioner_id, type_id, mail, schedule', 'safe', 'on'=>'search'),
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
			'phones' => array(self::HAS_MANY, 'Phone', 'service_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
			'concessioner' => array(self::BELONGS_TO, 'Concessioner', 'concessioner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'concessioner_id' => 'Concesionario',
			'type_id' => 'Tipo',
			'mail' => 'Email',
			'schedule' => 'Horario',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('concessioner_id',$this->concessioner_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('schedule',$this->schedule,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Service the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
