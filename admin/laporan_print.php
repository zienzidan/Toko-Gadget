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
	<?php include '../koneksi.php'; ?>
</head>
<body>

	
 	<style type="text/css">
 		.table-tanggal tr th, .table-tanggal tr td{
 			padding: 5px;
 		}
 	</style>
 	<center>
 		<h4>LAPORAN PENJUALAN</h4>
 		<h4>GADGETIN.ID</h4>
 	</center>


 	<?php 
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		?>

 		<div class="row">
 			<div class="col-lg-4">
 				<table class="table-tanggal">
 					<tr>
 						<th width="30%">DARI TANGGAL</th>
 						<th width="1%">:</th>
 						<td><?php echo $tgl_dari; ?></td>
 					</tr>
 					<tr>
 						<th>SAMPAI TANGGAL</th>
 						<th>:</th>
 						<td><?php echo $tgl_sampai; ?></td>
 					</tr>
 				</table>
 			</div>
 		</div>

 		<br>
 		

 		<table class="table table-bordered table-striped" id="table-datatable">
 			<thead>
 				<tr>
 				  <th width="1%">NO</th>
		          <th width="10%" class="text-center">NO.PESANAN</th>
		          <th class="text-center">TANGGAL</th>
		          <th class="text-center">NAMA PELANGGAN</th>
		          <th class="text-center">SUB TOTAL</th>
		          <th class="text-center">ONGKIR</th>
		          <th class="text-center">TOTAL BAYAR</th>
        		</tr>  
 			</thead>
 			<tbody>
 				<?php
                  $x_total_sub_total = 0;
                  $x_total_total = 0;
                  $x_total_ongkir = 0;
                  $query = mysqli_query($koneksi,"SELECT invoice.id_invoice,invoice.no_invoice,invoice.tgl_invoice,invoice.id_pelanggan,invoice.sub_total,invoice.ongkir,invoice.bayar,invoice.status,pelanggan.nm_pelanggan from invoice join pelanggan on invoice.id_pelanggan=pelanggan.id_pelanggan where status='Produk Dikirim' and date(tgl_invoice) >= '$tgl_dari' and date(tgl_invoice) <= '$tgl_sampai'order by id_invoice ASC");
                  if(mysqli_num_rows($query)>0){?>
                    <?php $no=1;
                    while ($data = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $data['no_invoice'];?></td>
                        <td class="text-center"><?php echo $data['tgl_invoice'];?></td>
                        <td class="text-center"><?php echo $data['nm_pelanggan'];?></td>
                        <td class="text-center">Rp. <?php echo number_format($data['sub_total'],0,'','.');?> ,-</td>
                        <td class="text-center">Rp. <?php echo number_format($data['ongkir'],0,'','.');?> ,-</td>
                        <td class="text-center">Rp. <?php echo number_format($data['bayar'],0,'','.');?> ,-</td>
                      </tr>
                      <?php 
                      $x_total_sub_total += $data['sub_total'];
                      $x_total_ongkir += $data['ongkir'];
                      $x_total_total += $data['bayar'];
                      } }?>
                </tbody>
                <tfoot>
                    <tr class="bg-secondary">
                      <td colspan="4" class="text-right"><b>TOTAL</b></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_sub_total).",-"; ?></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_ongkir).",-"; ?></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_total).",-"; ?></td>
    
                    </tr>
                  </tfoot>
              </table>


 		<?php 
 	}else{
 		?>

 		<div class="alert alert-info text-center">
 			Silahkan Filter Laporan Terlebih Dulu.
 		</div>

 		<?php
 	}
 	?>


 	<script>
 		window.print();
 		$(document).ready(function(){

 		});
 	</script>
 </body>

 </html>
	