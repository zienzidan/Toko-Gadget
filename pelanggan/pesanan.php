<?php
 
  include "header.php";
  
?>
<!-- Header -->

<!-- HERO SECTION-->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
      <div class="col-lg-6">
        <h1 class="h2 text-uppercase mb-0">Pesanan</h1>
      </div>
      <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
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
              <table class="table table-hover table-bordered" id="table-pembelian">
                <thead>
                  <tr>
                    <th style="text-align: center;"><h5>No</h5></th>
                    <th style="text-align: center;"><h5>Nomor Pesanan</th></h5>
                    <th style="text-align: center;"><h5>Tanggal Pesan</th></h5>
                    <th style="text-align: center;"><h5>Sub Total</th></h5>
                    <th style="text-align: center;"><h5>Ongkir</th></h5>
                    <th style="text-align: center;"><h5>Total Pembayaran</th></h5>
                    <th style="text-align: center;"><h5>Status</th></h5>
                    <th style="text-align: center;"><h5>Opsi</th></h5>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                     $query = mysqli_query($koneksi,"SELECT * FROM invoice where id_pelanggan ='$_SESSION[id_pelanggan]' order by id_invoice ASC");
                    while($data = mysqli_fetch_array($query)){?>
                      <td style="text-align: center;"><?php echo $no;?></td>
                      <td style="text-align: center;"><?php echo $data['no_invoice'];?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_invoice'];?></td>
                      <td style="text-align: center;">Rp. <?php echo number_format($data['sub_total'],0,'','.');?> ,-</td>
                      <td style="text-align: center;">Rp. <?php echo number_format($data['ongkir'],0,'','.');?> ,-</td>
                      <td style="text-align: center;">Rp. <?php echo number_format($data['bayar'],0,'','.');?> ,-</td>
                      <td style="text-align: center;"><?php echo $data['status'];?></td>
                      <td style="text-align: center;">
                        <a href="pesanan_detail.php?id=<?php echo $data['id_invoice'];?>" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                       
                      </td>
                </tbody>
                <?php
                    $no++;
                    }?>
                    <tfoot>
                      <tr>
                      <td style="text-align: right;" colspan="9">             
                        <a class="btn btn-dark btn-sm" href="produk.php">Lanjutkan Belanja</a>
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













<!-- footer -->
<?php 
  include "footer.php";
?>