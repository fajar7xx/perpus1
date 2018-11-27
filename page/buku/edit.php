<?php  
$id_buku = $_GET['id'];

$query_tampilbuku = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$sql_tampilbuku = mysqli_query($koneksi, $query_tampilbuku);
$data = mysqli_fetch_array($sql_tampilbuku, MYSQLI_ASSOC);

$data_tahun = $data['tahun_terbit'];

?>

<div class="card w-75 mb-4">
	<div class="card-header text-center">
		Ubah Data
	</div>
	<div class="card-body">
		<form class="needs-validation mt-2 mb-2" novalidate="" method="post">
			<div class="mb-3">
				<input type="hidden" name="id_buku" value="<?=$data['id_buku'];?>">
				<label for="Judul">Judul</label>
				<input type="text" class="form-control" id="Judul" name="judul" value="<?=$data['judul_buku'];?>" required>
				<div class="invalid-feedback">
					Tolong Masukkan Judul Buku.
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="Pengarang">Pengarang</label>
					<input type="text" class="form-control" id="Pengarang" name="pengarang" value="<?=$data['pengarang'];?>" required>
					<div class="invalid-feedback">
						Nama pengarang.
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="penerbit">Penerbit</label>
					<input type="text" class="form-control" id="penerbit" name="penerbit" value="<?=$data['penerbit'];?>" required>
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
							if($i == $data_tahun):
						?>
							<option value="<?=$i;?>" selected><?=$i;?></option>
						<?php
							else:  
						?>
							<option value="<?=$i;?>"><?=$i;?></option>	
						<?php
							endif;  
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
						<?php  
						$rak = $data['lokasi'];
						if($rak == 'rak 1'){
							echo "<option value='rak 1' selected>rak1</option>";
						}
						elseif($rak == 'rak 2'){
							echo "<option value='rak 2' selected>rak2</option>";
						}
						elseif($rak == 'rak 3'){
							echo "<option value='rak 3' selected>rak3</option>";
						}
						?>
					</select>
					<div class="invalid-feedback">
						Harap Isi tahun
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 mb-3">
					<label for="isbn">isbn</label>
					<input type="text" class="form-control" id="isbn" name="isbn" value="<?=$data['isbn'];?>" required>
					<div class="invalid-feedback">
						isbn.
					</div>
				</div>
				<div class="col-md-5 mb-3">
					<label for="jumlah">jumlah</label>
					<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?=$data['jumlah_buku'];?>" required>
					<div class="invalid-feedback">
						penerbitnya mana.
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 mb-3">
					<label for="tanggal">tanggal</label>
					<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?=$data['tgl_input'];?>" required>
					<div class="invalid-feedback">
						isbn.
					</div>
				</div>
			</div>

			<hr class="mb-4">
			<a class="btn btn-outline-warning" href="?page=buku">Batal</a>
			<input class="btn btn-primary float-right" type="submit" name="ubah" value="ubah">
		</form>
	</div>
</div>

<?php  
// require_once 'libs/vendor/autoload.php';

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if(isset($_POST['ubah'])){
	// $id_buku = Uuid::uuid4();

	// printf($id_buku);

	$judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
	$pengarang = trim(mysqli_real_escape_string($koneksi, $_POST['pengarang']));
	$penerbit = trim(mysqli_real_escape_string($koneksi, $_POST['penerbit']));
	$tahun = trim(mysqli_real_escape_string($koneksi, $_POST['tahun']));
	$lokasi = trim(mysqli_real_escape_string($koneksi, $_POST['lokasi']));
	$isbn = trim(mysqli_real_escape_string($koneksi, $_POST['isbn']));
	$jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
	$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));

	$query_ubah = "UPDATE
					    buku
					SET
					    judul_buku = '$judul',
					    pengarang = '$pengarang',
					    penerbit = '$penerbit',
					    tahun_terbit = '$tahun',
					    isbn = '$isbn',
					    jumlah_buku = '$jumlah',
					    lokasi = '$lokasi',
					    tgl_input = '$tanggal'
					WHERE
					    id_buku = '$id_buku'";

	$sql_ubah = mysqli_query($koneksi, $query_ubah) or die(mysqli_error($koneksi));

	// dump dan debug program
	// var_dump($sql_simpan);
	
	if($sql_ubah):
	?>
		<script type="text/javascript">
			alert("Data Berhasil Diubah");
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
