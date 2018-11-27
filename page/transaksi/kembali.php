<?php  
$id_transaksi = $_GET['id'];
$id_buku = $_GET['buku'];

$query_kembali = "UPDATE transaksi SET status = 'kembali' WHERE id_transaksi = '$id_transaksi'";
$sql_kembali = mysqli_query($koneksi, $query_kembali) or die(mysqli_error($koneksi));

$query_kembali_buku = "UPDATE buku SET jumlah_buku = (jumlah_buku + 1) WHERE id_buku = '$id_buku'";
$sql_kembali_buku = mysqli_query($koneksi, $query_kembali_buku) or die(mysqli_error($koneksi));
?>

<script type="text/javascript">
	alert("Buku Telah dikembalikan");
	window.location.href="?page=transaksi";
</script>