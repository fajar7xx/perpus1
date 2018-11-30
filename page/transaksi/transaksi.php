<?php

$query_transaksi = "SELECT
					    transaksi.*,
					    buku.judul_buku,
					    anggota.nama
					FROM
					    `transaksi`
					JOIN anggota USING (nim)
					JOIN buku USING (id_buku)";
$sql_transaksi = mysqli_query($koneksi, $query_transaksi) or die(mysqli_error($koneksi));
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h3>Data Transaksi</h3>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a class="btn btn-primary" href="?page=transaksi&aksi=tambah" role="button"><i class="fa fa-plus-square mr-1"></i>Tambah Transaksi</a>    
  </div>
</div>


<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover" id="buku">
    <thead>
      <tr class="text-center">
        <th>#</th>
        <th>Judul</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
		<th>Terlambat</th>
		<th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(mysqli_num_rows($sql_transaksi) != 0):
        $no = 1;  
        while($data = mysqli_fetch_array($sql_transaksi, MYSQLI_ASSOC)):
      ?>
      <tr>
        <td class="text-center"><?=$no++;?></td>
        <td><?=$data['judul_buku'];?></td>
        <td><?=$data['nim'];?></td>
        <td><?=$data['nama'];?></td>
        <td><?=$data['tgl_pinjam'];?></td>
        <td><?=$data['tgl_kembali'];?></td>
        <td class="text-center text-danger">
        	
			<?php  
			$denda = 1000;
			$tanggal_dateline = $data['tgl_kembali'];
			$tanggal_kembali = date('Y-m-d');

			$lambat = terlambat($tanggal_dateline, $tanggal_kembali);
			$bayar_denda = $lambat * $denda;

			if($lambat > 0){
				echo $lambat . " hari, <br>Denda Rp." . $bayar_denda;
			}
			else{

			}
			?>

        </td>
        <td class="text-center"><?=$data['status'];?></td>
        <td class="text-center">
          <a class="btn btn-outline-info btn-sm" href="?page=transaksi&aksi=kembali&id=<?=$data['id_transaksi'];?>&buku=<?=$data['id_buku'];?>" role="button">Kembali</a>
          <a class="btn btn-outline-danger btn-sm" href="?page=transaksi&aksi=perpanjang&id=<?=$data['id_transaksi'];?>&buku=<?=$data['id_buku'];?>&lambat=<?=$lambat;?>&kembali=<?=$data['tgl_kembali'];?>" role="button" onclick="return confirm('Apakah anda yakin untuk memperpanjang peminjaman buku  ?')">Perpanjang</a>
        </td>
      </tr>
      <?php  
        endwhile;
      endif;
      ?>
    </tbody>
  </table>
</div>