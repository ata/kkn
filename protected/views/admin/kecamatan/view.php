<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/admin/kecamatan/index'),
	$kecamatan->nama,
);
?>

<h2><?php echo Yii::t('app','View Kecamatan') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kecamatan->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kecamatan->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kecamatan ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kecamatan,
	'attributes'=>array(
		'id',
		'nama',
		'kecamatanId',
		'created',
		'modified',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kecamatan->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kecamatan->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kecamatan ini?'),
		))?>
</div>

<h3><?php echo Yii::t('app','Daftar Kelompok yang Tersedia')?></h3>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'kecamatan-grid',
	'dataProvider'=>$kelompok->search(),
	'filter'=>$kelompok,
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions' => array('width' => '50px'),
		),
		array(
			'name'=>'programKknId',
			'value'=>'$data->programKkn->nama',
			'filter'=>ProgramKkn::model()->listData,
		),
		array(
			'name'=>'kecamatanId',
			'value'=>'$data->kecamatan->nama',
			'filter'=>Kabupaten::model()->listData,
		), 
		'lokasi',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => 'array("admin/kelompok/view","id" => $data->id)',
			'updateButtonUrl' => 'array("admin/kelompok/update","id" => $data->id)',
			'deleteButtonUrl' => 'array("admin/kelompok/delete","id" => $data->id)',
		),
	),
));
?>


