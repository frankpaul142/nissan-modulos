<?php

/**
 * This is the model class for table "technical_date".
 *
 * The followings are the available columns in table 'technical_date':
 * @property integer $id
 * @property integer $client_id
 * @property integer $vehicule_id
 * @property integer $concessioner_id
 * @property string $creation_date
 * @property string $work
 * @property string $preference_date
 * @property string $hour
 * @property string $taxi
 *
 * The followings are the available model relations:
 * @property Client $client
 * @property Concessioner $concessioner
 * @property Vehicule $vehicule
 */
class TechnicalDate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'technical_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, vehicle_id,concessioner_id, work, preference_date, hour, taxi', 'required'),
			array('client_id, vehicle_id, concessioner_id', 'numerical', 'integerOnly'=>true),
			array('hour', 'length', 'max'=>10),
			array('taxi', 'length', 'max'=>3),
			array("detail_work","safe"),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_id, vehicle_id, concessioner_id, creation_date, work, preference_date, hour, taxi', 'safe', 'on'=>'search'),
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
			'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
			'concessioner' => array(self::BELONGS_TO, 'Concessioner', 'concessioner_id'),
			'vehicle' => array(self::BELONGS_TO, 'VehicleClient', 'vehicle_id'),
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
			'vehicle_id' => 'Vehículo',
			'concessioner_id' => 'Concesionario',
			'creation_date' => 'Fecha',
			'work' => 'trabajo',
			'preference_date' => 'Dia de preferencia',
			'hour' => 'Hora',
			'taxi' => 'Taxi',
			'detail_work'=>'Detalle de trabajo'
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
		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('concessioner_id',$this->concessioner_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('work',$this->work,true);
		$criteria->compare('preference_date',$this->preference_date,true);
		$criteria->compare('hour',$this->hour,true);
		$criteria->compare('taxi',$this->taxi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TechnicalDate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
