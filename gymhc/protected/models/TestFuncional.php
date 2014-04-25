<?php

/**
 * This is the model class for table "test_funcional".
 *
 * The followings are the available columns in table 'test_funcional':
 * @property integer $idTest_funcional
 * @property string $resistencia_cardiorespiratoria
 * @property string $fuerza_abdominal
 * @property string $resistencia_flexion_brazo
 * @property string $resistencia_brazo_mancuerna
 * @property string $resistencia_fuerza_sentadilla
 * @property string $fuerza_pierna_100
 * @property integer $flexibilidad
 * @property integer $idValoracion_funcional
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class TestFuncional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_funcional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idValoracion_funcional', 'required'),
			array('flexibilidad, idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('resistencia_cardiorespiratoria, resistencia_brazo_mancuerna, resistencia_fuerza_sentadilla, fuerza_pierna_100', 'length', 'max'=>8),
			array('fuerza_abdominal, resistencia_flexion_brazo', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTest_funcional, resistencia_cardiorespiratoria, fuerza_abdominal, resistencia_flexion_brazo, resistencia_brazo_mancuerna, resistencia_fuerza_sentadilla, fuerza_pierna_100, flexibilidad, idValoracion_funcional', 'safe', 'on'=>'search'),
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
			'idValoracionFuncional' => array(self::BELONGS_TO, 'ValoracionFuncional', 'idValoracion_funcional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTest_funcional' => 'Id Test Funcional',
			'resistencia_cardiorespiratoria' => 'Res. Cardiorespiratoria',
			'fuerza_abdominal' => 'Fuerza Abdominal',
			'resistencia_flexion_brazo' => 'Res. Flexion Brazo',
			'resistencia_brazo_mancuerna' => 'Res. Brazo Mancuerna',
			'resistencia_fuerza_sentadilla' => 'Res. Fuerza Sentadilla',
			'fuerza_pierna_100' => 'Fuerza Pierna',
			'flexibilidad' => 'Flexibilidad',
			'idValoracion_funcional' => 'Id Valoracion Funcional',
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

		$criteria->compare('idTest_funcional',$this->idTest_funcional);
		$criteria->compare('resistencia_cardiorespiratoria',$this->resistencia_cardiorespiratoria,true);
		$criteria->compare('fuerza_abdominal',$this->fuerza_abdominal,true);
		$criteria->compare('resistencia_flexion_brazo',$this->resistencia_flexion_brazo,true);
		$criteria->compare('resistencia_brazo_mancuerna',$this->resistencia_brazo_mancuerna,true);
		$criteria->compare('resistencia_fuerza_sentadilla',$this->resistencia_fuerza_sentadilla,true);
		$criteria->compare('fuerza_pierna_100',$this->fuerza_pierna_100,true);
		$criteria->compare('flexibilidad',$this->flexibilidad);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestFuncional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
