<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kecamatan') => array('/admin/kecamatan/index'),
	$kecamatan->nama => array('/admin/kecamatan/view','id' => $kecamatan->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Kecamatan') ?></h2>

<?php echo $this->renderPartial('_form', array('kecamatan'=>$kecamatan)); ?>
