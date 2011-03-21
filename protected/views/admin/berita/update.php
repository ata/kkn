<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Berita') => array('/admin/berita/index'),
	$berita->title => array('/admin/berita/view','id' => $berita->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Ubah Berita') ?></h2>

<?php echo $this->renderPartial('_form', array('berita'=>$berita)); ?>
