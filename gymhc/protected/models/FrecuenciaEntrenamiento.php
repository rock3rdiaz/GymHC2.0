<?php

/**
 * This is the model class for table "frecuencia_entrenamiento".
 *
 * The followings are the available columns in table 'frecuencia_entrenamiento':
 * @property integer $idFrecuencia_entrenamiento
 * @property integer $sesiones_semana
 * @property integer $tiempo_entrenamiento
 * @property integer $idValoracion_funcional
 * @property string $habitos_nutricionales
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class FrecuenciaEntrenamiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'frecuencia_entrenamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sesiones_semana, idValoracion_funcional', 'required'),
			array('sesiones_semana, tiempo_entrenamiento, idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('habitos_nutricionales', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFrecuencia_entrenamiento, sesiones_semana, tiempo_entrenamiento, idValoracion_funcional, habitos_nutricionales', 'safe', 'on'=>'search'),
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
			'idFrecuencia_entrenamiento' => 'Id Frecuencia Entrenamiento',
			'sesiones_semana' => 'Sesiones Semana',
			'tiempo_entrenamiento' => 'Tiempo Entrenamiento',
			'idValoracion_funcional' => 'Id Valoracion Funcional',
			'habitos_nutricionales' => 'Habitos Nutricionales',
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

		$criteria->compare('idFrecuencia_entrenamiento',$this->idFrecuencia_entrenamiento);
		$criteria->compare('sesiones_semana',$this->sesiones_semana);
		$criteria->compare('tiempo_entrenamiento',$this->tiempo_entrenamiento);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);
		$criteria->compare('habitos_nutricionales',$this->habitos_nutricionales,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FrecuenciaEntrenamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
