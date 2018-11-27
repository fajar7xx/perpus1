<div class="card w-75">
	<div class="card-header text-center">
		Tambah Data Anggota
	</div>
	<div class="card-body">
		<form class="needs-validation mt-2 mb-2" novalidate="" method="post">
			<div class="mb-3">
				<label for="nim">NIM</label>
				<input type="text" class="form-control" id="nim" name="nim" required>
				<div class="invalid-feedback">
					Masukkan nim dengan betul
				</div>
			</div>

			<div class="mb-3">
				<label for="nama">Nama Lengkap</label>
				<input type="text" class="form-control" id="nama" name="nama" required>
				<div class="invalid-feedback">
					masukkan nama lengkap anda
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="tempat">Tempat Lahir</label>
					<input type="text" class="form-control" id="tempat" name="tempat" required>
					<div class="invalid-feedback">
						Tempat Lahir
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="tanggal">Tanggal Lahir</label>
					<input type="date" class="form-control" id="tanggal" name="tanggal" required>
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
						<option value="l">Laki-Laki</option>
						<option value="p">Perempuan</option>					
					</select>
					<div class="invalid-feedback">
						jenis kelamin coy
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="prodi">Program Studi</label>
					<input type="text" class="form-control" id="prodi" name="prodi" required>
					<div class="invalid-feedback">
						Masukkan program studi
					</div>
				</div>
			</div>

			<hr class="mb-4">
			<a class="btn btn-warning" href="?page=anggota" role="button">Batal</a>
			<input class="btn btn-primary float-right" type="submit" name="simpan" value="simpan">
		</form>
	</div>
</div>

<?php 

// require_once 'libs/vendor/autoload.php';

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['simpan'])){
	// printf($id_buku);
	// $id_buku = Uuid::uuid4();
	
	$nim = trim(mysqli_real_escape_string($koneksi, $_POST['nim']));
	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
	$tempat = trim(mysqli_real_escape_string($koneksi, $_POST['tempat']));
	$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
	$jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
	$prodi = trim(mysqli_real_escape_string($koneksi, $_POST['prodi']));
	


	$query_simpan = "INSERT INTO anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi) VALUES('$nim', '$nama', '$tempat', '$tanggal', '$jk', '$prodi')";
	$sql_simpan = mysqli_query($koneksi, $query_simpan) or die(mysqli_error($koneksi));

	// dump dan debug program
	// var_dump($sql_simpan);
	
	if($sql_simpan):
	?>
		<script type="text/javascript">
			alert("Data Berhasil Ditambahkan");
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
