<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Setting') => array('/admin/setting/index'),
	$setting->key => array('/admin/setting/view','id' => $setting->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Setting') ?></h2>

<?php echo $this->renderPartial('_form', array('setting'=>$setting)); ?>
