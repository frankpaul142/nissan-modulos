<?php

/**
 * This is the model class for table "replacement".
 *
 * The followings are the available columns in table 'replacement':
 * @property integer $id
 * @property integer $concessioner_id
 * @property integer $client_id
 * @property integer $vehicle_id
 * @property string $part
 *
 * The followings are the available model relations:
 * @property VehicleClient $vehicle
 * @property Client $client
 * @property Concessioner $concessioner
 */
class Replacement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'replacement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('concessioner_id, client_id, vehicle_id, part', 'required'),
			array('id, concessioner_id, client_id, vehicle_id', 'numerical', 'integerOnly'=>true),
			array('part', 'length', 'max'=>255),
				array('creation_date, review', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, concessioner_id, client_id, vehicle_id, part', 'safe', 'on'=>'search'),
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
			'vehicle' => array(self::BELONGS_TO, 'VehicleClient', 'vehicle_id'),
			'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
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
			'client_id' => 'Cliente',
			'vehicle_id' => 'Vehiculo',
			'part' => 'Parte',
			'creation_date'=>'Fecha de creación'
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
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('part',$this->part,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Replacement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
