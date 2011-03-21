<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Mahasiswa') => array('/admin/mahasiswa/index'),
	Yii::t('app','Tambah')
);
?>

<h2><?php echo Yii::t('app','Tambah Mahasiswa') ?></h2>

<?php echo $this->renderPartial('_form', array('mahasiswa'=>$mahasiswa)); ?>
