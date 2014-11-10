<?php

/**
 * This is the model class for table "vehicle_client".
 *
 * The followings are the available columns in table 'vehicle_client':
 * @property integer $id
 * @property string $model
 * @property string $year
 * @property string $license_plate
 * @property string $kilometer
 *
 * The followings are the available model relations:
 * @property TechnicalDate[] $technicalDates
 */
class VehicleClient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model, year, license_plate, kilometer', 'required'),
			array('model', 'length', 'max'=>100),
			array('year', 'length', 'max'=>4),
			array('license_plate', 'length', 'max'=>7),
			array('license_plate', 'length', 'min'=>6),
			array('kilometer', 'length', 'max'=>8),
			array('chasis', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, model, year, license_plate, kilometer, chasis', 'safe', 'on'=>'search'),
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
			'technicalDates' => array(self::HAS_MANY, 'TechnicalDate', 'vehicle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'model' => 'Modelo',
			'year' => 'Año',
			'license_plate' => 'Placa',
			'kilometer' => 'Kilometraje',
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
		$criteria->compare('model',$this->model,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('license_plate',$this->license_plate,true);
		$criteria->compare('kilometer',$this->kilometer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleClient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
