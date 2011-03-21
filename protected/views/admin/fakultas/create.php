<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Fakultas') => array('/admin/fakultas/index'),
	Yii::t('app','Tambah'),
);
?>

<h2><?php echo Yii::t('app','Tambah Fakultas') ?></h2>

<?php echo $this->renderPartial('_form', array('fakultas'=>$fakultas)); ?>
