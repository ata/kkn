<?php $rowPage = 40; ?>
<?php foreach($fakultasList as $fakultas):?>
	<?php foreach($fakultas->jurusan as $jurusan):?>
		<?php $pageCount = ceil(count($jurusan->mahasiswa) / $rowPage)?>
		<?php foreach(range(0, $pageCount - 1) as $page):?>
			<div class="page">
				<table class="head">
					<thead>
						<tr>
							<th><?php echo Yii::t('app','Fakultas')?></th>
							<th>:</th>
							<th><?php echo $fakultas->nama?></th>
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
							<th><?php echo Yii::t('app','STATUS REGISTRASI')?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach(array_slice($jurusan->mahasiswa, $page * $rowPage, $rowPage) as $i => $mahasiswa):?>
						<tr>
							<td><?php echo $page * $rowPage + $i + 1 ?></td>
							<td><?php echo $mahasiswa->nim?></td>
							<td><?php echo $mahasiswa->nama?></td>
							<td><?php echo $mahasiswa->jenisKelamin?></td>
							<td><?php echo strtoupper($mahasiswa->registeredLabel)?></td>
						</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
			<div style="page-break-before: always;"></div>
			<!--[if IE 7]><br style="height:0; line-height:0"><![endif]-->
		<?php endforeach?>
	<?php endforeach ?>
<?php endforeach ?>

