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
<body style="padding: 10px;">

	<center>
		<h4>STRUK PEMBELIAN</h4>
	</center>
	<br>

	<?php
		if ($_GET['id']) {
		?>
 		<?php
			include "../koneksi.php";
			$id = $_GET['id'];
			$invoice = mysqli_query($koneksi, "SELECT invoice.id_invoice,invoice.tgl_invoice,invoice.no_invoice,invoice.ongkir,invoice.sub_total,invoice.bayar,pelanggan.nm_pelanggan,invoice.status FROM invoice join pelanggan ON invoice.id_pelanggan=pelanggan.id_pelanggan where id_invoice='$id'");
			while ($d = mysqli_fetch_array($invoice)) {
			?>
		<div class="row">
 				<div class="col-lg-4">
 					<table class="table">
 						<tr>
 							<th>No. Pesanan</th>
 							<th>:</th>
 							<td><?php echo $d['no_invoice']; ?></td>
 						</tr>
 						<tr>
 							<th>Tanggal Pesanan</th>
 							<th>:</th>
 							<td><?php echo date('d-m-Y', strtotime($d['tgl_invoice'])); ?></td>
 						</tr>
 						<tr>
 							<th>Nama Pelanggan</th>
 							<th>:</th>
 							<td><?php echo $d['nm_pelanggan']; ?></td>
 						</tr>
 						<tr>
 							<th>Status</th>
 							<th>:</th>
 							<td><?php echo $d['status']; ?></td>
 						</tr>
 					</table>
 				</div>
 			</div>
 			<hr>

 		<h5><b>Daftar Pembelian</b></h5>
 			<table class="table table-bordered table-striped table-hover" id="table-pembelian">
 				<thead>
 					<tr>
 						<th width="1%">Nama Produk</th>
 						<th width="1%" style="text-align: center;">Harga</th>
 						<th width="1%" style="text-align: center;">Jumlah</th>
 						<th width="1%" style="text-align: center;">Total</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
						$id_invoice = $d['id_invoice'];
						$ppata = mysqli_query($koneksi, "SELECT produk.nama_produk,produk.harga,transaksi.qty,transaksi.total,transaksi.id_invoice FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk where id_invoice='$id_invoice'");
						while ($pp = mysqli_fetch_array($ppata)) {
						?>
 						<tr>
 							<td>
 								<?php echo $pp['nama_produk']; ?>
 								
 							</td>
 							<td style="text-align: center;"><?php echo "Rp." . number_format($pp['harga']) . ",-"; ?></td>
 							<td style="text-align: center;"><?php echo $pp['qty']; ?></td>
 							<td style="text-align: center;"><?php echo "Rp." . number_format($pp['total']) . ",-"; ?></td>
 						</tr>
 					<?php
						}
						?>
 				</tbody>
 			</table>


 			<div class="row">
 				<div class="col-lg-6">
 					<table class="table table-bordered table-striped">
 						<tr>
 							<th width="30%">Sub Total</th>
 							<td>
 								<span class="sub_total_pembelian"><?php echo "Rp." . number_format($d['sub_total']) . ",-"; ?></span>
 							</td>
 						</tr>
 						<tr>
 							<th>Ongkir</th>
 							<td>
 								<?php echo "Rp." . number_format($d['ongkir']) . ",-"; ?></span>
 							</td>
 						</tr>
 						<tr>
 							<th>Total</th>
 							<td>
 								<span class="total_pembelian"><?php echo "Rp." . number_format($d['bayar']) . ",-"; ?></span>
 							</td>
 						</tr>
 					</table>
 				</div>
 			</div>

 		<?php
			}
			?>
 	<?php
		} else {
		?>

 		<div class="alert alert-info text-center">
 			Silahkan Filter Laporan Terlebih Dulu.
 		</div>

 	<?php
		}
		?>


 	<script>
 		window.print();
 		$(document).ready(function() {

 		});
 	</script>

 </body>

 </html>
	