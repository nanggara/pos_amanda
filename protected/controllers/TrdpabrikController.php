<?php

class TrdPabrikController extends Controller
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
		
		$model=new TrdPabrik;
		$model->no_tr_pabrik=mysql_real_escape_string($_POST['no_tr_pabrik']);
		$model->kd_produk=mysql_real_escape_string($_POST['kd_produk']);
		$model->qty=mysql_real_escape_string($_POST['qty']);
		$model->user_name=mysql_real_escape_string($_POST['user_name']);
	
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
		$model->no_tr_pabrik=mysql_real_escape_string($_POST['no_tr_pabrik']);
		$model->kd_produk=mysql_real_escape_string($_POST['kd_produk']);
		$model->qty=mysql_real_escape_string($_POST['qty']);
		$model->user_name=mysql_real_escape_string($_POST['user_name']);
	
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
		
		$id = mysql_real_escape_string(trim($_POST['id_trd_pabrik']));
		if($this->loadModel($id)->delete())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have managed to delete the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function loadModel($id)
	{
		$model=TrdPabrik::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function search()
	{
		header("Content-Type: application/json");
		
		// search 
		$no_tr_pabrik = isset($_POST['no_tr_pabrik']) ? mysql_real_escape_string($_POST['no_tr_pabrik']) : '';
		$kd_produk = isset($_POST['kd_produk']) ? mysql_real_escape_string($_POST['kd_produk']) : '';
		$qty = isset($_POST['qty']) ? mysql_real_escape_string($_POST['qty']) : '';
		$user_name = isset($_POST['user_name']) ? mysql_real_escape_string($_POST['user_name']) : '';
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_trd_pabrik';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('no_tr_pabrik',$no_tr_pabrik);
		$criteria->addSearchCondition('kd_produk',$kd_produk);
		$criteria->addSearchCondition('qty',$qty);
		$criteria->addSearchCondition('user_name',$user_name);
		
		$result['total'] = count(TrdPabrik::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(TrdPabrik::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
				'id'=>$data->id_trd_pabrik,
				'no_tr_pabrik'=>$data->no_tr_pabrik,
				'kd_produk'=>$data->kd_produk,
				'qty'=>$data->qty,
				'user_name'=>$data->user_name,
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return CJSON::encode($result);
	}

}
