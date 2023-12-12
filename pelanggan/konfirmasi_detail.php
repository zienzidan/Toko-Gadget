<?php
include 'header.php';
$id= isset($_REQUEST['id']) ? $_REQUEST['id'] :'' ;
?>




<div class="container">
	 <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>

         <section class="py-5">
          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Detail Penerima</h2>
          <div class="row">
            <div class="col-lg-8">
              <form action="#" method="post">
              	<?php
                $query = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan,pelanggan.nm_pelanggan,pelanggan.alamat,pelanggan.hp,pelanggan.email,pelanggan.id_ongkir,ongkir.id_ongkir,ongkir.kota,ongkir.ongkir FROM pelanggan join ongkir on pelanggan.id_ongkir=ongkir.id_ongkir where id_pelanggan='$_SESSION[id_pelanggan]'");
                while($data = mysqli_fetch_array($query)){?>
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">Nama Penerima</label>
                    <input class="form-control form-control-lg" type="text" name="nama" value="<?php echo $data['nm_pelanggan'];?>" readonly>
                  </div>
                 
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">Nomor Hp</label>
                    <input class="form-control form-control-lg" type="text" name="hp" value="<?php echo $data['hp'];?>" readonly>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" value="<?php echo $data['email'];?>" readonly>
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">Kota</label>
                    <input class="form-control form-control-lg" type="text" name="kota" value="<?php echo $data['kota'];?>" readonly>
                  </div>
                 
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase">Alamat</label>
                    <textarea class="form-control form-control-lg" name="message" id="message" rows="1" placeholder="Order Notes" readonly><?php echo $data['alamat'];?></textarea>
                  </div>
                 
                 
                </div>
              </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                	<form action="#" method="POST">
                  <h5 class="text-uppercase mb-4">Detail Pesanan</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Produk <span>Total</span> </strong></li>
                    <li class="border-bottom my-2"></li>
                    <?php
                
                    $data3 = mysqli_query($koneksi,"SELECT * FROM invoice where id_invoice ='$id'");
                    while($d3 = mysqli_fetch_array($data3)){ ?>

                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Nomor Pesanan : </strong> <span class="text-muted small"><?php echo $d3['no_invoice'];?></span></li>

                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Total Produk</strong></li>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM transaksi where id_invoice ='$id'");
                    while($data = mysqli_fetch_array($query)){ 
                    $query2 = mysqli_query($koneksi,"SELECT * FROM produk where id_produk ='$data[id_produk]'");
                    while($data2 = mysqli_fetch_array($query2)){?>
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold"><?php echo $data2['nama_produk'];?></strong> <span class="text-muted small">x <?php echo $data['qty'];?></span> 
                    	<span class="text-muted small">Rp. <?php echo number_format($data['total'],0,'','.');?> ,-</span></li>
                  
                    <?php } } }?>

                   
                    <li class="border-bottom my-2"></li>
                  </ul>

                  <ul class="list-unstyled mb-0">
                  	<?php
                    $data3 = mysqli_query($koneksi,"SELECT * FROM invoice where id_invoice ='$id'");
                    while($d3 = mysqli_fetch_array($data3)){ ?>
                     <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Sub Total : </strong> <span class="text-muted small">Rp. <?php echo number_format($d3['sub_total'],0,'','.');?> ,-</span></li>
                      <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Ongkir : </strong> <span class="text-muted small">Rp. <?php echo number_format($d3['ongkir'],0,'','.');?> ,-</span></li>
                       <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Total Bayar : </strong> <span class="text-muted small">Rp. <?php echo number_format($d3['bayar'],0,'','.');?> ,-</span></li>

                   <?php } ?>

                   <li class="border-bottom my-3"></li>
                  </ul>

                  
                  </form>

                  <form action="konfirmasi_proses.php" method="POST" enctype="multipart/form-data">
                  <h5 class="text-uppercase mb-4">Metode Pembayaran</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Lakukan pembayaran dengan transfer ke salah satu nomor rekening di bawah ini : </strong></li>
                    <li class="border-bottom my-2"></li>
                  </ul>

                  <ul class="list-unstyled mb-0">
                  	<?php
                    $data = mysqli_query($koneksi,"SELECT * FROM bank");
                    while($d = mysqli_fetch_array($data)){ ?>
                     <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Nama Bank : </strong> <span class="text-muted small"><?php echo $d['nama_bank'];?></span></li>
                      <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">No. Rekening : </strong> <span class="text-muted small"><?php echo $d['rekening'];?></span></li>
                       <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Atas Nama : </strong> <span class="text-muted small"><?php echo $d['pemilik'];?></span></li>

                   <?php } ?>
                   <li class="border-bottom my-3"></li>
                  </ul>
                  <h5 class="text-uppercase mb-4">Bukti Pembayaran</h5>
                  	<div class="form-group">
                    <input type="file" class="form-control-file" name="file" id="file" required>
                    <small class="text-muted"><i>Upload bukti pembayaran (wajib)</i></small>
                  </div>
                  <hr>
                  <input type="hidden" name="id_invoice" value="<?php echo $id;?>"> 
                  <div class="text-center">
                    <input type="submit" class="btn btn-dark" value="Konfirmasi Pesanan" name="upload">
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="konfirmasi_batal.php?id=<?php echo $id;?>" class="btn btn-danger delete-link">Batalkan Pesanan</a>
                  </div>
                  
                  </form>
               
                </div>
              </div>

              
                	
            </div>


          

          </div>
        </section>
</div>



<?php }
include 'footer.php';

?>

