<?php
Yii::import('zii.widgets.CMenu');
class HeadMenu extends CMenu
{
    public function init()
    {
        $this->items = array(
            array('label'=>Yii::t('app','Beranda'), 'url'=>array('/home/index')),
            array('label'=>Yii::t('app','Tentang Kami'), 'url'=>array('/site/page', 'view'=>'about')),
            array('label'=>Yii::t('app','Kontak Kami'), 'url'=>array('/site/contact')),
            array('label'=>Yii::t('app','Halaman Admin'), 'url'=>array('/admin/default/index'),'visible' => Yii::app()->user->name === 'admin'),
            array('label'=>Yii::t('app','Dashboard'), 'url'=>array('/dashboard/kelompok/view'),'visible' => !Yii::app()->user->isGuest && Yii::app()->user->name !== 'admin'),
        );
        parent::init();
    }
    protected function isItemActive($item,$route)
    {
        if (strpos($route,'admin/') !== false || strpos($route,'dashboard/') !== false) {
            if(isset($item['url']) && is_array($item['url'])) {
                $url =  trim($item['url'][0],'/');
                $urlSlice = explode('/',$url);
                $routeSlide = explode('/',$route);
                if($urlSlice[0] === $routeSlide[0]) {
                    return true;
                }
            }
        }

        return parent::isItemActive($item, $route);
    }
}
