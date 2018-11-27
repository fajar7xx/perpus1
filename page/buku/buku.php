<?php
// require_once 'config/config.php';

$query_buku = "SELECT * FROM buku";
$sql_buku = mysqli_query($koneksi, $query_buku) or die(mysqli_error($koneksi));
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h3>Data Buku</h3>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a class="btn btn-primary" href="?page=buku&aksi=tambah" role="button"><i class="fa fa-plus-square mr-1"></i>Tambah Buku</a>    
  </div>
</div>


<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover" id="buku">
    <thead>
      <tr class="text-center">
        <th>#</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>ISBN</th>
        <th>Jumlah Buku</th>
        <th>Lokasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(mysqli_num_rows($sql_buku) != 0):
        $no = 1;  
        while($data = mysqli_fetch_array($sql_buku, MYSQLI_ASSOC)):
      ?>
      <tr>
        <td class="text-center"><?=$no++;?></td>
        <td><?=$data['judul_buku'];?></td>
        <td><?=$data['pengarang'];?></td>
        <td><?=$data['penerbit'];?></td>
        <td><?=$data['isbn'];?></td>
        <td class="text-center"><?=$data['jumlah_buku'];?></td>
        <td class="text-center"><?=$data['lokasi'];?></td>
        <td class="text-center">
          <a class="btn btn-outline-info btn-sm" href="?page=buku&aksi=ubah&id=<?=$data['id_buku'];?>" role="button"><i class="fa fa-edit mr-1"></i> Edit</a>
          <a class="btn btn-outline-danger btn-sm" href="?page=buku&aksi=hapus&id=<?=$data['id_buku'];?>" role="button" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa fa-trash mr-1"></i> Hapus</a>
        </td>
      </tr>
      <?php  
        endwhile;
      endif;
      ?>
    </tbody>
  </table>
</div>