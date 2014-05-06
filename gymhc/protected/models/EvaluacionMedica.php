<?php

/**
 * This is the model class for table "evaluacion_medica".
 *
 * The followings are the available columns in table 'evaluacion_medica':
 * @property integer $idEvaluacion_medica
 * @property string $enfermedad_actual
 * @property string $fecha_hora
 * @property integer $idHistoria_GYM
 *
 * The followings are the available model relations:
 * @property AntecedentesGinecobstetricos[] $antecedentesGinecobstetricoses
 * @property AntecedentesPatologicos[] $antecedentesPatologicoses
 * @property AntecedentesTraumaLesion[] $antecedentesTraumaLesions
 * @property HistoriaGym $idHistoriaGYM
 * @property Examen[] $examens
 * @property ExamenFisico[] $examenFisicos
 * @property ImpresionDiagnostica[] $impresionDiagnosticas
 * @property AntecedentesDeportivos[] $antecedentesDeportivoses
 */
class EvaluacionMedica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion_medica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enfermedad_actual, fecha_hora, idHistoria_GYM', 'required'),
			array('idHistoria_GYM', 'numerical', 'integerOnly'=>true),
			array('enfermedad_actual', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvaluacion_medica, enfermedad_actual, fecha_hora, idHistoria_GYM', 'safe', 'on'=>'search'),
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
			'antecedentesDeportivoses' => array(self::HAS_MANY, 'AntecedentesDeportivos', 'idEvaluacion_medica'),
			'antecedentesFamiliares' => array(self::HAS_MANY, 'AntecedentesFamiliares', 'idEvaluacion_medica'),
			'antecedentesGinecobstetricoses' => array(self::HAS_MANY, 'AntecedentesGinecobstetricos', 'idEvaluacion_medica'),
			'antecedentesPersonales' => array(self::HAS_MANY, 'AntecedentesPersonales', 'idEvaluacion_medica'),
			'antecedentesTraumaLesions' => array(self::HAS_MANY, 'AntecedentesTraumaLesion', 'idEvaluacion_medica'),
			'idHistoriaGYM' => array(self::BELONGS_TO, 'HistoriaGYM', 'idHistoria_GYM'),
			'examenFisicos' => array(self::HAS_MANY, 'ExamenFisico', 'idEvaluacion_medica'),
			'impresionDiagnosticas' => array(self::HAS_MANY, 'ImpresionDiagnostica', 'idEvaluacion_medica'),
			'antecedentesPatologicos' => array(self::HAS_MANY, 'AntecedentesPatologicos', 'idEvaluacion_medica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvaluacion_medica' => 'Codigo EM',
			'enfermedad_actual' => 'Enfermedad Actual',
			'fecha_hora' => 'Fecha Hora',
			'idHistoria_GYM' => 'Codigo HC',
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

		$criteria->compare('idEvaluacion_medica',$this->idEvaluacion_medica);
		$criteria->compare('enfermedad_actual',$this->enfermedad_actual,true);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		$criteria->compare('idHistoria_GYM',$this->idHistoria_GYM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvaluacionMedica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
