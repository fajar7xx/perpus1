<?php  

$nim = $_GET['id'];
$query_anggota = "SELECT * FROM anggota WHERE nim = '$nim'";
$sql_anggota = mysqli_query($koneksi, $query_anggota);
$data = mysqli_fetch_array($sql_anggota, MYSQLI_ASSOC);

?>


<div class="card w-75 mb-4">
	<div class="card-header text-center">
		Edit Data Anggota
	</div>
	<div class="card-body">
		<form class="needs-validation" novalidate="" method="post">
			<div class="mb-3">
				<label for="nim">NIM</label>
				<input type="text" class="form-control" id="nim" name="nim" value="<?=$data['nim'];?>" readonly>
				<div class="invalid-feedback">
					Masukkan nim dengan betul
				</div>
			</div>

			<div class="mb-3">
				<label for="nama">Nama Lengkap</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama'];?>" required>
				<div class="invalid-feedback">
					masukkan nama lengkap anda
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="tempat">Tempat Lahir</label>
					<input type="text" class="form-control" id="tempat" name="tempat" value="<?=$data['tempat_lahir'];?>" required>
					<div class="invalid-feedback">
						Tempat Lahir
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="tanggal">Tanggal Lahir</label>
					<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?=$data['tgl_lahir'];?>" required>
					<div class="invalid-feedback">
						kapan lahir
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="jk">Jenis Kelamin</label>
					<select class="custom-select d-block w-50" id="jk" name="jk" required>
						<option value="">Jenis Kelamin</option>
						<?php  
						$jk = $data['jk'];
						if($jk == "l"):
						?>
							<option value="l" selected>Laki-Laki</option>
						<?php  
						elseif($jk == "p"):
						?>
							<option value="p" selected>Perempuan</option>
						<?php  
						endif;
						?>
						
						<option value="p">Perempuan</option>					
					</select>
					<div class="invalid-feedback">
						jenis kelamin coy
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="prodi">Program Studi</label>
					<input type="text" class="form-control" id="prodi" name="prodi" value="<?=$data['prodi'];?>" required>
					<div class="invalid-feedback">
						Masukkan program studi
					</div>
				</div>
			</div>

			<hr class="mb-4">
			<a class="btn btn-warning" href="?page=anggota" role="button">Batal</a>
			<input class="btn btn-primary float-right" type="submit" name="ubah" value="Ubah">
		</form>
	</div>
</div>

<?php 


if(isset($_POST['ubah'])){
	// $id_buku = Uuid::uuid4();

	// printf($id_buku);

	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
	$tempat = trim(mysqli_real_escape_string($koneksi, $_POST['tempat']));
	$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
	$jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
	$prodi = trim(mysqli_real_escape_string($koneksi, $_POST['prodi']));


	$query_ubah = "UPDATE
					    anggota
					SET
					    nama = '$nama',
					    tempat_lahir = '$tempat',
					    tgl_lahir = '$tanggal',
					    jk = '$tahun',
					    prodi = '$prodi'
					WHERE
					    nim = '$nim'";

	$sql_ubah = mysqli_query($koneksi, $query_ubah);

	// dump dan debug program
	// var_dump($sql_ubah);
	
	if($sql_ubah):
	?>
		<script type="text/javascript">
			alert("Data Berhasil Diubah");
			window.location='index.php?page=anggota'
		</script>
	<?php
	else:
	?>
		<script type="text/javascript">alert("Data Gagal Ditambahkan");</script>
	<?php
	endif;
}
?>
