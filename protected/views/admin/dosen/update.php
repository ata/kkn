<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Dosen') => array('/admin/dosen/index'),
	$dosen->nama => array('/admin/dosen/view','id' => $dosen->id),
	Yii::t('app','Ubah'),
);
?>

<h2><?php echo Yii::t('app','Ubah Dosen') ?></h2>

<?php echo $this->renderPartial('_form', array('dosen'=>$dosen)); ?>
