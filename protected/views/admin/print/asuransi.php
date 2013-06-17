<h2 class="ac"><?php echo Yii::t('app','Daftar Peserta KKN')?></h2>
<?php $rowPage = 35; ?>
<?php $pageCount = ceil(count($jurusan->mahasiswaLunas) / $rowPage)?>
<?php foreach(range(0, $pageCount - 1) as $page):?>
	<div class="page">
		<table class="head">
			<thead>
				<tr>
					<th><?php echo Yii::t('app','Fakultas')?></th>
					<th>:</th>
					<th><?php echo $jurusan->fakultas->nama?></th>
				</tr>
				<tr>
					<th><?php echo Yii::t('app','Program Studi')?></th>
					<th>:</th>
					<th><?php echo $jurusan->nama?></th>
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
					<th><?php echo Yii::t('app','TEMPAT, TANGGAL LAHIR')?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach(array_slice($jurusan->mahasiswaLunas, $page * $rowPage, $rowPage) as $i => $mahasiswa):?>
				<tr>
					<td><?php echo $page * $rowPage + $i + 1 ?></td>
					<td><?php echo $mahasiswa->nim?></td>
					<td><?php echo $mahasiswa->nama?></td>
					<td><?php echo $mahasiswa->jenisKelamin?></td>
					<td><?php echo $mahasiswa->tempatLahir?>, <?php echo $mahasiswa->tanggalLahir?></td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
	<div style="page-break-before: always;"></div>
	<!--[if IE 7]><br style="height:0; line-height:0"><![endif]-->
<?php endforeach?>
