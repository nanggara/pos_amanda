<?php

/**
 * This is the model class for table "produk".
 *
 * The followings are the available columns in table 'produk':
 * @property string $kd_produk
 * @property string $nm_produk
 * @property string $tgl_produksi
 * @property string $harga_beli
 * @property string $harga_jual1
 * @property string $harga_jual2
 * @property string $stock_awal
 * @property string $stock
 * @property string $reject_awal
 * @property string $reject
 * @property double $prc
 * @property string $gambar
 * @property string $harga_prod
 * @property integer $kd_jenis
 * @property string $hpp
 */
class Produk extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Produk the static model class
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
		return 'produk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_produk', 'required'),
			array('kd_jenis', 'numerical', 'integerOnly'=>true),
			array('prc', 'numerical'),
			array('kd_produk', 'length', 'max'=>7),
			array('nm_produk', 'length', 'max'=>100),
			array('harga_beli, harga_jual1, harga_jual2, stock_awal, stock, reject_awal, reject, harga_prod, hpp', 'length', 'max'=>10),
			array('gambar', 'length', 'max'=>255),
			array('tgl_produksi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kd_produk, nm_produk, tgl_produksi, harga_beli, harga_jual1, harga_jual2, stock_awal, stock, reject_awal, reject, prc, gambar, harga_prod, kd_jenis, hpp', 'safe', 'on'=>'search'),
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
			'kd_produk' => 'Kd Produk',
			'nm_produk' => 'Nm Produk',
			'tgl_produksi' => 'Tgl Produksi',
			'harga_beli' => 'Harga Beli',
			'harga_jual1' => 'Harga Jual1',
			'harga_jual2' => 'Harga Jual2',
			'stock_awal' => 'Stock Awal',
			'stock' => 'Stock',
			'reject_awal' => 'Reject Awal',
			'reject' => 'Reject',
			'prc' => 'Prc',
			'gambar' => 'Gambar',
			'harga_prod' => 'Harga Prod',
			'kd_jenis' => 'Kd Jenis',
			'hpp' => 'Hpp',
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

		$criteria->compare('kd_produk',$this->kd_produk,true);
		$criteria->compare('nm_produk',$this->nm_produk,true);
		$criteria->compare('tgl_produksi',$this->tgl_produksi,true);
		$criteria->compare('harga_beli',$this->harga_beli,true);
		$criteria->compare('harga_jual1',$this->harga_jual1,true);
		$criteria->compare('harga_jual2',$this->harga_jual2,true);
		$criteria->compare('stock_awal',$this->stock_awal,true);
		$criteria->compare('stock',$this->stock,true);
		$criteria->compare('reject_awal',$this->reject_awal,true);
		$criteria->compare('reject',$this->reject,true);
		$criteria->compare('prc',$this->prc);
		$criteria->compare('gambar',$this->gambar,true);
		$criteria->compare('harga_prod',$this->harga_prod,true);
		$criteria->compare('kd_jenis',$this->kd_jenis);
		$criteria->compare('hpp',$this->hpp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}