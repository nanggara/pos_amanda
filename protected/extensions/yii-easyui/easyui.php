<?php

class easyui extends CApplicationComponent
{
	public $_assetsUrl;
	public $theme='default';
	
	public function init()
	{
		if(Yii::getPathOfAlias('easyui')===false)
			Yii::setPathOfAlias('easyui',realpath(dirname(__FILE__)));
	}
	
	public function registerEasyUi()
	{
		$min=!YII_DEBUG ? '.min' : '';
		
		// theme
		if($this->theme!==false)
			Yii::app()->clientScript->registerCssFile($this->getAssetsUrl()."/easyui/themes/{$this->theme}/easyui{$min}.css");
		
		// js
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl()."/easyui/jquery.easyui{$min}.js");
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl()."/js/yii-easyui{$min}.js");
		
		// icon
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl()."/css/icons.css");
		
		// jquery
		Yii::app()->clientScript->registerCoreScript('jquery');
		
		// import
		Yii::import('easyui.system.*');
	}
	
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('easyui.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, false);//YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
	
	public function registerDataGridPlugins($type)
	{
		$min=!YII_DEBUG ? '.min.js' : '.js';
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl()."/js/datagrid-{$type}{$min}");
	}
}