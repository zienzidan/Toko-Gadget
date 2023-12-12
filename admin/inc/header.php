<?php
	session_start(); 
	include "../koneksi.php";
 
   if ($_SESSION['statuslogin'] != true) {
      echo "<script>alert('Anda Belum Login, Silahkan Login dahulu');
      window.location='login.php'</script>";
  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin - Online Gadget</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>

	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<!-- Sweetalert -->
	<link rel="stylesheet" href="assets/sweetalert/sweetalert.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.html" class="logo">
					<h4 class="navbar-brand text-white">Online Gadget</h4>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<h3 class="text-white">
							<div class="date">
								<script type="text/javascript">
				       var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);	
									</script>
								</div>
						</h3>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<?php  
						$query = mysqli_query($koneksi, "SELECT * FROM user order by id_user ASC");
						while ($data =  mysqli_fetch_array($query)) { ?>
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo 'upload/user/'. $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['admin_global']->nama ?>
									<span class="user-level"><?php echo $_SESSION['admin_global']->email ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="profile.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									
									<li>
										<a href="logout.php">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					<?php } ?>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Master</h4>
						</li>
					
						<li class="nav-item">
							<a href="konfirmasi.php">
								<i class="fas fa-check-circle"></i>
								
							<p>
								<?php
			              $query = mysqli_query($koneksi, "SELECT * FROM invoice where status='Menunggu Konfirmasi'");
			              $count = mysqli_num_rows($query);
			              ?>
			              Konfirmasi Pesanan
			              <?php
			              if ($count == 0) {
			                echo "</p>";
			              } else {
			                echo "<span class='right badge badge-danger'>$count</span>
			              </p>";
			              } ?>

							</a>
						</li>


						<li class="nav-item">
							<a href="pesanan.php">
								<i class="fas fa-shopping-cart"></i>
								<p>Data Pesanan</p>
								
							</a>
						</li>

						<li class="nav-item">
							<a href="pembayaran.php">
								<i class="fas fa-file-alt"></i>
								<p>Data Pembayaran</p>
								
							</a>
						</li>



						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-list-ul"></i>
								<p>Kelola Toko</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<?php
					                $query = mysqli_query($koneksi, "SELECT *FROM pelanggan");
					                $count = mysqli_num_rows($query);
					                ?>
										<a href="pelanggan.php">
											<span class="sub-item">Pelanggan
												<span class="right badge badge-info"><?php echo $count; ?></span>
											</span>
										</a>
									</li>
									<li>
										<?php
					                $query = mysqli_query($koneksi, "SELECT *FROM produk");
					                $count = mysqli_num_rows($query);
					                ?>
										<a href="produk.php">
											<span class="sub-item">Produk
												<span class="right badge badge-info"><?php echo $count; ?></span>
											</span>
										</a>
									</li>
									<li>
										<?php
					                $query = mysqli_query($koneksi, "SELECT *FROM ongkir");
					                $count = mysqli_num_rows($query);
					                ?>
										<a href="ongkir.php">
											<span class="sub-item">Ongkir
												<span class="right badge badge-info"><?php echo $count; ?></span>
											</span>
										</a>
									</li>
									<li>

										<?php
					                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
					                $count = mysqli_num_rows($query);
					                ?>
										<a href="kategori.php">
											<span class="sub-item">Kategori
												<span class="right badge badge-info"><?php echo $count; ?></span>
											</span>
										</a>
									</li>
									<li>
										<?php
					                $query = mysqli_query($koneksi, "SELECT *FROM bank");
					                $count = mysqli_num_rows($query);
					                ?>
										<a href="bank.php">
											<span class="sub-item">Bank
												<span class="right badge badge-info"><?php echo $count; ?></span>
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

							<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-folder-open"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="cetak_pelanggan.php">
											<span class="sub-item">Pelanggan</span>
										</a>
									</li>
									<li>
										<a href="penjualan.php">
											<span class="sub-item">Penjualan</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>


					<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Setting</h4>
						</li>
						
						<li class="nav-item">
							<a href="social_media.php">
								<i class="fas fa-link"></i>
								<p>Social Media</p>					
							</a>
						</li>

						<li class="nav-item">
							<a href="page.php">
								<i class="fas fa-file"></i>
								<p>Page</p>					
							</a>
						</li>

						<li class="nav-item">
							<a href="logout.php" onclick="return confirm('Apakah anda ingin keluar dari halaman ini?')">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>					
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->