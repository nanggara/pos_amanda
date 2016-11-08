<?php

class TrPabrikController extends Controller
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
		else if(isset($_GET['gridproduk']))
			echo $this->searchProduk();
		else
			$this->renderPartial('index',array());
	}
	
	public function actionCreate()
	{
		header("Content-Type: application/json");
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$model=new TrPabrik;
		$model->no_tr_pabrik=mysql_real_escape_string($_POST['no_tr_pabrik']);
		$model->kd_pabrik=mysql_real_escape_string($_POST['kd_pabrik']);
		$model->tgl_terima=mysql_real_escape_string($_POST['tgl_terima']);
		$model->keterangan=mysql_real_escape_string($_POST['keterangan']);
		$model->posted=mysql_real_escape_string($_POST['posted']);
		$model->reject=mysql_real_escape_string($_POST['reject']);
		
		$model2 =new TrdPabrik;
			
		if($model->save()){
							$saveDetail = new TrdPabrik;
		     				$saveDetail->no_tr_pabrik=mysql_real_escape_string($_POST['no_tr_pabrik']);
		        			$saveDetail->kd_produk=mysql_real_escape_string($_POST['txtkd_produk']);
		        			$saveDetail->save();
			
			echo CJSON::encode(array('success'=>true,'msg'=>'Data berhasil disimpan.'));
		}else{
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
			
		}
	}
	
	public function actionUpdate($id)
	{
		header("Content-Type: application/json");
		
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$model=$this->loadModel($id);
		$model->no_tr_pabrik=mysql_real_escape_string($_POST['no_tr_pabrik']);
		$model->kd_pabrik=mysql_real_escape_string($_POST['kd_pabrik']);
		$model->tgl_terima=mysql_real_escape_string($_POST['tgl_terima']);
		$model->keterangan=mysql_real_escape_string($_POST['keterangan']);
		$model->posted=mysql_real_escape_string($_POST['posted']);
		$model->reject=mysql_real_escape_string($_POST['reject']);
	
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
		
		$id = mysql_real_escape_string(trim($_POST['no_tr_pabrik']));
		if($this->loadModel($id)->delete())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have managed to delete the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function loadModel($id)
	{
		$model=TrPabrik::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function search()
	{
		header("Content-Type: application/json");
		
		// search 
		$no_tr_pabrik = isset($_POST['no_tr_pabrik']) ? mysql_real_escape_string($_POST['no_tr_pabrik']) : '';
		$kd_pabrik = isset($_POST['kd_pabrik']) ? mysql_real_escape_string($_POST['kd_pabrik']) : '';
		$tgl_terima = isset($_POST['tgl_terima']) ? mysql_real_escape_string($_POST['tgl_terima']) : '';
		$keterangan = isset($_POST['keterangan']) ? mysql_real_escape_string($_POST['keterangan']) : '';
		$posted = isset($_POST['posted']) ? mysql_real_escape_string($_POST['posted']) : '';
		$reject = isset($_POST['reject']) ? mysql_real_escape_string($_POST['reject']) : '';
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'no_tr_pabrik';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('no_tr_pabrik',$no_tr_pabrik);
		$criteria->addSearchCondition('kd_pabrik',$kd_pabrik);
		$criteria->addSearchCondition('tgl_terima',$tgl_terima);
		$criteria->addSearchCondition('keterangan',$keterangan);
		$criteria->addSearchCondition('posted',$posted);
		$criteria->addSearchCondition('reject',$reject);
		
		$result['total'] = count(TrPabrik::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(TrPabrik::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
				'no_tr_pabrik'=>$data->no_tr_pabrik,
				'kd_pabrik'=>$data->kd_pabrik,
				'tgl_terima'=>$data->tgl_terima,
				'keterangan'=>$data->keterangan,
				'posted'=>$data->posted,
				'reject'=>$data->reject,
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return CJSON::encode($result);
	}


public function searchProduk()
	{
		header("Content-Type: application/json");
		
		// search 
		$nm_produk = isset($_POST['nm_produk']) ? mysql_real_escape_string($_POST['nm_produk']) : '';
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'kd_produk';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
		 $criteria->addSearchCondition('nm_produk',$nm_produk);

	//	$model = Produk::model()->find($criteria);

		

		$result['total'] = count(Produk::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(Produk::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
				'kd_produk'=>$data->kd_produk,
				'nm_produk'=>$data->nm_produk,
				'stock'=>$data->stock,

			);
		}
		$result=array_merge($result,array('rows'=>$row));
		

		return CJSON::encode($result);
	}


}
