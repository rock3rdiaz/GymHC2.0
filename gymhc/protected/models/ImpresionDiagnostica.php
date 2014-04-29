<?php

/**
 * This is the model class for table "impresion_diagnostica".
 *
 * The followings are the available columns in table 'impresion_diagnostica':
 * @property integer $idImpresion_diagnostica
 * @property string $riesgo_cardiovascular
 * @property string $riesgo_osteomuscular
 * @property string $peso
 * @property string $conducta
 * @property string $observaciones
 * @property integer $idEvaluacion_medica
 * @property string $recomendaciones_nutricionales
 * @property string $tipo_actividad_fisica
 * @property string $justificacion_actividad_fisica
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica $idEvaluacionMedica
 */
class ImpresionDiagnostica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'impresion_diagnostica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('riesgo_cardiovascular, riesgo_osteomuscular, peso, conducta, idEvaluacion_medica, recomendaciones_nutricionales, tipo_actividad_fisica, justificacion_actividad_fisica', 'required'),
			array('idEvaluacion_medica', 'numerical', 'integerOnly'=>true),
			array('riesgo_cardiovascular, riesgo_osteomuscular, peso', 'length', 'max'=>20),
			array('conducta, recomendaciones_nutricionales, justificacion_actividad_fisica', 'length', 'max'=>100),
			array('observaciones', 'length', 'max'=>65),
			array('tipo_actividad_fisica', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idImpresion_diagnostica, riesgo_cardiovascular, riesgo_osteomuscular, peso, conducta, observaciones, idEvaluacion_medica, recomendaciones_nutricionales, tipo_actividad_fisica, justificacion_actividad_fisica', 'safe', 'on'=>'search'),
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
			'idEvaluacionMedica' => array(self::BELONGS_TO, 'EvaluacionMedica', 'idEvaluacion_medica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idImpresion_diagnostica' => 'Id Impresion Diagnostica',
			'riesgo_cardiovascular' => 'Riesgo Cardiovascular',
			'riesgo_osteomuscular' => 'Riesgo Osteomuscular',
			'peso' => 'Peso',
			'conducta' => 'Conducta',
			'observaciones' => 'Observaciones',
			'idEvaluacion_medica' => 'Id Evaluacion Medica',
			'recomendaciones_nutricionales' => 'Recomendaciones Nutricionales',
			'tipo_actividad_fisica' => 'Tipo Actividad Fisica',
			'justificacion_actividad_fisica' => 'Justificacion Actividad Fisica',
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

		$criteria->compare('idImpresion_diagnostica',$this->idImpresion_diagnostica);
		$criteria->compare('riesgo_cardiovascular',$this->riesgo_cardiovascular,true);
		$criteria->compare('riesgo_osteomuscular',$this->riesgo_osteomuscular,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('conducta',$this->conducta,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);
		$criteria->compare('recomendaciones_nutricionales',$this->recomendaciones_nutricionales,true);
		$criteria->compare('tipo_actividad_fisica',$this->tipo_actividad_fisica,true);
		$criteria->compare('justificacion_actividad_fisica',$this->justificacion_actividad_fisica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImpresionDiagnostica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
