<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Program KKN'),
);
?>
<h2><?php echo Yii::t('app','Kelola Program KKN') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Program KKN'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'program-kkn-grid',
	'dataProvider'=>$programKkn->search(),
	'filter'=>$programKkn,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		//'deskripsi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
