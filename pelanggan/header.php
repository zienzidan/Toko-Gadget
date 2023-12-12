<?php
 session_start();
  include "koneksi.php";
 
  if ($_SESSION['status'] != 'login') {
  header("location:../login.php?pesan=gagal");
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gadgetin | Olshop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="../assets/vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="../assets/vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="../assets/vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="font-weight-bold text-uppercase text-dark">Gadgetin.id</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="index.php">Home</a>
                </li>
               
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="produk.php">Produk</a>
                </li>

                 <?php
              $data = mysqli_query($koneksi, "SELECT * FROM invoice where id_pelanggan='$_SESSION[id_pelanggan]' and status='Menunggu Pembayaran'");
              $count = mysqli_num_rows($data);
              ?>
                  <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="konfirmasi.php">Konfirmasi&nbsp;<span class="badge badge-danger badge-pill"></span><?php if ($count == 0) {  ?></a>
                </li>







              

                 <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="pesanan.php">Pesanan</a>
                </li>
                   <?php } ?>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Support</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="cara_belanja.php">Cara Belanja</a><a class="dropdown-item border-0 transition-link" href="terms_condition.php">Term & Condition</a>
                </li>
                
              </ul>
              
              <ul class="navbar-nav ml-auto">
               <?php
              $query = mysqli_query($koneksi, "SELECT * FROM checkout where id_pelanggan = '$_SESSION[id_pelanggan]'");
              $count = mysqli_num_rows($query);
              ?>               
                <li class="nav-item"><a class="nav-link" href="keranjang.php"> <i class="fas fa-shopping-cart mr-1 text-gray"></i><small class="text-gray"><?php echo $count; ?></small></a></li>



                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['nm_pelanggan'] ?></a>
                   <?php
                $data = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan,pelanggan.nm_pelanggan,pelanggan.id_ongkir,pelanggan.hp,pelanggan.email,pelanggan.alamat,ongkir.kota FROM pelanggan join ongkir on pelanggan.id_ongkir=ongkir.id_ongkir where id_pelanggan='$_SESSION[id_pelanggan]'");
                while($d = mysqli_fetch_array($data)){?>
           
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="profile.php">Edit Profile</a>
                    <a class="dropdown-item border-0 transition-link" href="ganti_password.php?id_pelanggan=<?php echo $d['id_pelanggan'] ?>">Ganti Password</a>
                    <a class="dropdown-item border-0 transition-link" href="logout.php"  onclick="return confirm('Yakin anda ingin keluar dari halaman ini?')">Logout</a>

                     <?php }  ?>
                </li>

                </li>
              </ul>
             
            </div>
          </nav>
        </div>
      </header>
    