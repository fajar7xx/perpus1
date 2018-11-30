<?php  
$id_transaksi = $_GET['id'];
$id_buku = $_GET['buku'];
$lambat = $_GET['lambat'];
$kembali = $_GET['kembali'];

// echo "transaksi $id_transaksi dan terlambat $lambat kembalinya pada saat $kembali";

if($lambat >= 7){
	?>
	<script type="text/javascript">
		alert("pinjam buku tidak dapat di perpanjang, karena lebih dari 7 hari... kembalikan dahulu kemudian pinjam kembali.");
		window.location.href="?page=transaksi";
	</script>
	<?php
}
else{
	// Y-M-d
	// $pecah_tgl_kembali = explode("-", $kembali);
	// echo "tahun = $pecah_tgl_kembali[0] <br>";
	// echo "bulan = $pecah_tgl_kembali[1] <br>";
	// echo "tanggal = $pecah_tgl_kembali[2] <br>";
	// $next_7hari = mktime(0,0,0, 2017, 11, 27);
	// // echo "next 7 hari adalah $next_7hari <br>";
	// $hari_next = date("Y-m-d", $next_7hari);
	// echo "hari selanjutnya adalah $hari_next";
	$tambah_7_hari = date('Y-m-d', strtotime($kembali . '+ 7 days'));
	// echo "7 hari kedepan adalah $tambah_7_hari";

	$query_hari_next = "UPDATE transaksi SET tgl_kembali = '$tambah_7_hari' WHERE id_transaksi = '$id_transaksi'";
	$sql_hari_next = mysqli_query($koneksi, $query_hari_next);

	if($sql_hari_next):
	?>
		<script type="text/javascript">
			alert("Perpanjangan Berhasil");
			window.location='?page=transaksi';
		</script>
	<?php
	else:
	?>
		<script type="text/javascript">
			alert("gagal diperpanjang");
			window.location='?page=transaksi';
		</script>
	<?php
	endif;
}
?>