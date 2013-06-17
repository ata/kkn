
<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Mahasiswa') => array('/admin/mahasiswa/index'),
	$mahasiswa->nama,
);
?>

<h2><?php echo Yii::t('app','Detail Mahasiswa') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$mahasiswa->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$mahasiswa->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus mahasiswa ini?'),
		))?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$mahasiswa,
	'attributes'=>array(
		'id',
		'namaLengkap',
		'nim',
		'alamatAsal',
		'alamatTinggal',
		'namaFakultas',
		'namaJurusan',
		'namaKelompok',
		'namaKecamatan',
		'namaKabupaten',
		'kodeJenjang',
		'jenisKelamin',
		'phone1',
		'phone2',
		'photoPath',
		'registered',
		'created',
		'modified',
	),
)); ?>

<div class="action ar" id="action-view">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$mahasiswa->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$mahasiswa->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus mahasiswa ini?'),
		))?>
	<?php if($mahasiswa->lunasAsuransi != Mahasiswa::ASURANSI_LUNAS && $mahasiswa->registered):?>
	<?php echo CHtml::ajaxLink(Yii::t('app','Bayar Asuransi'),
		Yii::app()->createUrl('admin/mahasiswa/bayarAsuransi'),
		array(
			'onlick'=>'$("#bayarDiv").dialog("open");return false;',
			'update'=>'#bayarDiv',
			'type'=>'POST',
			'data'=>array('id'=>$mahasiswa->id),
		),
		array('id'=>'showBayarDiv'))?>
	<?php endif?>
</div>

<div id="bayarDiv">

</div>
