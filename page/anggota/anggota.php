<?php
// require_once 'config/config.php';

$query_anggota = "SELECT * FROM anggota";
$sql_anggota = mysqli_query($koneksi, $query_anggota) or die(mysqli_error($koneksi));
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h3>Data Anggota</h3>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a class="btn btn-primary" href="?page=anggota&aksi=tambah" role="button"><i class="fa fa-plus-square mr-1"></i>Tambah Anggota</a>  
    <a class="btn btn-outline-info ml-2" href="./laporan/laporan.php" role="button"><i class="fa fa-download mr-1"></i>Export ke Excel</a>
    <a class="btn btn-outline-success ml-2" href="./laporan/laporanpdf.php" role="button"><i class="fa fa-download mr-1"></i>Export ke pdf</a>    
  </div>
</div>


<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover" id="buku">
    <thead>
      <tr class="text-center">
        <th>#</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Program Studi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(mysqli_num_rows($sql_anggota) != 0):
        $no = 1;  
        while($data = mysqli_fetch_array($sql_anggota, MYSQLI_ASSOC)):
      ?>
      <tr>
        <td class="text-center"><?=$no++;?></td>
        <td><?=$data['nim'];?></td>
        <td><?=$data['nama'];?></td>
        <td><?=$data['tempat_lahir'];?></td>
        <td><?=$data['tgl_lahir'];?></td>
        <td class="text-center"><?=($data['jk'] == 'l')?'Laki-laki':'Perempuan';?></td>
        <td class="text-center"><?=$data['prodi'];?></td>
        <td class="text-center">
          <a class="btn btn-outline-info btn-sm" href="?page=anggota&aksi=ubah&id=<?=$data['nim'];?>" role="button"><i class="fa fa-edit mr-1"></i> Edit</a>
          <a class="btn btn-outline-danger btn-sm" href="?page=anggota&aksi=hapus&id=<?=$data['nim'];?>" role="button" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa fa-trash mr-1"></i> Hapus</a>
        </td>
      </tr>
      <?php  
        endwhile;
      endif;
      ?>
    </tbody>
  </table>
</div>