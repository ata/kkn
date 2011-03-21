<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Berita') => array('/admin/berita/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Berita') ?></h2>

<?php echo $this->renderPartial('_form', array('berita'=>$berita)); ?>
