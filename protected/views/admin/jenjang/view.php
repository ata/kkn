<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Jurusan') => array('/jenjang/jenjang/index'),
	$jenjang->nama,
);
?>
<h2><?php echo Yii::t('app','Detail Jenjang') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$jenjang->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$jenjang->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus jenjang ini?'),
		))?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$jenjang,
	'attributes'=>array(
		'id',
		'nama',
		'kode',
		'created',
		'modified',
	),
)); ?>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$jenjang->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$jenjang->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus jenjang ini?'),
		))?>
</div>
