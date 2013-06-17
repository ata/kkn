<h2 class="ac"><?php echo Yii::t('app','Daftar Dosen')?></h2>
<?php $index = 0;?>
<?php foreach($dosens as $i => $dosen):?>
	<div class="page">
		<table class="head">
			<thead>
				<tr>
					<th><?php echo Yii::t('app','Nama Lengkap')?></th>
					<th>:</th>
					<th><?php echo $dosen->namaLengkap?></th>
				</tr>
				<tr>
					<th><?php echo Yii::t('app','NIP')?></th>
					<th>:</th>
					<th><?php echo $dosen->nip?></th>
				</tr>
			</thead>
		</table>
		<h2><?php echo Yii::t('app','Kelompok yang dibimbing')?></h2>
		<table border="1" cellspacing="0" class="data">
			<thead>
				<tr>
					<th class="no"><?php echo Yii::t('app','No')?></th>
					<th><?php echo Yii::t('app','PROGRAM KKN')?></th>
					<th><?php echo Yii::t('app','LOKASI')?></th>
					<th><?php echo Yii::t('app','KABUPATEN')?></th>
					<th><?php echo Yii::t('app','KECAMATAN')?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($dosen->kelompok as $i => $kelompok):?>
				<tr>
					<td><?php echo $i + 1 ?></td>
					<td><?php echo $kelompok->namaProgramKkn?></td>
					<td><?php echo $kelompok->lokasi?></td>
					<td><?php echo $kelompok->namaKabupaten?></td>
					<td><?php echo $kelompok->namaKecamatan?></td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
	<div style="page-break-before: always;"></div>
	<!--[if IE 7]><br style="height:0; line-height:0"><![endif]-->
<?php endforeach?>
