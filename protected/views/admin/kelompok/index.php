<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kelompok'),
);
?>

<h2><?php echo Yii::t('app','Kelola Kelompok') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Kelompok'),array('create'),array('class' => 'add-button'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kelompok-grid',
	'dataProvider'=>$kelompok->search(),
	'filter'=>$kelompok,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		array(
			'name'=>'programKknId',
			'value'=>'$data->namaProgramKkn',
			'filter'=>ProgramKkn::model()->listData,
		),
		array(
			'name'=>'kabupatenId',
			'value'=>'$data->namaKabupaten',
			'filter'=>Kabupaten::model()->listData,
		),
		array(
			'name'=>'kecamatanId',
			'value'=>'$data->namaKecamatan',
			'filter'=>Kecamatan::model()->listData,
		),
		'lokasi',
		array(
			'name'=>'pembimbingId',
			'value'=>'$data->namaPembimbing',
			'filter'=>Dosen::model()->listData,
		),
		'jumlahAnggotaDisplay',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<br/><br/>
<div class="note">
	<?php echo Yii::t('app','Jumlah Maksimal Mahasiswa Perkelompok: <b>{jumlah}</b> orang', array(
		'{jumlah}' => Kelompok::model()->countMaxAnggota()
	))?>
	<br/>
	<?php echo Yii::t('app','Jumlah Maksimal Laki-laki Perkelompok: <b>{jumlah}</b> orang', array(
		'{jumlah}' => Kelompok::model()->countMaxLakiLaki()
	))?>
	<br/>
	<?php echo Yii::t('app','Jumlah Maksimal Perempuan Perkelompok: <b>{jumlah}</b> orang', array(
		'{jumlah}' => Kelompok::model()->countMaxPerempuan()
	))?>
</div>
