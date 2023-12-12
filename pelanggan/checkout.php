<?php 
include 'header.php';
$id_produk = $_POST['id_produk'];
$qty = $_POST['qty'];
$total = $_POST['total'];
$sub_total = $_POST['sub_total'];
$bayar = $_POST['bayar'];

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
                	<form action="checkout_proses.php" method="POST">
                  <h5 class="text-uppercase mb-4">Detail Pesanan</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Produk <span>Total</span> </strong></li>
                    <li class="border-bottom my-2"></li>
                    <?php
                    $jumlah_pembelian = count($id_produk);
                    for($a=0;$a<$jumlah_pembelian;$a++){
                      $t_produk = $id_produk[$a];
                      $t_qty = $qty[$a];
                      $t_total = $total[$a];
                      $query2 = mysqli_query($koneksi,"SELECT * from produk where id_produk = '$t_produk'");
                      while($data2 = mysqli_fetch_array($query2)){?>
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold"><?php echo $data2['nama_produk'];?></strong><span class="text-muted small">x <?php echo $t_qty;?></span><span class="text-muted small">Rp. <?php echo number_format($t_total,0,'','.');?> ,-</span></li>
                    <input type="hidden" name="id_produk[]" value="<?php echo $t_produk;?>">
                    <input type="hidden" name="qty[]" value="<?php echo $t_qty;?>">
                    <input type="hidden" name="total[]" value="<?php echo $t_total;?>">
                    <?php } }?>

                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Sub Total</strong><span class="text-muted small">Rp. <?php echo number_format($sub_total,0,'','.');?> ,-</span></li>

                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Ongkir</strong><span class="text-muted small">Rp. <?php echo number_format($data['ongkir'],0,'','.');?> ,-</span></li>

                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total Bayar</strong><span class="text-muted small">Rp. <?php echo number_format($bayar,0,'','.');?> ,-</span></li>

                    <input type="hidden" name="ongkir" value="<?php echo $data['ongkir'];?>">
                    <input type="hidden" name="sub_total" value="<?php echo $sub_total;?>">
                    <input type="hidden" name="bayar" value="<?php echo $bayar;?>">

                    <li class="border-bottom my-2"></li>
                  </ul>

                  <div class="text-center">
                    <input class="btn btn-dark btn-block" type="submit" value="Pesan Sekarang">
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