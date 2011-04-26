<style type="text/css" media="print,screen">

</style>
<?php $no = 1;?>
<div align="center">
<table id="tabelPrint" border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($mahasiswa as $data):?>
			<?php if($no > 1 && $no % 30 == 0):?>
				</tr><tr style="page-break-after:always">
			<?php else:?>
				</tr><tr>
			<?php endif?>
				<td><?php echo $no++?></td>
				<td><?php echo $data->nim?></td>
				<td><?php echo $data->namaLengkap?></td>
				<td><?php echo $data->jenisKelamin?></td>
		<?php endforeach?>
	</tbody>
</table>
</div>

	
	
	

