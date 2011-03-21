<?php
Yii::import('zii.widgets.CMenu');
class SideMenu extends CMenu
{
	public function init()
	{
		parent::init();
	}
	protected function isItemActive($item,$route)
	{
		if(isset($item['url']) && is_array($item['url'])) {
			$url =  trim($item['url'][0],'/');
			$urlSlice = explode('/',$url);
			$routeSlice = explode('/',$route);
			if($urlSlice[0] === $routeSlice[0] && $urlSlice[1] === $routeSlice[1]) {
				return true;
			}
		}
		return parent::isItemActive($item, $route);
	}
}
