<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/jurusan/index'),
	$jurusan->nama => array('/admin/jurusan/view','id' => $jurusan->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Jurusan') ?></h2>

<?php echo $this->renderPartial('_form', array('jurusan'=>$jurusan)); ?>
