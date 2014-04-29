<?php

/**
 * This is the model class for table "antecedentes_patologicos_has_enfermedad".
 *
 * The followings are the available columns in table 'antecedentes_patologicos_has_enfermedad':
 * @property integer $Antecedentes_patologicos_idAntecedentes_patologicos
 * @property integer $Enfermedad_idEnfermedad
 */
class AntecedentesPatologicosHasEnfermedad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedentes_patologicos_has_enfermedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'required'),
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Antecedentes_patologicos_idAntecedentes_patologicos, Enfermedad_idEnfermedad', 'safe', 'on'=>'search'),
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
			'Antecedentes_patologicos_idAntecedentes_patologicos' => 'Antecedentes Patologicos Id Antecedentes Patologicos',
			'Enfermedad_idEnfermedad' => 'Enfermedad Id Enfermedad',
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

		$criteria->compare('Antecedentes_patologicos_idAntecedentes_patologicos',$this->Antecedentes_patologicos_idAntecedentes_patologicos);
		$criteria->compare('Enfermedad_idEnfermedad',$this->Enfermedad_idEnfermedad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AntecedentesPatologicosHasEnfermedad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
