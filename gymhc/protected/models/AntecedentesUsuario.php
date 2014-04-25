<?php

/**
 * This is the model class for table "antecedentes_usuario".
 *
 * The followings are the available columns in table 'antecedentes_usuario':
 * @property integer $idAntecedentes_usuario
 * @property string $postura
 * @property string $estabilidad_core
 * @property integer $idValoracion_funcional
 *
 * The followings are the available model relations:
 * @property ValoracionFuncional $idValoracionFuncional
 */
class AntecedentesUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedentes_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('postura, estabilidad_core, idValoracion_funcional', 'required'),
			array('idValoracion_funcional', 'numerical', 'integerOnly'=>true),
			array('postura', 'length', 'max'=>45),
			array('estabilidad_core', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAntecedentes_usuario, postura, estabilidad_core, idValoracion_funcional', 'safe', 'on'=>'search'),
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
			'idAntecedentes_usuario' => 'Id Antecedentes Usuario',
			'postura' => 'Postura',
			'estabilidad_core' => 'Estabilidad Core',
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

		$criteria->compare('idAntecedentes_usuario',$this->idAntecedentes_usuario);
		$criteria->compare('postura',$this->postura,true);
		$criteria->compare('estabilidad_core',$this->estabilidad_core,true);
		$criteria->compare('idValoracion_funcional',$this->idValoracion_funcional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AntecedentesUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
