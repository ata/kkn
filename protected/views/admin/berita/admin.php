<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Berita'),
);
?>

<h2><?php echo Yii::t('app','Kelola Berita') ?></h2>

<?php echo CHtml::link(Yii::t('app','Tambah Berita'),array('create'),array('class' => 'add-button'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'berita-grid',
	'dataProvider'=>$berita->search(),
	'filter'=>$berita,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'title',
		'created',
		'modified',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
