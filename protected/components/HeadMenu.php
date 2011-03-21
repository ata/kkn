<?php
Yii::import('zii.widgets.CMenu');
class HeadMenu extends CMenu
{
	protected function isItemActive($item,$route)
	{
		if (strpos($route,'admin/') !== false || strpos($route,'dashboard/') !== false) {
			if(isset($item['url']) && is_array($item['url'])) {
				$url =  trim($item['url'][0],'/');
				$urlSlice = explode('/',$url);
				$routeSlice = explode('/',$route);
				if($urlSlice[0] === $routeSlice[0]) {
					return true;
				}
			}
		}

		return parent::isItemActive($item, $route);
	}
}
