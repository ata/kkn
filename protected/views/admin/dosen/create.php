<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Dosen') => array('/admin/dosen/index'),
	Yii::t('app','Tambah'),
);
?>

<h2><?php echo Yii::t('app','Tambah Dosen') ?></h2>

<?php echo $this->renderPartial('_form', array('dosen'=>$dosen)); ?>
