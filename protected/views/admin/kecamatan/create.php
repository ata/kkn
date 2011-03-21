<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kecamatan') => array('/admin/kecamatan/index'),
	Yii::t('app','Tambah')
);
?>

<h2><?php echo Yii::t('app','Tambah Kecamatan') ?></h2>

<?php echo $this->renderPartial('_form', array('kecamatan'=>$kecamatan)); ?>
