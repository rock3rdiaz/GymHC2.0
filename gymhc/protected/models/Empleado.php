<?php

/**
 * This is the model class for table "empleado".
 *
 * The followings are the available columns in table 'empleado':
 * @property integer $idEmpleado
 * @property string $nombres
 * @property string $apellidos
 * @property integer $idCargo
 * @property integer $Profesion_idProfesion
 * @property string $login
 * @property string $pass
 *
 * The followings are the available model relations:
 * @property Cita[] $citas
 * @property Cargo $idCargo0
 * @property Profesion $profesionIdProfesion
 * @property PlanEntrenamiento[] $planEntrenamientos
 */
class Empleado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, idCargo, Profesion_idProfesion, login, pass', 'required'),
			array('idCargo, Profesion_idProfesion', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, login, pass', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEmpleado, nombres, apellidos, idCargo, Profesion_idProfesion, login, pass', 'safe', 'on'=>'search'),
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
			'citas' => array(self::HAS_MANY, 'Cita', 'Empleado_idEmpleado'),
			'idCargo0' => array(self::BELONGS_TO, 'Cargo', 'idCargo'),
			'profesionIdProfesion' => array(self::BELONGS_TO, 'Profesion', 'Profesion_idProfesion'),
			'planEntrenamientos' => array(self::HAS_MANY, 'PlanEntrenamiento', 'idEmpleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEmpleado' => 'Id Empleado',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'idCargo' => 'Cargo',
			'Profesion_idProfesion' => 'Profesion',
			'login' => 'Login',
			'pass' => 'Pass',
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

		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('idCargo',$this->idCargo);
		$criteria->compare('Profesion_idProfesion',$this->Profesion_idProfesion);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @summary: Metodo que retorna el nombre completo del empleado
	 * @return [type] [description]
	 */
	public function getFullName(){

		return $this->nombres . ' ' . $this->apellidos;
	}

	/**
	 * @summary: Metodo que retorna una lista de con los empleados que poseen rol de fisioterapeuta o
	 * medico general. Utilizado por el controlador 'CitaController'. Su objetivo es listar solo aquellos
	 * empleados que poseen el rol para evaluar funcional o medicamente a un usuario.
	 *
	 * @return [array] $list [Listado de empleados]
	 */
	public function getListMedicalEmployees(){

		$criteria = new CDbCriteria();

		$criteria->with = array( 'idCargo0'=>array( 'condition'=>"nombre='fisioterapeuta' OR nombre='medico general'" ) );

		return $this->findAll( $criteria ); 
	}
}
