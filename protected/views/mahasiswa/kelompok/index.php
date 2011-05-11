<?php
$this->breadcrumbs=array(
	Yii::t('app','Dashboard') => array('dashboard/default/index'),
	Yii::t('app','Kelompok'),
);?>
<h2><?php echo Yii::t('app','Daftar Kelompok/Lokasi KKN yang tersedia untuk ANDA')?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kelompok-grid',
	'dataProvider'=>$kelompok->searchAvailable($currentMahasiswa),
	'filter'=>$kelompok,
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
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
		//'maxAnggota',
		array(
			'name'=>'programKknId',
			'value'=>'$data->namaProgramKkn',
			'filter'=>ProgramKkn::model()->listData,
		),
		array(
			'name' => 'jumlahAnggota',
			'header' => 'Anggota',
			'value' => '$data->jumlahAnggotaDisplay',
			'filter' => false,
		),
		array(
			'header' => '',
			'value' => 'CHtml::link("Lihat detail",array("view","id" => $data->id),array("class" => "detail-link"))',
			'type' => 'raw',
			'htmlOptions' => array('width' => '70px'),
		)
	),
)); ?>
