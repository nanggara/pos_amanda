<?php

class BarangController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column1', meaning
	 * using two-column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			// 'accessControl'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'index', 'create', 'update' and 'delete' actions
				'actions'=>array('index','create','update','delete'),
				'users'=>array('@')
			),
			array('deny',
				'users'=>array('*')
			)
			
		);
	}
	
	public function actionIndex()
	{
		if(isset($_GET['grid']))
			echo $this->search();
		else
			$this->renderPartial('index',array());
	}
	
	public function actionCreate()
	{
		header("Content-Type: application/json");
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$model=new Barang;
		$model->kd_barang=mysql_real_escape_string($_POST['kd_barang']);
		$model->nm_barang=mysql_real_escape_string($_POST['nm_barang']);
		$model->tgl_produksi=mysql_real_escape_string($_POST['tgl_produksi']);
		$model->harga_beli=mysql_real_escape_string($_POST['harga_beli']);
		$model->harga_jual1=mysql_real_escape_string($_POST['harga_jual1']);
		$model->harga_jual2=mysql_real_escape_string($_POST['harga_jual2']);
		$model->stock_awal=mysql_real_escape_string($_POST['stock_awal']);
		$model->stock=mysql_real_escape_string($_POST['stock']);
		$model->reject_awal=mysql_real_escape_string($_POST['reject_awal']);
		$model->reject=mysql_real_escape_string($_POST['reject']);
		$model->prc=mysql_real_escape_string($_POST['prc']);
		$model->gambar=mysql_real_escape_string($_POST['gambar']);
		$model->harga_prod=mysql_real_escape_string($_POST['harga_prod']);
		$model->kd_jenis=mysql_real_escape_string($_POST['kd_jenis']);
		$model->hpp=mysql_real_escape_string($_POST['hpp']);
	
		if($model->save())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have successfully added data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function actionUpdate($id)
	{
		header("Content-Type: application/json");
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$model=$this->loadModel($id);
		$model->kd_barang=mysql_real_escape_string($_POST['kd_barang']);
		$model->nm_barang=mysql_real_escape_string($_POST['nm_barang']);
		$model->tgl_produksi=mysql_real_escape_string($_POST['tgl_produksi']);
		$model->harga_beli=mysql_real_escape_string($_POST['harga_beli']);
		$model->harga_jual1=mysql_real_escape_string($_POST['harga_jual1']);
		$model->harga_jual2=mysql_real_escape_string($_POST['harga_jual2']);
		$model->stock_awal=mysql_real_escape_string($_POST['stock_awal']);
		$model->stock=mysql_real_escape_string($_POST['stock']);
		$model->reject_awal=mysql_real_escape_string($_POST['reject_awal']);
		$model->reject=mysql_real_escape_string($_POST['reject']);
		$model->prc=mysql_real_escape_string($_POST['prc']);
		$model->gambar=mysql_real_escape_string($_POST['gambar']);
		$model->harga_prod=mysql_real_escape_string($_POST['harga_prod']);
		$model->kd_jenis=mysql_real_escape_string($_POST['kd_jenis']);
		$model->hpp=mysql_real_escape_string($_POST['hpp']);
	
		if($model->save())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have successfully changed the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function actionDelete()
	{
		header("Content-Type: application/json");
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$id = mysql_real_escape_string(trim($_POST['kd_barang']));
		if($this->loadModel($id)->delete())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have managed to delete the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function loadModel($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function search()
	{
		header("Content-Type: application/json");
		
		// search 
		$kd_barang = isset($_POST['kd_barang']) ? mysql_real_escape_string($_POST['kd_barang']) : '';
		$nm_barang = isset($_POST['nm_barang']) ? mysql_real_escape_string($_POST['nm_barang']) : '';
		$tgl_produksi = isset($_POST['tgl_produksi']) ? mysql_real_escape_string($_POST['tgl_produksi']) : '';
		$harga_beli = isset($_POST['harga_beli']) ? mysql_real_escape_string($_POST['harga_beli']) : '';
		$harga_jual1 = isset($_POST['harga_jual1']) ? mysql_real_escape_string($_POST['harga_jual1']) : '';
		$harga_jual2 = isset($_POST['harga_jual2']) ? mysql_real_escape_string($_POST['harga_jual2']) : '';
		$stock_awal = isset($_POST['stock_awal']) ? mysql_real_escape_string($_POST['stock_awal']) : '';
		$stock = isset($_POST['stock']) ? mysql_real_escape_string($_POST['stock']) : '';
		$reject_awal = isset($_POST['reject_awal']) ? mysql_real_escape_string($_POST['reject_awal']) : '';
		$reject = isset($_POST['reject']) ? mysql_real_escape_string($_POST['reject']) : '';
		$prc = isset($_POST['prc']) ? mysql_real_escape_string($_POST['prc']) : '';
		$gambar = isset($_POST['gambar']) ? mysql_real_escape_string($_POST['gambar']) : '';
		$harga_prod = isset($_POST['harga_prod']) ? mysql_real_escape_string($_POST['harga_prod']) : '';
		$kd_jenis = isset($_POST['kd_jenis']) ? mysql_real_escape_string($_POST['kd_jenis']) : '';
		$hpp = isset($_POST['hpp']) ? mysql_real_escape_string($_POST['hpp']) : '';
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'kd_barang';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('kd_barang',$kd_barang);
		$criteria->addSearchCondition('nm_barang',$nm_barang);
		$criteria->addSearchCondition('tgl_produksi',$tgl_produksi);
		$criteria->addSearchCondition('harga_beli',$harga_beli);
		$criteria->addSearchCondition('harga_jual1',$harga_jual1);
		$criteria->addSearchCondition('harga_jual2',$harga_jual2);
		$criteria->addSearchCondition('stock_awal',$stock_awal);
		$criteria->addSearchCondition('stock',$stock);
		$criteria->addSearchCondition('reject_awal',$reject_awal);
		$criteria->addSearchCondition('reject',$reject);
		$criteria->addSearchCondition('prc',$prc);
		$criteria->addSearchCondition('gambar',$gambar);
		$criteria->addSearchCondition('harga_prod',$harga_prod);
		$criteria->addSearchCondition('kd_jenis',$kd_jenis);
		$criteria->addSearchCondition('hpp',$hpp);
		
		$result['total'] = count(Barang::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(Barang::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
				'id'=>$data->kd_barang,
				'nm_barang'=>$data->nm_barang,
				'tgl_produksi'=>$data->tgl_produksi,
				'harga_beli'=>$data->harga_beli,
				'harga_jual1'=>$data->harga_jual1,
				'harga_jual2'=>$data->harga_jual2,
				'stock_awal'=>$data->stock_awal,
				'stock'=>$data->stock,
				'reject_awal'=>$data->reject_awal,
				'reject'=>$data->reject,
				'prc'=>$data->prc,
				'gambar'=>$data->gambar,
				'harga_prod'=>$data->harga_prod,
				'kd_jenis'=>$data->kd_jenis,
				'hpp'=>$data->hpp,
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return CJSON::encode($result);
	}

}
