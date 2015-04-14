<?php

/**
 * This is the model class for table "ifis".
 *
 * The followings are the available columns in table 'ifis':
 * @property integer $id_ifi
 * @property string $nombre_ifi
 * @property double $tasa_ifi
 * @property integer $plazo_min
 * @property integer $plazo_max
 * @property double $entrada
 * @property integer $dispositivo
 * @property double $valor_min_dispositivo
 * @property integer $seguro
 * @property double $tasa_seguro
 * @property double $coeficiente_ajuste
 */
class Ifis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ifis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_ifi, tasa_ifi, plazo_min, plazo_max, entrada, dispositivo, valor_min_dispositivo, seguro, tasa_seguro, coeficiente_ajuste', 'required'),
			array('plazo_min, plazo_max, dispositivo, seguro', 'numerical', 'integerOnly'=>true),
			array('tasa_ifi, entrada, valor_min_dispositivo, tasa_seguro, coeficiente_ajuste', 'numerical'),
			array('nombre_ifi', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ifi, nombre_ifi, tasa_ifi, plazo_min, plazo_max, entrada, dispositivo, valor_min_dispositivo, seguro, tasa_seguro, coeficiente_ajuste', 'safe', 'on'=>'search'),
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
			'id_ifi' => 'Id Ifi',
			'nombre_ifi' => 'Nombre Ifi',
			'tasa_ifi' => 'Tasa Ifi',
			'plazo_min' => 'Plazo Min',
			'plazo_max' => 'Plazo Max',
			'entrada' => 'Entrada',
			'dispositivo' => 'Dispositivo',
			'valor_min_dispositivo' => 'Valor Min Dispositivo',
			'seguro' => 'Seguro',
			'tasa_seguro' => 'Tasa Seguro',
			'coeficiente_ajuste' => 'Coeficiente Ajuste',
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

		$criteria->compare('id_ifi',$this->id_ifi);
		$criteria->compare('nombre_ifi',$this->nombre_ifi,true);
		$criteria->compare('tasa_ifi',$this->tasa_ifi);
		$criteria->compare('plazo_min',$this->plazo_min);
		$criteria->compare('plazo_max',$this->plazo_max);
		$criteria->compare('entrada',$this->entrada);
		$criteria->compare('dispositivo',$this->dispositivo);
		$criteria->compare('valor_min_dispositivo',$this->valor_min_dispositivo);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('tasa_seguro',$this->tasa_seguro);
		$criteria->compare('coeficiente_ajuste',$this->coeficiente_ajuste);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ifis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
