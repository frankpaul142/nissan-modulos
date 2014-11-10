<?php

/**
 * This is the model class for table "satisfaction_s".
 *
 * The followings are the available columns in table 'satisfaction_s':
 * @property integer $id
 * @property integer $suggestion_id
 * @property string $contact
 * @property string $score
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Suggestion $suggestion
 */
class SatisfactionS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'satisfaction_s';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suggestion_id, contact, score', 'required'),
			array('id, suggestion_id', 'numerical', 'integerOnly'=>true),
			array('contact', 'length', 'max'=>3),
			array('score', 'length', 'max'=>2),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suggestion_id, contact, score, description', 'safe', 'on'=>'search'),
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
			'suggestion' => array(self::BELONGS_TO, 'Suggestion', 'suggestion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suggestion_id' => 'Suggestion',
			'contact' => 'Contact',
			'score' => 'Score',
			'description' => 'Description',
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
		$criteria->compare('suggestion_id',$this->suggestion_id);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('score',$this->score,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SatisfactionS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
