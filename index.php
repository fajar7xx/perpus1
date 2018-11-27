<?php  
require_once 'config/config.php';
require_once 'libs/vendor/autoload.php';
include 'config/function.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/icon/home.png">
    
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    <!-- datatables -->
    <link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.bootstrap4.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="bower_components/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Sistem Perpustakaan</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="btn btn-danger" href="#">Logout</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <i class="fa fa-tachometer-alt"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=anggota">
                  <i class="fa fa-users"></i>
                  Anggota
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=buku">
                  <i class="fa fa-database"></i>
                  Buku
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=transaksi">
                  <i class="fa fa-clipboard"></i>
                  Transaksi
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
         
          <div class="row">
            <div class="col-md-12">
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->

            <?php  
            $page = @$_GET['page'];
            $aksi = @$_GET['aksi'];

            if($page == "buku"){
              if($aksi == ""){
                include "page/buku/buku.php";
              }
              elseif($aksi == "tambah"){
                include "page/buku/tambah.php";
              }
              elseif($aksi == "ubah"){
                include "page/buku/edit.php";
              }
              elseif($aksi == "hapus"){
                include "page/buku/hapus.php";
              }
            }
            elseif($page == "anggota"){
              if($aksi == ""){
                include "page/anggota/anggota.php";
              }
              elseif($aksi == "tambah"){
                include "page/anggota/tambah.php";
              }
              elseif($aksi == "ubah"){
                include "page/anggota/edit.php";
              }
              elseif($aksi == "hapus"){
                include "page/anggota/hapus.php";
              }
            }
            elseif($page == "transaksi"){
              if($aksi == ""){
                include "page/transaksi/transaksi.php";
              }
              elseif($aksi == "tambah"){
                include "page/transaksi/tambah.php";
              }
              elseif($aksi == "kembali"){
                include "page/transaksi/kembali.php";
              }
              elseif($aksi == "hapus"){
                include "page/transaksi/hapus.php";
              }
            }
            ?>

            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bower_components/popperjs/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Icons -->
    <script src="assets/font/node_modules/feather-icons/dist/feather.min.js"></script>
    <script>
    feather.replace()
    </script>
 
    <!-- databels -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#buku').DataTable({
          "ordering" : false
        });
      });
    </script>
  </body>
</html>