<?php

/**
 * This is the model class for table "suggestion".
 *
 * The followings are the available columns in table 'suggestion':
 * @property integer $id
 * @property integer $concessioner_id
 * @property integer $vehicle_id
 * @property integer $client_id
 * @property string $description
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Client $client
 * @property Concessioner $concessioner
 * @property VehicleClient $vehicle
 */
class Suggestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suggestion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('concessioner_id, vehicle_id, client_id, description, type', 'required'),
			array('concessioner_id, vehicle_id, client_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>255),
				array('creation_date, review', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, concessioner_id, vehicle_id, client_id, description, type', 'safe', 'on'=>'search'),
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
			'concessioner_id' => 'Concessioner',
			'vehicle_id' => 'Vehicle',
			'client_id' => 'Client',
			'description' => 'Description',
			'type' => 'Type',
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
		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suggestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
