<?php

/**
 * This is the model class for table "VUsuarios".
 *
 * The followings are the available columns in table 'VUsuarios':
 * @property integer $id_usuarios
 * @property string $identificacion
 * @property string $tipo_identificacion
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $sexo
 * @property string $fecha_nac
 * @property string $fecha_ingreso
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $mail
 * @property integer $tipo
 * @property string $categoria
 * @property integer $estado
 * @property integer $tipo_ingreso
 * @property integer $id_grupo
 * @property integer $id_profesion
 */
class VUsuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VUsuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identificacion, tipo_identificacion, primer_nombre, primer_apellido, sexo, fecha_nac, fecha_ingreso, telefono, celular, mail, estado, tipo_ingreso, id_grupo, id_profesion', 'required'),
			array('tipo, estado, tipo_ingreso, id_grupo, id_profesion', 'numerical', 'integerOnly'=>true),
			array('identificacion', 'length', 'max'=>30),
			array('tipo_identificacion, categoria', 'length', 'max'=>2),
			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, mail', 'length', 'max'=>50),
			array('sexo', 'length', 'max'=>1),
			array('direccion', 'length', 'max'=>255),
			array('telefono, celular', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuarios, identificacion, tipo_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, fecha_nac, fecha_ingreso, direccion, telefono, celular, mail, tipo, categoria, estado, tipo_ingreso, id_grupo, id_profesion', 'safe', 'on'=>'search'),
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
			'id_usuarios' => 'Id Usuarios',
			'identificacion' => 'Identificacion',
			'tipo_identificacion' => 'Tipo Identificacion',
			'primer_nombre' => 'Primer Nombre',
			'segundo_nombre' => 'Segundo Nombre',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'sexo' => 'Sexo',
			'fecha_nac' => 'Fecha Nac',
			'fecha_ingreso' => 'Fecha Ingreso',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'mail' => 'Mail',
			'tipo' => 'Tipo',
			'categoria' => 'Categoria',
			'estado' => 'Estado',
			'tipo_ingreso' => 'Tipo Ingreso',
			'id_grupo' => 'Id Grupo',
			'id_profesion' => 'Id Profesion',
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

		$criteria->compare('id_usuarios',$this->id_usuarios);
		$criteria->compare('identificacion',$this->identificacion,true);
		$criteria->compare('tipo_identificacion',$this->tipo_identificacion,true);
		$criteria->compare('primer_nombre',$this->primer_nombre,true);
		$criteria->compare('segundo_nombre',$this->segundo_nombre,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('tipo_ingreso',$this->tipo_ingreso);
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('id_profesion',$this->id_profesion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VUsuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFullName(){

		return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->primer_apellido
						 . ' ' . $this->segundo_apellido;
	}
}
