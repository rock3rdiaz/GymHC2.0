<?php

/**
 * This is the model class for table "plan_entrenamiento".
 *
 * The followings are the available columns in table 'plan_entrenamiento':
 * @property integer $idPlan_entrenamiento
 * @property string $fecha_creacion
 * @property string $objetivo
 * @property string $tipo_trabajo
 * @property string $saludable
 * @property string $recomendaciones
 * @property integer $idValoracion_funcional
 * @property integer $idEmpleado
 *
 * The followings are the available model relations:
 * @property ClasesGrupales[] $clasesGrupales
 * @property Empleado $idEmpleado0
 * @property ValoracionFuncional $idValoracionFuncional
 * @property ProgramaEjercicios[] $programaEjercicioses
 * @property TrabajoCardiovascular[] $trabajoCardiovasculars
 * @property TrabajoEstiramiento[] $trabajoEstiramientos
 */
class PlanEntrenamiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plan_entrenamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, objetivo, tipo_trabajo, recomendaciones, idValoracion_funcional', 'required'),
			array('idValoracion_funcional, idEmpleado', 'numerical', 'integerOnly'=>true),
			array('objetivo', 'length', 'max'=>100),
			array('tipo_trabajo', 'length', 'max'=>45),
			array('saludable', 'length', 'max'=>60),
			array('recomendaciones', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPlan_entrenamiento, fecha_creacion, objetivo, tipo_trabajo, saludable, recomendaciones, idValoracion_funcional, idEmpleado', 'safe', 'on'=>'search'),
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
			'clasesGrupales' => array(self::HAS_MANY, 'ClasesGrupales', 'idPlan_entrenamiento'),
			'idEmpleado0' => array(self::BELONGS_TO, 'Empleado', 'idEmpleado'),
			'idValoracionFuncional' => array(self::BELONGS_TO, 'ValoracionFuncional', 'idValoracion_funcional'),
			'programaEjercicioses' => array(self::HAS_MANY, 'ProgramaEjercicios', 'idPlan_entrenamiento'),
			'trabajoCardiovasculars' => array(self::HAS_MANY, 'TrabajoCardiovascular', 'idPlan_entrenamiento'),
			'trabajoEstiramientos' => array(self::HAS_MANY, 'TrabajoEstiramiento', 'idPlan_entrenamiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPlan_entrenamiento' => 'Id Plan Entrenamiento',
			'fecha_creacion' => 'Fecha Creacion',
			'objetivo' => 'Objetivo',
			'tipo_trabajo' => 'Tipo Trabajo',
			'saludable' => 'Saludable',
			'recomendaciones' => 'Recomendaciones',
			'idValoracion_funcional' => 'Id Valoracion Funcional',
			'idEmpleado' => 'Id Empleado',
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

		$criteria->compare('idPlan_entrenamiento',$this->idPlan_entrenamiento);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('objetivo',$this->objetivo,true);
		$criteria->compare('tipo_trabajo',$this->tipo_trabajo,true);
		$criteria->compare('saludable',$this->saludable,true);
		$criteria->compare('recomendaciones',$this->recomendaciones,true);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);
		$criteria->compare('idEmpleado',$this->idEmpleado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlanEntrenamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
