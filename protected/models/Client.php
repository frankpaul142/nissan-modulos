<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $id
 * @property string $identity
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $cellphone
 * @property string $preference_contact
 *
 * The followings are the available model relations:
 * @property TechnicalDate[] $technicalDates
 */
class Client extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identity, name, lastname, email, phone, cellphone, preference_contact', 'required'),
			array('identity, cellphone', 'length', 'max'=>10,'min'=>10),
			array('identity','identityEcuador'),
			array('name, lastname, preference_contact2', 'length', 'max'=>100),
			array('email', 'email'),
			array('medio', 'length', 'max'=>20),
			array('localize', 'length', 'max'=>50),
			array('phone', 'length', 'max'=>9,'min'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, identity, name, lastname, email, phone, cellphone, preference_contact', 'safe', 'on'=>'search'),
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
			'technicaldates' => array(self::HAS_MANY, 'TechnicalDate', 'client_id'),
			'replacements' => array(self::HAS_MANY, 'Replacement', 'client_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'identity' => 'Cédula',
			'name' => 'Nombre',
			'lastname' => 'Apellido',
			'email' => 'Email',
			'phone' => 'Teléfono',
			'cellphone' => 'Celular',
			'preference_contact' => 'Contacto',
			'preference_contact2' => 'Hora de Contacto',
			'localize' => 'Medio de localización',
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
		$criteria->compare('identity',$this->identity,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cellphone',$this->cellphone,true);
		$criteria->compare('preference_contact',$this->preference_contact,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
public function identityEcuador($attribute,$params) {	
// Verificamos si lo ingresado son  numeros
  $identity= $this->identity;	 
// verificamos si el numero de cedula tiene 10 digitos
if (strlen($identity)=='10') {

// verificamos si los dos primeros digitos son inferiores a 24 y superiores a 1
$c = substr($identity,0,2); // extraemos los primeros digitos	

// hacemos la verificacion
if( $c>='1' && $c<='24') {

// verificamos si el tercer digito es menor a 6
if ($identity[2]<6) {

// calculamos el digito de control
$imp="0"; // ponemos a cero los impares
$par="0"; // los pares
$c=0; // variable temporal
$d=0; // otra

for ($i=0; $i < 9; $i++) {
if($i%2==0) {
if ( ($identity[$i]*2) > 9 ) {
// le restamos 9 si la suma es superior a 9 a la multiplicacion por 2
$c= ($identity[$i]*2)-9 ;} else {
// si no pues multiplicamos por dos y ya
$c=($identity[$i]*2);}
$imp = $c+$imp;
}else{
if ( ($identity[$i]*1) > 9 ) {
// si es superior a 9 le restamos 9 a la multiplicacion por 1
$d= ($identity[$i]*1)-9 ;} else {
// si no pues solo multiplicamos
$d=($identity[$i]*1);}
$par = $d+$par;
}
} // sumamos resultados de los pares e impares
$suma = $par+$imp;

//Descontamos la decena superior
$z=0;
while($suma%10!=0) { $suma++; $z++; }
// comparamos si el ultimo digito de la cedula es igual al resultado obtenido.
if($z==$identity[9]) {	
 	
	 // cedula correcta	  
	
// damos errores todo el resto
}else {   $this->addError($attribute,'Cédula incorrecta.'); }

}else {  $this->addError($attribute,'Cédula incorrecta.');  }

}else {  $this->addError($attribute,'Cédula incorrecta.');  }

} else {  $this->addError($attribute,'Cédula incorrecta.'); }  // el largo es diferente de 10 digitos



}
 // fin de la function
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Client the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
