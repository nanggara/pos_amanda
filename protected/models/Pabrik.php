<?php

/**
 * This is the model class for table "pabrik".
 *
 * The followings are the available columns in table 'pabrik':
 * @property string $kd_pabrik
 * @property string $nm_pabrik
 * @property string $alamat
 * @property string $telp1
 * @property string $cp
 * @property integer $status
 * @property integer $kd_area
 */
class Pabrik extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pabrik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pabrik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_pabrik', 'required'),
			array('status, kd_area', 'numerical', 'integerOnly'=>true),
			array('kd_pabrik', 'length', 'max'=>7),
			array('nm_pabrik', 'length', 'max'=>100),
			array('alamat', 'length', 'max'=>300),
			array('telp1, cp', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kd_pabrik, nm_pabrik, alamat, telp1, cp, status, kd_area', 'safe', 'on'=>'search'),
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
			'kd_pabrik' => 'Kd Pabrik',
			'nm_pabrik' => 'Nm Pabrik',
			'alamat' => 'Alamat',
			'telp1' => 'Telp1',
			'cp' => 'Cp',
			'status' => 'Status',
			'kd_area' => 'Kd Area',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('kd_pabrik',$this->kd_pabrik,true);
		$criteria->compare('nm_pabrik',$this->nm_pabrik,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp1',$this->telp1,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('kd_area',$this->kd_area);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}