<?php
$this->breadcrumbs=array(
	Yii::t('app','Admin') => array('/admin/default/index'),
	Yii::t('app','Kelompok') => array('/admin/kelompok/index'),
	$kelompok->nama,
);
?>

<h2><?php echo Yii::t('app','Detail Kelompok/Lokasi') ?></h2>
<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kelompok->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kelompok->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kelompok ini?'),
		))?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kelompok,
	'attributes'=>array(
		'id',
		array(
			'name' => 'programKknId',
			'value' => $kelompok->namaProgramKkn
		),
		array(
			'name' => 'kabupatenId',
			'value' => $kelompok->namaKabupaten
		),
		array(
			'name' => 'kecamatanId',
			'value' => $kelompok->namaKecamatan
		),
		'lokasi',
		array(
			'name' => 'pembimbingId',
			'value' => $kelompok->namaPembimbing
		),
		'maxAnggota',
		'maxLakiLaki',
		'maxPerempuan',
		'jumlahAnggota',
		'jumlahLakiLaki',
		'jumlahPerempuan',
		'keterangan',
		'created',
		'modified',
	),
)); ?>

<div class="action ar">
	<?php echo CHtml::link(Yii::t('app','Ubah'),array('update','id' =>$kelompok->id ),
		array('class' => 'edit-button'))?>
	<?php echo CHtml::link(Yii::t('app','Hapus'),array('delete'),
		array(
			'class' => 'delete-button',
			'submit' => array('delete','id'=>$kelompok->id),
			'confirm'=> Yii::t('app','Anda yakin akan menghapus kelompok ini?'),
		))?>
</div>

<h2><?php echo Yii::t('app','Daftar Mahasiswa di Kelompok')?></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mahasiswa-grid',
	'dataProvider'=>$mahasiswa->search(20),
	'columns'=>array(
		array(
			'class' => 'NumberColumn',
		),
		'namaLengkap',
		'displayJenisKelamin',
		array(
			'name'=>'kelompokId',
			'value'=>'$data->kelompok->nama',
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => 'array("admin/mahasiswa/view","id" => $data->id)',
		),
	),
)); ?>



<h2><?php echo Yii::t('app','Peta Lokasi KKN')?></h2>

<div id="map_canvas" style="height:200px"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
	var latlng = new google.maps.LatLng(<?php echo $kelompok->latitude ?>,<?php echo $kelompok->longitude?>);
	var contentString = '<?php echo Yii::t('app','Your Location')?>';

	var options = {
		zoom: 11,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById('map_canvas'), options);
	var marker = new google.maps.Marker({
		position: latlng,
		map: map,
		title: contentString,
		draggable: false
	});
	google.maps.event.addListener(marker, 'position_changed', function() {
		$('#Kelompok_latitude').val(marker.getPosition().lat());
		$('#Kelompok_longitude').val(marker.getPosition().lng());
	});
</script>
