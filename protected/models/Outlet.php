<?php

/**
 * This is the model class for table "outlet".
 *
 * The followings are the available columns in table 'outlet':
 * @property string $kd_outlet
 * @property string $nm_outlet
 * @property string $alamat
 * @property string $telp1
 * @property string $cp
 * @property integer $status
 * @property string $kd_pabrik
 */
class Outlet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Outlet the static model class
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
		return 'outlet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_outlet', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('kd_outlet, kd_pabrik', 'length', 'max'=>7),
			array('nm_outlet', 'length', 'max'=>100),
			array('alamat', 'length', 'max'=>300),
			array('telp1, cp', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kd_outlet, nm_outlet, alamat, telp1, cp, status, kd_pabrik', 'safe', 'on'=>'search'),
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
			'kd_outlet' => 'Kd Outlet',
			'nm_outlet' => 'Nm Outlet',
			'alamat' => 'Alamat',
			'telp1' => 'Telp1',
			'cp' => 'Cp',
			'status' => 'Status',
			'kd_pabrik' => 'Kd Pabrik',
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

		$criteria->compare('kd_outlet',$this->kd_outlet,true);
		$criteria->compare('nm_outlet',$this->nm_outlet,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp1',$this->telp1,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('kd_pabrik',$this->kd_pabrik,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}