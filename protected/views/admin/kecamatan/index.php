<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kecamatan'),
);
?>
<h2><?php echo Yii::t('app','Kelola Kecamatan') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Kecamatan'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kecamatan-grid',
	'dataProvider'=>$kecamatan->search(),
	'filter'=>$kecamatan,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		array(
			'name' => 'kabupatenId',
			'value' => '$data->namaKabupaten',
			'filter' => Kabupaten::model()->listData
		),
		array(
			'name'=>'programKknId',
			'value'=>'$data->namaProgramKkn',
			'filter'=>ProgramKkn::model()->listData,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
