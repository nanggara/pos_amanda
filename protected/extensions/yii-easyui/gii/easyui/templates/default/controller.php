<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass; ?>

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
		
		$model=new <?php echo $this->modelClass; ?>;
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	echo "\t\t".'$model->'.$column->name.'=mysql_real_escape_string($_POST[\''.$column->name.'\']);'."\n";
}
?>	
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
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	echo "\t\t".'$model->'.$column->name.'=mysql_real_escape_string($_POST[\''.$column->name.'\']);'."\n";
}
?>	
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
		
		$id = mysql_real_escape_string(trim($_POST['<?php echo $this->tableSchema->primaryKey ?>']));
		if($this->loadModel($id)->delete())
			echo CJSON::encode(array('success'=>true,'msg'=>'You have managed to delete the data.'));
		else
			echo CJSON::encode(array('msg'=>'Error occurred during processing.'));
	}
	
	public function loadModel($id)
	{
		$model=<?php echo $this->modelClass;?>::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function search()
	{
		header("Content-Type: application/json");
		
		// search 
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	echo "\t\t$".$column->name.' = isset($_POST[\''.$column->name.'\']) ? mysql_real_escape_string($_POST[\''.$column->name.'\']) : \'\';'."\n";
}
?>
		
		// pagging
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : '<?php echo $this->tableSchema->primaryKey; ?>';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$row = array();
		
		// result
		$criteria = new CDbCriteria;
<?php foreach($this->tableSchema->columns as $column)
{
	if(!$column->autoIncrement)
	echo "\t\t".'$criteria->addSearchCondition(\''.$column->name.'\',$'.$column->name.');'."\n";
}
?>
		
		$result['total'] = count(<?php echo $this->modelClass; ?>::model()->findAll($criteria));
		
		$criteria->offset=$offset;
		$criteria->limit=$rows;
		$criteria->order=$sort.' '.$order;
		
		foreach(<?php echo $this->modelClass; ?>::model()->findAll($criteria) as $data)
		{	
			$row[] = array(
<?php foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
	echo "\t\t\t\t".'\'id\'=>$data->'.$this->tableSchema->primaryKey.','."\n";
	else
	echo "\t\t\t\t".'\''.$column->name.'\'=>$data->'.$column->name.','."\n";
}
?>
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return CJSON::encode($result);
	}

}
