<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Setting') => array('/admin/setting/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Setting') ?></h2>


<?php echo $this->renderPartial('_form', array('setting'=>$setting)); ?>
