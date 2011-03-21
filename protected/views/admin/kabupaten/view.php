<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kabupaten') => array('/admin/kabupaten/index'),
	$kabupaten->nama,
);
?>

<h2><?php echo Yii::t('app','Detail Kabupaten') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kabupaten->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kabupaten->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kabupaten ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kabupaten,
	'attributes'=>array(
		'id',
		'nama',
		'created',
		'modified',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kabupaten->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kabupaten->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kabupaten ini?'),
		))?>
</div>
<?php echo Yii::t('app','Daftar Kecamatan yang Tersedia')?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'kecamatan-grid',
	'dataProvider'=>$kecamatan->search(),
	'filter'=>$kecamatan,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => 'array("admin/kecamatan/view","id" => $data->id)',
			'updateButtonUrl' => 'array("admin/kecamatan/update","id" => $data->id)',
			'deleteButtonUrl' => 'array("admin/kecamatan/delete","id" => $data->id)',
		),
	),
));
?>
