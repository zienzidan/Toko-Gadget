<?php
  include "header.php";
  $id= isset($_REQUEST['id']) ? $_REQUEST['id'] :'' ;
  
?>

<!-- Header -->

<!-- HERO SECTION-->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
      <div class="col-lg-6">
        <h1 class="h2 text-uppercase mb-0">Detail Pesanan</h1>
      </div>
      <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pesanan</li>
            </ol>
          </nav>
      </div>
    </div>
    </div>
</section><br><br>


<div class="container">
<section classp="py-5">
  
        <div class="row">
        <div class="col-md-12">
        <!-- CART TABLE-->
        <div class="table-responsive mb-4">
            <form action="checkout.php" method="POST">
            <div class="table-responsive">
              <table class="table table-hover" id="table-pembelian">
                <thead>
                  <tr>
                    <th style="text-align: center;"><h5>Foto Produk</h5></th>
                    <th style="text-align: center;"><h5>Nama Produk</th></h5>
                    <th style="text-align: center;"><h5>Harga</th></h5>
                    <th style="text-align: center;"><h5>Jumlah</th></h5>
                    <th style="text-align: center;"><h5>Total</th></h5>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                     $query = mysqli_query($koneksi,"SELECT * FROM transaksi where id_invoice ='$id'");
                    while($data = mysqli_fetch_array($query)){
                      $stok=mysqli_query($koneksi,"SELECT * FROM produk where id_produk ='$data[id_produk]'");
                    while($d3 = mysqli_fetch_array($stok)){ ?>
                      <td style="text-align: center;"><img src="../admin/upload/produk/<?php echo $d3['foto'];?>" width="80px" alt=""></td>
                      <td style="text-align: center;"><?php echo $d3['nama_produk'];?></td>
                      <td style="text-align: center;">Rp. <?php echo number_format($d3['harga'],0,'','.');?> ,-</td>
                      <td style="text-align: center;"><?php echo $data['qty'];?></td>
                      <td style="text-align: center;">Rp. <?php echo number_format($data['total'],0,'','.');?> ,-</td>
          
                    <input type="hidden" name="id_produk[]" value="<?php echo $data['id_produk'];?>">
                    <input type="hidden" name="qty[]" value="<?php echo $data['qty'];?>">
                    <input type="hidden" name="total[]" value="<?php echo $data['total'];?>">
                      </td>
                </tbody>
                <?php
                    $no++; }}?>
                    <tfoot>
                      <tr>
                    <td style="text-align: right;" colspan="4"><b><h5>Sub Total</h5></b></td>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT SUM(total) AS sub_total FROM transaksi where id_invoice='$id'");
                    $sum = mysqli_fetch_array($query);?>
                    <td style="text-align: center;" colspan="2"><b><span class="text-muted">Rp. <?php echo number_format($sum['sub_total'],0,'','.');?> ,-</span></b></td>
                    <input type="hidden" name="sub_total" value="<?php echo $sum['sub_total'];?>">
                  </tr>
                  <tr>
                    <td style="text-align: right;" colspan="4"><b><h5>Biaya Ongkir</h5></b></td>
                    <?php
                    $data2 = mysqli_query($koneksi,"SELECT *from invoice where id_invoice='$id'");
                    while($d2 = mysqli_fetch_array($data2)){?> 
                    <td style="text-align: center;" colspan="2"><b><span class="text-muted"><?php if($sum['sub_total']==0){
                      echo "Rp. 0";
                    }else echo "Rp. ".number_format($d2['ongkir'],0,'','.');?> ,-</span></b></td>
                    <input type="hidden" name="ongkir" value="<?php echo $d2['ongkir'];?>">                  
                  </tr>
                  <tr>
                    <td style="text-align: right;" colspan="4"><b><h5>Total Pembayaran</h5></b></td>
                    <?php
                    $total = $sum['sub_total'];
                    $ongkir = $d2['ongkir'];
                    $total_bayar = $total+$ongkir;
                    ?>
                    <td style="text-align: center;" colspan="2"><b><span class="text-muted"><?php if($sum['sub_total']==0){
                      echo "Rp. 0";
                    }else echo "Rp. ".number_format($total_bayar,0,'','.');?> ,-</span></b></td>
                    <input type="hidden" name="bayar" value="<?php echo $total_bayar;?>">                  
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="4"><b><h5>Status</h5></b></td>
                    <td style="text-align: center;" colspan="2"><b><span class="text-muted"><?php echo $d2['status'];?></span>
                </tr>
                <?php } ?>
                <tr>
                <td style="text-align: right;" colspan="8">             
                  <a class='btn btn-info' href='pesanan.php'>Kembali</a>
                </td>
              </tr>
                </tfoot>
              </table>
            </div>
             </th>
            </form>

         </div>
    </div>
</div>
</section>
</div>







<?php 
include 'footer.php';
?>