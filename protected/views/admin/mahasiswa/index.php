
<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Mahasiswa'),
);
?>

<h2><?php echo Yii::t('app','Kelola Mahasiswa') ?></h2>
<?php echo CHtml::link(Yii::t('app','Tambah Mahasiswa'),array('create'),array('class' => 'add-button'))?>
<?php echo CHtml::link(Yii::t('app','Bayar Asuransi'),array('bayarAsuransi'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mahasiswa-grid',
	'dataProvider'=>$mahasiswa->search(),
	'filter'=>$mahasiswa,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'nim',
		array(
			'name' => 'namaLengkap',
			'header' => 'Nama'
		),
		array(
			'name' =>'jurusanId',
			'filter' => CHtml::activeDropDownList($mahasiswa,'jurusanId',Jurusan::model()->listData,array(
				'empty'=>'',
				)),
			'value' => '$data->namaJurusan',
		),
		array(
			'name' =>'jenisKelamin',
			'header' => 'J.Kelamin',
			'filter' => array(
				Mahasiswa::LAKI_LAKI => Yii::t('app','Laki-laki'),
				Mahasiswa::PEREMPUAN => Yii::t('app','Perempuan'),
			)
		),
		array(
			'name' =>'registered',
			'header' => 'Registrasi',
			'value' => '$data->registeredLabel',
			'filter' => array(
				0 => Yii::t('app','Belum Registrasi'),
				1 => Yii::t('app','Sudah Registrasi'),
			)
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="loud">
	<?php echo Yii::t('app','Jumlah Laki-laki: <b>{jumlah}</b> orang', array(
		'{jumlah}' =>  Mahasiswa::model()->countLakiLaki(),
	))?>
	<br/>
	<?php echo Yii::t('app','Jumlah Perempuan: <b>{jumlah}</b> orang', array(
		'{jumlah}' =>  Mahasiswa::model()->countPerempuan(),
	))?>
	<br/>
	<?php echo Yii::t('app','Jumlah Mahasiswa Terdaftar: <b>{jumlah}</b> orang', array(
		'{jumlah}' =>  Mahasiswa::model()->countTerdaftar(),
	))?>
	<br/>
	<?php echo Yii::t('app','Jumlah Mahasiswa Terdaftar Tapi Belum Memilih Kelompok: <b>{jumlah}</b> orang', array(
		'{jumlah}' =>  Mahasiswa::model()->countKelompokNull(),
	))?>
</div>
