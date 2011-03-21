<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN') => array('/admin/programKkn/index'),
	$programKkn->nama => array('/admin/programKkn/view','id' => $programKkn->id),
	Yii::t('app','Ubah')
);
?>

<h2><?php echo Yii::t('app','Update Program Kkn') ?></h2>

<?php echo $this->renderPartial('_form', array('programKkn'=>$programKkn)); ?>
