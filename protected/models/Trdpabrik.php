<?php

/**
 * This is the model class for table "trd_pabrik".
 *
 * The followings are the available columns in table 'trd_pabrik':
 * @property integer $id_trd_pabrik
 * @property string $no_tr_pabrik
 * @property string $kd_produk
 * @property integer $qty
 * @property string $user_name
 */
class TrdPabrik extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrdPabrik the static model class
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
		return 'trd_pabrik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qty', 'numerical', 'integerOnly'=>true),
			array('no_tr_pabrik, kd_produk', 'length', 'max'=>7),
			array('user_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_trd_pabrik, no_tr_pabrik, kd_produk, qty, user_name', 'safe', 'on'=>'search'),
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
			'id_trd_pabrik' => 'Id Trd Pabrik',
			'no_tr_pabrik' => 'No Tr Pabrik',
			'kd_produk' => 'Kd Produk',
			'qty' => 'Qty',
			'user_name' => 'User Name',
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

		$criteria->compare('id_trd_pabrik',$this->id_trd_pabrik);
		$criteria->compare('no_tr_pabrik',$this->no_tr_pabrik,true);
		$criteria->compare('kd_produk',$this->kd_produk,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('user_name',$this->user_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}