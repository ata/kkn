<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Mahasiswa') => array('/admin/mahasiswa/index'),
	$mahasiswa->nama => array('/admin/mahasiswa/view','id' => $mahasiswa->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Mahasiswa') ?></h2>

<?php echo $this->renderPartial('_form', array('mahasiswa'=>$mahasiswa)); ?>
