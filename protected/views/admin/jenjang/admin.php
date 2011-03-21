<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jenjang'),
);
?>

<h2><?php echo Yii::t('app','Kelola Jenjang') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Jenjang'),array('create'),array('class' => 'add-button'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jenjang-grid',
	'dataProvider'=>$jenjang->search(),
	'filter'=>$jenjang,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		'kode',
		'created',
		'modified',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
