<?php

class PabrikController extends Controller
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
		
		$model=new Pabrik;
		$model->kd_pabrik=mysql_real_escape_string($_POST['kd_pabrik']);
		$model->nm_pabrik=mysql_real_escape_string($_POST['nm_pabrik']);
		$model->alamat=mysql_real_escape_string($_POST['alamat']);
		$model->telp1=mysql_real_escape_string($_POST['telp1']);
		$model->cp=mysql_real_escape_string($_POST['cp']);
		$model->status=mysql_real_escape_string($_POST['status']);
		$model->kd_area=mysql_real_escape_string($_POST['kd_area']);
	
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
		$model->kd_pabrik=mysql_real_escape_string($_POST['kd_pabrik']);
		$model->nm_pabrik=mysql_real_escape_string($_POST['nm_pabrik']);
		$model->alamat=mysql_real_escape_string($_POST['alamat']);
		$model->telp1=mysql_real_escape_string($_POST['telp1']);
		$model->cp=mysql_real_escape_string($_POST['cp']);
		$model->status=mysql_real_escape_string($_POST['status']);
		$model->kd_area=mysql_real_escape_string($_POST['kd_area']);
	
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
		
		$id = mysql_real_escape_string(trim($_POST['kd_pabrik']));
		if($this->loadModel($id)->delete())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have managed to delete the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function loadModel($id)
	{
		$model=Pabrik::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function search()
	{
		header("Content-Type: application/json");
		
		// search 
		$kd_pabrik = isset($_POST['kd_pabrik']) ? mysql_real_escape_string($_POST['kd_pabrik']) : '';
		$nm_pabrik = isset($_POST['nm_pabrik']) ? mysql_real_escape_string($_POST['nm_pabrik']) : '';
		$alamat = isset($_POST['alamat']) ? mysql_real_escape_string($_POST['alamat']) : '';
		$telp1 = isset($_POST['telp1']) ? mysql_real_escape_string($_POST['telp1']) : '';
		$cp = isset($_POST['cp']) ? mysql_real_escape_string($_POST['cp']) : '';
		$status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : '';
		$kd_area = isset($_POST['kd_area']) ? mysql_real_escape_string($_POST['kd_area']) : '';
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'kd_pabrik';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('kd_pabrik',$kd_pabrik);
		$criteria->addSearchCondition('nm_pabrik',$nm_pabrik);
		$criteria->addSearchCondition('alamat',$alamat);
		$criteria->addSearchCondition('telp1',$telp1);
		$criteria->addSearchCondition('cp',$cp);
		$criteria->addSearchCondition('status',$status);
		$criteria->addSearchCondition('kd_area',$kd_area);
		
		$result['total'] = count(Pabrik::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(Pabrik::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
				'id'=>$data->kd_pabrik,
				'nm_pabrik'=>$data->nm_pabrik,
				'alamat'=>$data->alamat,
				'telp1'=>$data->telp1,
				'cp'=>$data->cp,
				'status'=>$data->status,
				'kd_area'=>$data->kd_area,
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return CJSON::encode($result);
	}

}
