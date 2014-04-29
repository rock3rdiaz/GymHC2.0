<?php

/**
 * This is the model class for table "medidas_fisicas".
 *
 * The followings are the available columns in table 'medidas_fisicas':
 * @property integer $idMedidas_fisicas
 * @property string $ta
 * @property string $fc
 * @property string $fr
 * @property string $peso
 * @property string $talla
 * @property string $imc
 * @property string $peso_ideal
 * @property string $gasto_basal_energia
 *
 * The followings are the available model relations:
 * @property ExamenFisico[] $examenFisicos
 */
class MedidasFisicas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medidas_fisicas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'required'),
			array('ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMedidas_fisicas, ta, fc, fr, peso, talla, imc, peso_ideal, gasto_basal_energia', 'safe', 'on'=>'search'),
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
			'examenFisicos' => array(self::HAS_MANY, 'ExamenFisico', 'idMedidas_fisicas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMedidas_fisicas' => 'Id Medidas Fisicas',
			'ta' => 'Ta',
			'fc' => 'Fc',
			'fr' => 'Fr',
			'peso' => 'Peso',
			'talla' => 'Talla',
			'imc' => 'Imc',
			'peso_ideal' => 'Peso Ideal',
			'gasto_basal_energia' => 'Gasto Basal Energia',
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

		$criteria->compare('idMedidas_fisicas',$this->idMedidas_fisicas);
		$criteria->compare('ta',$this->ta,true);
		$criteria->compare('fc',$this->fc,true);
		$criteria->compare('fr',$this->fr,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('talla',$this->talla,true);
		$criteria->compare('imc',$this->imc,true);
		$criteria->compare('peso_ideal',$this->peso_ideal,true);
		$criteria->compare('gasto_basal_energia',$this->gasto_basal_energia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MedidasFisicas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
