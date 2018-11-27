<div class="card w-75">
	<div class="card-header text-center">
		Tambah Data
	</div>
	<div class="card-body">
		<form class="needs-validation mt-2 mb-2" novalidate="" method="post">
			<div class="mb-3">
				<label for="Judul">Judul</label>
				<input type="text" class="form-control" id="Judul" name="judul" required>
				<div class="invalid-feedback">
					Tolong Masukkan Judul Buku.
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="Pengarang">Pengarang</label>
					<input type="text" class="form-control" id="Pengarang" name="pengarang" required>
					<div class="invalid-feedback">
						Nama pengarang.
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="penerbit">Penerbit</label>
					<input type="text" class="form-control" id="penerbit" name="penerbit" required>
					<div class="invalid-feedback">
						penerbitnya mana.
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-5 mb-3">
					<label for="tahun">Tahun Terbit</label>
					<select class="custom-select d-block w-100" id="tahun" name="tahun" required>
						<option value="">Tahun...</option>
						<?php  
						$tahun = date("Y");
						for($i=$tahun-25; $i<=$tahun; $i++):
						?>
							<option value="<?=$i;?>"><?=$i;?></option>	
						<?php  
						endfor;
						?>		
					</select>
					<div class="invalid-feedback">
						Harap Isi tahun
					</div>
				</div>
				<div class="col-md-5 mb-3">
					<label for="lokasi">Lokasi Buku</label>
					<select class="custom-select d-block w-100" id="lokasi" name="lokasi" required>
						<option value="">Rak...</option>
						<option value="rak 1">rak1</option>
						<option value="rak 2">rak2</option>
						<option value="rak 3">rak3</option>						
					</select>
					<div class="invalid-feedback">
						Harap Isi tahun
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 mb-3">
					<label for="isbn">isbn</label>
					<input type="text" class="form-control" id="isbn" name="isbn" required>
					<div class="invalid-feedback">
						isbn.
					</div>
				</div>
				<div class="col-md-5 mb-3">
					<label for="jumlah">jumlah</label>
					<input type="number" class="form-control" id="jumlah" name="jumlah" required>
					<div class="invalid-feedback">
						penerbitnya mana.
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 mb-3">
					<label for="tanggal">tanggal</label>
					<input type="date" class="form-control" id="tanggal" name="tanggal" required>
					<div class="invalid-feedback">
						isbn.
					</div>
				</div>
			</div>

			<hr class="mb-4">
			<input class="btn btn-primary float-right" type="submit" name="simpan" value="simpan">
		</form>
	</div>
</div>

<?php  
require_once 'libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['simpan'])){
	$id_buku = Uuid::uuid4();

	// printf($id_buku);

	$judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
	$pengarang = trim(mysqli_real_escape_string($koneksi, $_POST['pengarang']));
	$penerbit = trim(mysqli_real_escape_string($koneksi, $_POST['penerbit']));
	$tahun = trim(mysqli_real_escape_string($koneksi, $_POST['tahun']));
	$lokasi = trim(mysqli_real_escape_string($koneksi, $_POST['lokasi']));
	$isbn = trim(mysqli_real_escape_string($koneksi, $_POST['isbn']));
	$jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
	$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

	$query_simpan = "INSERT INTO buku (id_buku, judul_buku, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input) VALUES('$id_buku', '$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$jumlah', '$lokasi', '$tanggal')";
	$sql_simpan = mysqli_query($koneksi, $query_simpan) or die(mysqli_error($koneksi));

	// dump dan debug program
	// var_dump($sql_simpan);
	
	if($sql_simpan):
	?>
		<script type="text/javascript">
			alert("Data Berhasil Ditambahkan");
			window.location='index.php?page=buku'
		</script>
	<?php
	else:
	?>
		<script type="text/javascript">alert("Data Gagal Ditambahkan");</script>
	<?php
	endif;
}
?>
