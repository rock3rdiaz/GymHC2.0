<?php

/**
 * This is the model class for table "datos_extra_usuario".
 *
 * The followings are the available columns in table 'datos_extra_usuario':
 * @property integer $idDatos_extra_usuario
 * @property string $tipo_aporte
 * @property integer $idEPS
 * @property string $estado_civil
 * @property string $lugar_nacimiento
 * @property string $acompaniante
 * @property string $ocupacion
 * @property integer $idVUsuario
 * @property string $parentezco_acompaniante
 *
 * The followings are the available model relations:
 * @property Eps $idEPS0
 */
class DatosExtraUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_extra_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_aporte, idEPS, estado_civil, lugar_nacimiento, idVUsuario', 'required'),
			array('idEPS, idVUsuario', 'numerical', 'integerOnly'=>true),
			array('tipo_aporte, estado_civil', 'length', 'max'=>15),
			array('lugar_nacimiento', 'length', 'max'=>20),
			array('acompaniante, ocupacion, parentezco_acompaniante', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDatos_extra_usuario, tipo_aporte, idEPS, estado_civil, lugar_nacimiento, acompaniante, ocupacion, idVUsuario, parentezco_acompaniante', 'safe', 'on'=>'search'),
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
			'idEPS0' => array(self::BELONGS_TO, 'Eps', 'idEPS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDatos_extra_usuario' => 'Id Datos Extra Usuario',
			'tipo_aporte' => 'Tipo Aporte',
			'idEPS' => 'Id Eps',
			'estado_civil' => 'Estado Civil',
			'lugar_nacimiento' => 'Lugar Nacimiento',
			'acompaniante' => 'Acompaniante',
			'ocupacion' => 'Ocupacion',
			'idVUsuario' => 'Id Vusuario',
			'parentezco_acompaniante' => 'Parentezco Acompaniante',
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

		$criteria->compare('idDatos_extra_usuario',$this->idDatos_extra_usuario);
		$criteria->compare('tipo_aporte',$this->tipo_aporte,true);
		$criteria->compare('idEPS',$this->idEPS);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('lugar_nacimiento',$this->lugar_nacimiento,true);
		$criteria->compare('acompaniante',$this->acompaniante,true);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('idVUsuario',$this->idVUsuario);
		$criteria->compare('parentezco_acompaniante',$this->parentezco_acompaniante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DatosExtraUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
