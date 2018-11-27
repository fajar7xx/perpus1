<?php  
$nim = $_GET['id'];

$query_hapus = "DELETE FROM anggota WHERE nim = '$nim'";
$sql_hapus = mysqli_query($koneksi, $query_hapus) or die(mysqli_error($koneksi));

?>
<script type="text/javascript">
	window.location='index.php?page=anggota';
</script>