<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN') => array('/admin/programKkn/index'),
	Yii::t('app','Tambah')
);
?>
<h2><?php echo Yii::t('app','Tambah Program KKN') ?></h2>

<?php echo $this->renderPartial('_form', array('programKkn'=>$programKkn)); ?>
