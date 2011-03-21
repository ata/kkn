<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kelompok') => array('/admin/kelompok/index'),
	$kelompok->nama => array('/admin/kelompok/view','id' => $kelompok->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Kelompok/Lokasi') ?></h2>

<?php echo $this->renderPartial('_form', array('kelompok'=>$kelompok)); ?>
