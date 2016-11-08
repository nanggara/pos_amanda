<?php

class ExtScriptFile extends CWidget
{
	public $type='js';
	public $url;
	public $pos=CClientScript::POS_HEAD;
	
	public function run()
	{
		$bu = Yii::app()->request->baseUrl.'/';
		if($this->type==='js')
			Yii::app()->clientScript->registerScriptFile($bu.$this->url,$this->pos);
		else
			Yii::app()->clientScript->registerCssFile($bu.$this->url);
	}
}