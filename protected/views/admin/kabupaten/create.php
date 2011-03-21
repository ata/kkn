<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kabupaten') => array('/admin/kabupaten/index'),
	Yii::t('app','Tambah')
);
?>

<h2><?php echo Yii::t('app','Tambah Kabupaten') ?></h2>

<?php echo $this->renderPartial('_form', array('kabupaten'=>$kabupaten)); ?>
