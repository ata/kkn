<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Fakultas') => array('/admin/fakultas/index'),
	$fakultas->nama => array('/admin/fakultas/view','id' => $fakultas->id),
	Yii::t('app','Ubah'),
);
?>

<h2><?php echo Yii::t('app','Perbaharui Fakultas') ?></h2>

<?php echo $this->renderPartial('_form', array('fakultas'=>$fakultas)); ?>
