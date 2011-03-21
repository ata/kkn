<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan'),
);
?>

<h2><?php echo Yii::t('app','Kelola Jurusan') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Jurusan'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jurusan-grid',
	'dataProvider'=>$jurusan->search(),
	'filter'=>$jurusan,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nama',
		array(
			'name' => 'kode',
			'htmlOptions' => array('width' => '50px'),
		),
		array(
			'name' => 'fakultasId',
			'value' => '$data->fakultas->nama',
			'filter' => Fakultas::model()->listData,
		),
		array(
			'name' => 'jenjangId',
			'value' => '$data->jenjang->nama',
			'filter' => Jenjang::model()->listData,
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
