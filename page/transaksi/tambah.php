<?php  

// membuat otomatisasi sederhana tanggal peminjaman dan kembali
$tgl_pinjam = date("Y-m-d");
$tujuh_hari  = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

?>

<div class="card w-75">
	<div class="card-header text-center">
		Tambah Transaksi Peminjaman Buku
	</div>
	<div class="card-body">
		<form class="needs-validation mt-2 mb-2" onsubmit="return validasi(this)" method="post">
			<!-- <div class="mb-3">
				<label for="buku">Judul Buku</label>
				<input type="text" class="form-control" id="buku" name="buku" required>
			</div> -->
			<div class="form-group mb-3">
				<label for="buku">Judul Buku</label>
				<select class="form-control" id="buku" name="buku">
					<option value="">Pilih Judul Buku</option>
					<?php
					$query_buku = "SELECT * FROM buku ORDER BY judul_buku";
					$sql_buku = mysqli_query($koneksi, $query_buku);

					if(mysqli_num_rows($sql_buku)):  
						while($datab = mysqli_fetch_array($sql_buku, MYSQLI_ASSOC)):
					?>
						<option value="<?=$datab['id_buku'];?>"><?=$datab['judul_buku'];?></option>
					<?php  
						endwhile;
					endif;
					?>
				</select>
			</div>

			<div class="form-group mb-3">
				<label for="nama">Nama Lengkap</label>
				<select class="form-control" id="nama" name="nama">
					<option value="">Nama Peminjam</option>
					<?php
					$query_anggota = "SELECT * FROM anggota ORDER BY nim";
					$sql_anggota = mysqli_query($koneksi, $query_anggota);

					if(mysqli_num_rows($sql_anggota)):  
						while($data = mysqli_fetch_array($sql_anggota, MYSQLI_ASSOC)):
					?>
						<option value="<?=$data['nim'];?>"><?=$data['nim']." - ".$data['nama'];?></option>
					<?php  
						endwhile;
					endif;
					?>
				</select>
			</div>


			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="tgl_pinjam">Tanggal Peminjaman</label>
					<input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?=$tgl_pinjam;?>" readonly>
				</div>
				<div class="col-md-6 mb-3">
					<label for="tgl_kembali">Tanggal Kembali</label>
					<input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?=$kembali;?>" readonly>
				</div>
			</div>

			<hr class="mb-4">
			<a class="btn btn-warning" href="?page=anggota" role="button">Batal</a>
			<input class="btn btn-primary float-right" type="submit" name="simpan" value="simpan">
		</form>
	</div>
</div>

<?php 

require_once 'libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['simpan'])){
	// printf($id_buku);
	$id_transaksi = Uuid::uuid4();


	// idbuku
	$buku = trim(mysqli_real_escape_string($koneksi, $_POST['buku']));

	// id nama
	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));

	$tgl_pinjam = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_pinjam']));
	$tgl_kembali = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_kembali']));

	$status = 'pinjam';

	$qbuku = "SELECT * FROM buku WHERE id_buku = '$buku'";
	$sbuku = mysqli_query($koneksi, $qbuku);
	if(mysqli_num_rows($sbuku) > 0){
		while($data = mysqli_fetch_assoc($sbuku)){
			$sisa = $data['jumlah_buku'];


			// kalau jumlah buku sudah nol kasih peringatan
			if($sisa == 0){
			?>
				<script type="text/javascript">
					alert("Stok buku telah habis,transaksi tidak dapat dilanjutkan, silahkan tambahkan stok buku terlebih dahulu.");
					window.location.href="?page=transaksi&aksi=tambah";
				</script>
			<?php
			}
			else{
				$query_simpan = "INSERT INTO transaksi (id_transaksi, id_buku, nim, tgl_pinjam, tgl_kembali, status) VALUES('$id_transaksi', '$buku', '$nama', '$tgl_pinjam', '$tgl_kembali', '$status')";
				$sql_simpan = mysqli_query($koneksi, $query_simpan) or die(mysqli_error($koneksi));

				$query_update_stok_buku = "UPDATE buku set jumlah_buku=(jumlah_buku - 1) WHERE id_buku = '$buku'";
				$sql_update_stok_buku = mysqli_query($koneksi, $query_update_stok_buku) or die(mysqli_error($koneksi));

				// dump dan debug program
				// var_dump($sql_simpan);
				
				if($sql_update_stok_buku):
				?>
					<script type="text/javascript">
						alert("Data Berhasil Ditambahkan");
						window.location='?page=transaksi';
					</script>
				<?php
				else:
				?>
					<script type="text/javascript">alert("Data Gagal Ditambahkan");</script>
				<?php
				endif;
			}
			
		}	
	}
}
?>