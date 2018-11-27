<?php  
$id_buku = $_GET['id'];

$query_hapusbuku = "DELETE FROM buku WHERE id_buku = '$id_buku'";
$sql_hapusbuku = mysqli_query($koneksi, $query_hapusbuku) or die(mysqli_error($koneksi));

?>
<script type="text/javascript">
	window.location='index.php?page=buku';
</script>