<?php $no = 1;?>
<table id="tabelPrint">
	<thead>
		<tr>
			<tr>No</tr>
			<tr>NIM</tr>
			<tr>Nama Lengkap</tr>
			<tr>Jenis Kelamin</tr>
		</tr>
	</thead>
	<tbody>
		<?php foreach($mahasiswa as $data):?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $data->nim?></td>
				<td><?php echo $data->namaLengkap?></td>
				<td><?php echo $data->jenisKelamin?></td>
			</tr>
		<?php endforeach?>
	</tbody>
</table>

	
	
	

