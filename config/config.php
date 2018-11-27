<?php  
$host = "localhost";
$user = "root";
$pw = "";
$db = "perpus";

$koneksi = mysqli_connect($host, $user, $pw, $db);

if(!$koneksi){
	echo "Error: Unable to connect to MySql." . PHP_EOL;
	echo "Debugging errno : " . mysqli_connect_errno() . PHP_EOL;
	echo " Debugging Error : " . mysqli_connect_error() . PHP_EOL;
	exit; 
}

// echo " Koneksi berhasil dengan baik ke database. <br>" . PHP_EOL;
// echo " Host Information: " . mysqli_get_host_info($koneksi) . PHP_EOL;

// mysqli_close($koneksi);
?>