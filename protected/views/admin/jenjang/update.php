<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/jenjang/index'),
	$jenjang->nama => array('/admin/jenjang/view','id' => $jenjang->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Update Jenjang') ?></h2>

<?php echo $this->renderPartial('_form', array('jenjang'=>$jenjang)); ?>
