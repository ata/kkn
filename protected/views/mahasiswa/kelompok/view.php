<?php
$this->breadcrumbs=array(
	'Kelompok'=>array('/kelompok'),
	'View',
);
Yii::app()->clientScript->registerScript('more-detai','
	var detail = false;
	jQuery("#switch-detail").click(function(){
		if (!detail) {
			jQuery(".more-detail").show("slow");
			detail = true;
			jQuery(this).html("Kurangi Detail");
		} else {
			jQuery(".more-detail").hide("slow");
			detail = false;
			jQuery(this).html("Lebih Detail");
		}
		return false;
	});
	jQuery("#print-link").click(function(){
		window.open("'.$this->createUrl('print').'",
						"Cetak","menubar=no,scrollbars=yes, width=950,height=800");
		return false;
	});
');
?>
<h2><?php echo Yii::t('app','Lokasi KKN') ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kelompok,
	'attributes'=>array(
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
			'name' => 'programKknId',
			'value' => $kelompok->namaProgramKkn
		),
		array(
			'name' => 'deskripsiProgramKkn',
			'type' => 'raw',
			'value' => nl2br($kelompok->deskripsiprogramKkn),
			'cssClass' => 'more-detail',
		),
		array(
			'name' => 'keterangan',
			'type' => 'raw',
			'value' => nl2br($kelompok->keterangan),
			'cssClass' => 'more-detail',
		)
	),
)); ?>

<div class="ar">
	<a href="about:none" id="switch-detail"><?php echo Yii::t('app','Lebih Detail');?></a>
</div>

<?php if($this->isOpened()):?>
<?php if($currentMahasiswa->kelompokId == null):?>
<div class="pilih-link ac">
	<?php echo CHtml::link(Yii::t('app','Pilih Kelompok Ini'),
		array('pilih','id' => $kelompok->id),
		array(
			'submit'=>array('pilih','id'=>$kelompok->id),
			'confirm'=>Yii::t('app','Aapa anda yakin akan memilih kelompok ini?')))?>
</div>
<?php else:?>
<div class="pilih-link ac">
	<?php echo CHtml::link(Yii::t('app','Keluar dari Kelompok Ini'),
		array('keluar'),
		array(
			'submit'=>array('keluar'),
			'confirm'=>Yii::t('app','Setelah ini anda diperbolehkan memilih ulang kelompok. Anda yakin akan keluar dari kelompok ini?')))?>
</div>
<?php endif?>
<?php endif?>

<br/>

<div class="span-16">
	<h3><?php echo Yii::t('app','Anggota Kelompok')?></h3>
</div>
<?php if($currentMahasiswa->kelompokId != null):?>
<div class="print-link ar">
	<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/icons/print.gif','Print'),'#',array('id' => 'print-link')) ?>
</div>
<?php endif ?>
<div class="clear"></div>
<div class="grid-view">
	<table class="items">
		<thead>
			<tr>
				<th><?php echo Yii::t('app','No')?></th>
				<th><?php echo Yii::t('app','NIM')?></th>
				<th><?php echo Yii::t('app','Nama Lengkap')?></th>
				<th><?php echo Yii::t('app','Jurusan')?></th>
				<th><?php echo Yii::t('app','Jenis Kelamin')?></th>
				<th><?php echo Yii::t('app','Telpon')?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($kelompok->anggota) !== 0):?>
			<?php foreach($kelompok->anggota as $i => $mahasiswa):?>
			<tr class="<?php echo $i%2==0?'odd':'even'?>">
				<td width="30px"><?php echo $i + 1 ?></td>
				<td width="60px"><?php echo $mahasiswa->nim?></td>
				<td width="200px"><?php echo CHtml::link($mahasiswa->namaLengkap,array('/mahasiswa/mahasiswa/view','id' => $mahasiswa->id),array('title' => Yii::t('app','Klik untuk melihat detail mahasiswa')))?></td>
				<td><?php echo $mahasiswa->jurusan?></td>
				<td width="100px"><?php echo $mahasiswa->displayJenisKelamin?></td>
				<td><?php echo $mahasiswa->phone1 ?></td>
			</tr>
			<?php endforeach?>
			<?php else:?>
			<tr>
				<td colspan="6" align="center"><?php echo Yii::t('app','Anggota ini belum memiliki kelompok')?></td>
			</tr>
			<?php endif?>
		</tbody>
	</table>
</div>
<?php if(count($kelompok->programKkn->lampiran) > 0):?>
	<h3><?php echo Yii::t('app','Lampiran')?></h3>
	<?php foreach($kelompok->programKkn->lampiran as $data):?>
		<?php echo CHtml::link($data->nama,array('download','id'=>$data->id))?><br>
	<?php endforeach?>
<?php endif?>
<br/>
<br/>
<h3><?php echo Yii::t('app','Peta Lokasi KKN')?></h3>
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
<?php if($this->isOpened()):?>
<?php if($currentMahasiswa->kelompokId == null):?>
<div class="pilih-link ac">
	<?php echo CHtml::link(Yii::t('app','Pilih Kelompok Ini'),
		array('pilih','id' => $kelompok->id),
		array(
			'submit'=>array('pilih','id'=>$kelompok->id),
			'confirm'=>Yii::t('app','Anda tidak bisa memilih ulang kelompok, apa anda yakin akan memilih kelompok ini?')))?>
</div>
<?php else:?>
<div class="pilih-link ac">
	<?php echo CHtml::link(Yii::t('app','Keluar dari Kelompok Ini'),
		array('keluar'),
		array(
			'submit'=>array('keluar'),
			'confirm'=>Yii::t('app','Setelah ini anda diperbolehkan memilih ulang kelompok. Anda yakin akan keluar dari kelompok ini?')))?>
</div>
<?php endif?>
<?php endif?>

