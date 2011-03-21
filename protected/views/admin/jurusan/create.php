<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/jurusan/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Jurusan') ?></h2>

<?php echo $this->renderPartial('_form', array('jurusan'=>$jurusan)); ?>
