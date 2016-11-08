<?php

class ExtScript extends CWidget
{
	public static $idStatic=1;
	public static $nameStatic='ext';
	public $name=null;
	public $pos=CClientScript::POS_READY;
	
	public function init()
	{
		ob_start();
	}
	
	public function run()
	{
		$script = ob_get_contents();
		ob_end_clean();
		
		if($this->name==null)
			$name = self::$nameStatic.'_'.self::$idStatic++;
		else
			$name = $this->name;
			
		if(!YII_DEBUG)
		{
			$pack = new JavaScriptPacker($script);
			$script = $pack->pack();
		}
		
		Yii::app()->clientScript->registerScript($name,trim($script),$this->pos);
	}
}