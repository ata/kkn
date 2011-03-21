<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kelompok/Lokasi') => array('/admin/kelompok/index'),
	Yii::t('app','Tambah')
);
?>

<h2><?php echo Yii::t('app','Tambah Kelompok/Lokasi') ?></h2>

<?php echo $this->renderPartial('_form', array('kelompok'=>$kelompok)); ?>
