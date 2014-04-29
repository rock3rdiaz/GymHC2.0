<?php

/**
 * This is the model class for table "cita".
 *
 * The followings are the available columns in table 'cita':
 * @property integer $idCita
 * @property string $tipo
 * @property string $fecha
 * @property string $motivo
 * @property integer $Empleado_idEmpleado
 * @property string $estado
 * @property integer $idVUsuario
 */
class Cita extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCita, tipo, fecha, motivo, Empleado_idEmpleado, estado, idVUsuario', 'required'),
			array('idCita, Empleado_idEmpleado, idVUsuario', 'numerical', 'integerOnly'=>true),
			array('tipo, motivo', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCita, tipo, fecha, motivo, Empleado_idEmpleado, estado, idVUsuario', 'safe', 'on'=>'search'),
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
			'usuario0' => array(self::BELONGS_TO, 'VUsuarios', 'idVUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCita' => 'Id Cita',
			'tipo' => 'Tipo',
			'fecha' => 'Fecha',
			'motivo' => 'Motivo',
			'Empleado_idEmpleado' => 'Empleado Id Empleado',
			'estado' => 'Estado',
			'idVUsuario' => 'Id Vusuario',
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

		$criteria->compare('idCita',$this->idCita);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('motivo',$this->motivo,true);
		$criteria->compare('Empleado_idEmpleado',$this->Empleado_idEmpleado);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('idVUsuario',$this->idVUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
	 * @summary: Metodo que retorna un array con las citas pendientes para el dia actual
	 * @param  [sting] $tipo [Tipo de cita: 'funcional' o 'medica']
	 * @param  [sting] $estado [Estado de la cita: 'pendiente', 'efectuada' o 'no realizada']
	 * @return [array] $lista_citas [Listado de citas del dia actual]
	 */
	public function appointmentsToday($tipo, $estado = 'pendiente'){

		/* Construccion del objeto Criteria basado en la siguiente sentencia sql. El argumento '101'
		*  presente en la funcion 'CONVERT' define el formato de salida de la fecha.
		*
		*'SELECT * FROM cita where tipo = 'funcional' and estado = 'pendiente' and fecha between 
			cast(Convert(date,GETDATE(), 101) as char)+' 00:00:00' and 
			cast(Convert(date,GETDATE(), 101) as char)+' 23:59:59' '*/

		//Limites de hora para el dia actual
		$_a = date('Y-m-d') . ' 00:00:00';
		$_b = date('Y-m-d') . ' 23:59:59';

		$criteria = new CDbCriteria();
		$criteria->select = 'idCita, fecha, idVUsuario, motivo';
		$criteria->condition = "estado = '$estado' and tipo = '$tipo'";
		$criteria->addBetweenCondition( 'fecha', $_a, $_b );
		$criteria->order = 'fecha asc';

		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
}
