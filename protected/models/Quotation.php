<?php

/**
 * This is the model class for table "quotation".
 *
 * The followings are the available columns in table 'quotation':
 * @property integer $id
 * @property integer $client_id
 * @property integer $vehicle_version_id
 * @property integer $concessioner_id
 * @property integer $vehicle_version_id2
 * @property string $time
 *
 * The followings are the available model relations:
 * @property VehicleVersion $vehicleVersionId2
 * @property Client $client
 * @property VehicleVersion $vehicleVersion
 */
class Quotation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quotation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, vehicle_version_id, concessioner_id, vehicle_version_id2, time', 'required'),
			array('client_id, vehicle_version_id, concessioner_id, vehicle_version_id2', 'numerical', 'integerOnly'=>true),
			array('time', 'length', 'max'=>128),
			array('creation_date, review', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_id, vehicle_version_id, concessioner_id, vehicle_version_id2, time', 'safe', 'on'=>'search'),
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
			'vehicleversion2' => array(self::BELONGS_TO, 'VehicleVersion', 'vehicle_version_id2'),
			'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
			'vehicleversion' => array(self::BELONGS_TO, 'VehicleVersion', 'vehicle_version_id'),
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
			'client_id' => 'Cliente',
			'vehicle_version_id' => 'Vehiculo',
			'concessioner_id' => 'Concesionario',
			'vehicle_version_id2' => 'Vehiculo 2',
			'time' => 'Tiempo',
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
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('vehicle_version_id',$this->vehicle_version_id);
		$criteria->compare('concessioner_id',$this->concessioner_id);
		$criteria->compare('vehicle_version_id2',$this->vehicle_version_id2);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quotation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
