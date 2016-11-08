<?php

/**
 * This is the model class for table "tr_pabrik".
 *
 * The followings are the available columns in table 'tr_pabrik':
 * @property string $no_tr_pabrik
 * @property string $kd_pabrik
 * @property string $tgl_terima
 * @property string $keterangan
 * @property integer $posted
 * @property integer $reject
 */
class TrPabrik extends CActiveRecord
{
	
	public $nm_produk;
	public $kd_produk;
	public $stock;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrPabrik the static model class
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
		return 'tr_pabrik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_tr_pabrik', 'required'),
			array('posted, reject', 'numerical', 'integerOnly'=>true),
			array('no_tr_pabrik, kd_pabrik,kd_produk', 'length', 'max'=>7),
			array('keterangan,nm_produk', 'length', 'max'=>100),
			array('tgl_terima', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('no_tr_pabrik, kd_pabrik, nm_produk,tgl_terima, keterangan, posted, reject', 'safe', 'on'=>'search'),
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
			'no_tr_pabrik' => 'No Faktur',
			'kd_pabrik' => 'Pabrik',
			'tgl_terima' => 'Tgl. Terima',
			'keterangan' => 'Keterangan',
			'posted' => 'Posted',
			'reject' => 'Reject',
			'nm_produk'=>'Nama Produk',
		);
	}


protected function beforeSave()
{ 
$this->tgl_terima=date('Y-m-d', strtotime($this->tgl_terima));
return TRUE;
}


protected function afterFind()
{
$this->tgl_terima=date('d-m-Y', strtotime($this->tgl_terima)); 
return TRUE;
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

		$criteria->compare('no_tr_pabrik',$this->no_tr_pabrik,true);
		$criteria->compare('kd_pabrik',$this->kd_pabrik,true);
		$criteria->compare('tgl_terima',$this->tgl_terima,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('posted',$this->posted);
		$criteria->compare('reject',$this->reject);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchProduk()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		 $criteria = new CDbCriteria;
		 $criteria->compare('nm_produk',$this->nm_produk);
$criteria->compare('kd_produk',$this->kd_produk);
$criteria->compare('stock',$this->stock);

		$model = Produk::model()->find($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}