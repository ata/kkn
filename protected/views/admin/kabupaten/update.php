<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kabupaten') => array('/admin/kabupaten/index'),
	$kabupaten->nama => array('/admin/kabupaten/view','id' => $kabupaten->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Kabupaten') ?></h2>

<?php echo $this->renderPartial('_form', array('kabupaten'=>$kabupaten)); ?>
