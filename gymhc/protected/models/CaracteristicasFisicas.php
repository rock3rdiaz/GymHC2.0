<?php

/**
 * This is the model class for table "caracteristicas_fisicas".
 *
 * The followings are the available columns in table 'caracteristicas_fisicas':
 * @property integer $idCaracteristicas_fisicas
 * @property string $cabeza
 * @property string $ojos
 * @property string $orl
 * @property string $cuello
 * @property string $cp
 * @property string $abdomen
 * @property string $osteoarticular
 * @property string $muscular
 * @property string $piel_faneras
 * @property string $postura
 *
 * The followings are the available model relations:
 * @property ExamenFisico[] $examenFisicos
 */
class CaracteristicasFisicas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'caracteristicas_fisicas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cabeza, ojos, orl, cuello, cp, abdomen, osteoarticular, muscular, piel_faneras, postura', 'required'),
			array('cabeza, ojos, orl, cuello, cp, abdomen, osteoarticular, muscular, postura', 'length', 'max'=>20),
			array('piel_faneras', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCaracteristicas_fisicas, cabeza, ojos, orl, cuello, cp, abdomen, osteoarticular, muscular, piel_faneras, postura', 'safe', 'on'=>'search'),
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
			'examenFisicos' => array(self::HAS_MANY, 'ExamenFisico', 'idCaracteristicas_fisicas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCaracteristicas_fisicas' => 'Id Caracteristicas Fisicas',
			'cabeza' => 'Cabeza',
			'ojos' => 'Ojos',
			'orl' => 'Orl',
			'cuello' => 'Cuello',
			'cp' => 'Cp',
			'abdomen' => 'Abdomen',
			'osteoarticular' => 'Osteoarticular',
			'muscular' => 'Muscular',
			'piel_faneras' => 'Piel Faneras',
			'postura' => 'Postura',
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

		$criteria->compare('idCaracteristicas_fisicas',$this->idCaracteristicas_fisicas);
		$criteria->compare('cabeza',$this->cabeza,true);
		$criteria->compare('ojos',$this->ojos,true);
		$criteria->compare('orl',$this->orl,true);
		$criteria->compare('cuello',$this->cuello,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('abdomen',$this->abdomen,true);
		$criteria->compare('osteoarticular',$this->osteoarticular,true);
		$criteria->compare('muscular',$this->muscular,true);
		$criteria->compare('piel_faneras',$this->piel_faneras,true);
		$criteria->compare('postura',$this->postura,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CaracteristicasFisicas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
