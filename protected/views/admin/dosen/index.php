<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Dosen'),
);
?>

<h2><?php echo Yii::t('app','Kelola Dosen') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Dosen'),array('create'),array('class' => 'add-button'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dosen-grid',
	'dataProvider'=>$dosen->search(),
	'filter'=>$dosen,
	'columns'=>array(
		'id',
		'nip',
		'namaLengkap',
		'jenisKelamin',
		'jurusanId',
		/*
		'jurusanId',
		'kontak',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
