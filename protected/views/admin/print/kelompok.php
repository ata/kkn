<h2 class="ac"><?php echo Yii::t('app','Daftar Peserta KKN')?></h2>
<?php foreach($kelompoks as $kelompok):?>
	<div class="page">
		<table class="head">
			<thead>
				<tr>
					<th><?php echo Yii::t('app','Kabupaten')?></th>
					<th>:</th>
					<th><?php echo $kelompok->namaKabupaten?></th>
				</tr>
				<tr>
					<th><?php echo Yii::t('app','Kecamatan')?></th>
					<th>:</th>
					<th><?php echo $kelompok->namaKecamatan?></th>
				</tr>
				<tr>
					<th><?php echo Yii::t('app','Lokasi')?></th>
					<th>:</th>
					<th><?php echo $kelompok->lokasi?></th>
				</tr>
				<tr>
					<th><?php echo Yii::t('app','Program KKN')?></th>
					<th>:</th>
					<th><?php echo $kelompok->namaProgramKkn?></th>
				</tr>
			</thead>
		</table>
		<table border="1" cellspacing="0" class="data">
			<thead>
				<tr>
					<th class="no"><?php echo Yii::t('app','No')?></th>
					<th><?php echo Yii::t('app','NIM')?></th>
					<th><?php echo Yii::t('app','NAMA')?></th>
					<th><?php echo Yii::t('app','J.KELAMIN')?></th>
					<th><?php echo Yii::t('app','PROGRAM STUDI')?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($kelompok->anggota as $i => $mahasiswa):?>a
				<tr>
					<td><?php echo $i + 1 ?></td>
					<td><?php echo $mahasiswa->nim?></td>
					<td><?php echo $mahasiswa->nama?></td>
					<td><?php echo $mahasiswa->jenisKelamin?></td>
					<td><?php echo $mahasiswa->namaJurusan?></td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
	<div style="page-break-before: always;"></div>
	<!--[if IE 7]><br style="height:0; line-height:0"><![endif]-->
<?php endforeach?>
