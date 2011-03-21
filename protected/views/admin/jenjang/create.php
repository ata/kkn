<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/jenjang/index'),
	Yii::t('app','Tambah')
);
?>

<h2><?php echo Yii::t('app','Tambah Jenjang') ?></h2>

<?php echo $this->renderPartial('_form', array('jenjang'=>$jenjang)); ?>
