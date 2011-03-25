<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Dosen') => array('/admin/dosen/index'),
	$dosen->nama,
);
?>

<h2><?php echo Yii::t('app','Detail Dosen') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$dosen->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$dosen->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$dosen,
	'attributes'=>array(
		'id',
		'nip',
		'namaLengkap',
		'jenisKelamin',
		'fakultas',
		'jurusan',
		'kontak',
		'created',
		'modified',
	),
)); ?>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$dosen->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$dosen->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus berita ini?'),
		))?>
</div>
