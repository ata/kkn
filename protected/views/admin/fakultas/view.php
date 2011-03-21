<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Fakultas') => array('/admin/fakultas/index'),
	$fakultas->nama,
);
?>

<h2><?php echo Yii::t('app','Detail Fakultas') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$fakultas->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$fakultas->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$fakultas,
	'attributes'=>array(
		'id',
		'nama',
		'kode',
		'created',
		'modified',
	),
)); ?>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$fakultas->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$fakultas->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>

<br/><br/>

<h2><?php echo Yii::t('app','Daftar Jurusan')?></h2>

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
			'htmlOptions' => array('width' => '75px'),
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => 'array("admin/jurusan/view","id" => $data->id)',
			'updateButtonUrl' => 'array("admin/jurusan/update","id" => $data->id)',
			'deleteButtonUrl' => 'array("admin/jurusan/delete","id" => $data->id)',
		),
	),
)); ?>


