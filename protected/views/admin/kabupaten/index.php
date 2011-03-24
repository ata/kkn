<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kabupaten'),
);
?>

<h2><?php echo Yii::t('app','Kelola Kabupaten') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Kabupaten'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kabupaten-grid',
	'dataProvider'=>$kabupaten->search(),
	'filter'=>$kabupaten,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
