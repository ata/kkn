<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Fakultas'),
);
?>

<h2><?php echo Yii::t('app','Kelola Fakultas') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Fakultas'),array('create'),array('class' => 'add-button'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fakultas-grid',
	'dataProvider'=>$fakultas->search(),
	'filter'=>$fakultas,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		'kode',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
