<?php 

class EasyuiWidget extends CApplicationComponent
{
	public static function openTabs(array $url, $title, $icon)
	{
		@$parseUrl=Yii::app()->controller->createUrl($url[0],$url[1]);
		return CHtml::link($title,'javascript:void(0)',array(
			'onClick'=>'open_tabs("'.$parseUrl.'","'.$title.'","'.$icon.'")'
		));
	}
}