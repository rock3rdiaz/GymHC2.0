<?php

/**
 * This is the model class for table "historia_gym".
 *
 * The followings are the available columns in table 'historia_gym':
 * @property integer $idHistoria_GYM
 * @property string $estado
 * @property integer $idVUsuario
 *
 * The followings are the available model relations:
 * @property EvaluacionMedica[] $evaluacionMedicas
 * @property ValoracionFuncional[] $valoracionFuncionals
 */
class HistoriaGym extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historia_gym';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado, idVUsuario', 'required'),
			array('idVUsuario', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHistoria_GYM, estado, idVUsuario', 'safe', 'on'=>'search'),
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
			'evaluacionMedicas' => array(self::HAS_MANY, 'EvaluacionMedica', 'idHistoria_GYM'),
			'valoracionFuncionals' => array(self::HAS_MANY, 'ValoracionFuncional', 'idHistoria_GYM'),
			'idusuario0' => array(self::BELONGS_TO, 'VUsuarios', 'idVUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHistoria_GYM' => 'Id Historia Gym',
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

		$criteria->compare('idHistoria_GYM',$this->idHistoria_GYM);
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
	 * @return HistoriaGym the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
