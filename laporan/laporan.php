<?php  
require_once "../config/config.php";

$nama_file ="anggota_excel-".date('d-m-Y').".xls";

header("content-disposition: attachment; filename='$nama_file'");
header("content-type: application/vdn.ms-excel");

?>
<h2>Laporan Anggota</h2>
<table border="1">
	<thead>
		<th>NO</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
	</thead>
	<tbody>
		<?php

		$query_anggota = "SELECT * FROM anggota";
		$sql_anggota = mysqli_query($koneksi, $query_anggota) or die(mysqli_error($koneksi));
		if(mysqli_num_rows($sql_anggota) != 0):
			$no = 1;  
			while($data = mysqli_fetch_array($sql_anggota, MYSQLI_ASSOC)):
				?>
				<tr>
					<td class="text-center"><?=$no++;?></td>
					<td><?=$data['nim'];?></td>
					<td><?=$data['nama'];?></td>
					<td><?=$data['tempat_lahir'];?></td>
					<td><?=$data['tgl_lahir'];?></td>
					<td class="text-center"><?=($data['jk'] == 'l')?'Laki-laki':'Perempuan';?></td>
					<td class="text-center"><?=$data['prodi'];?></td>
				</tr>
				<?php  
			endwhile;
		endif;
		?>
	</tbody>
</table>