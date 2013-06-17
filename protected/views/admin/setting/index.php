<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Setting'),
);
?>

<h2><?php echo Yii::t('app','Kelola Setting') ?></h2>

<?php //echo CHtml::link(Yii::t('app','Tambah Setting'),array('create'),array('class' => 'add-button'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setting-grid',
	'dataProvider'=>$setting->search(),
	'filter'=>$setting,
	'columns'=>array(
		'id',
		'key',
		'value',
		'created',
		'modified',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
