<?php

/**
 * This is the model class for table "vehicle_version".
 *
 * The followings are the available columns in table 'vehicle_version':
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $status
 * @property string $reference
 * @property string $motor
 * @property string $type
 * @property string $transmission
 * @property string $combustion
 * @property string $ac
 * @property string $airbag
 * @property string $abs
 * @property string $others
 * @property double $normal_price
 * @property double $final_price
 * @property double $accesories_price
 *
 * The followings are the available model relations:
 * @property Quotation[] $quotations
 * @property Vehicle $vehicle
 */
class VehicleVersion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_version';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, reference, motor, type, transmission, combustion, ac, airbag, abs, others, normal_price, final_price, accesories_price', 'required'),
			array('vehicle_id', 'numerical', 'integerOnly'=>true),
			array('normal_price, final_price, accesories_price', 'numerical'),
			array('status', 'length', 'max'=>8),
			array('reference, motor, type, transmission', 'length', 'max'=>255),
			array('combustion', 'length', 'max'=>20),
			array('ac, abs', 'length', 'max'=>3),
			array('airbag', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vehicle_id, status, reference, motor, type, transmission, combustion, ac, airbag, abs, others, normal_price, final_price, accesories_price', 'safe', 'on'=>'search'),
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
			'quotations' => array(self::HAS_MANY, 'Quotation', 'vehicle_version_id'),
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
			   'replacements' => array(self::HAS_MANY, 'Replacement', 'vehicle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vehicle_id' => 'Vehículo',
			'status' => 'Status',
			'reference' => 'Referencia',
			'motor' => 'Motor',
			'type' => 'Tipo',
			'transmission' => 'Transmisión',
			'combustion' => 'Combustión',
			'ac' => 'Ac',
			'airbag' => 'Airbag',
			'abs' => 'Abs',
			'others' => 'Otros',
			'normal_price' => 'Precio normal',
			'final_price' => 'Precio final',
			'accesories_price' => 'Precio accesorios',
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
		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('motor',$this->motor,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('transmission',$this->transmission,true);
		$criteria->compare('combustion',$this->combustion,true);
		$criteria->compare('ac',$this->ac,true);
		$criteria->compare('airbag',$this->airbag,true);
		$criteria->compare('abs',$this->abs,true);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('normal_price',$this->normal_price);
		$criteria->compare('final_price',$this->final_price);
		$criteria->compare('accesories_price',$this->accesories_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleVersion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
