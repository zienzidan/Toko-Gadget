<?php 
include "inc/header.php";


 ?>


<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <h4 class="page-title">Detail Penjualan</h4>
          <div class="row justify-content-center">
            
            <div class="col-md-8">
              <div class="card card-profile card-secondary">
                <?php 
               $query = mysqli_query($koneksi, "SELECT invoice.id_invoice,invoice.tgl_invoice,invoice.no_invoice,invoice.bayar,invoice.status,invoice.sub_total,invoice.ongkir,pelanggan.nm_pelanggan from invoice join pelanggan ON invoice.id_pelanggan=pelanggan.id_pelanggan order by id_invoice ASC ");
                if (mysqli_num_rows($query) > 0) { ?>
                <?php
                 while ($data = mysqli_fetch_array($query)) {
                 ?>           
                <div class="card-header" style="background-image: url('img/blogpost.jpg')">
                  <div class="profile-picture">
                    
                  </div>
                </div><br>
                <div class="card-body">
                  <div class="user-profile">
                    <div class="name">No. Pesanan : <b><span class="text-muted"><?php echo $data['no_invoice'] ?></span></b></div><hr>
                    
                    <div class="name">Tgl. Pesanan : <b><span class="text-muted"><?php echo date('d-m-Y', strtotime($data['tgl_invoice'])); ?></span></b></div><hr>
                    
                    <div class="name">Nama Pelanggan : <b><span class="text-muted"><?php echo $data['nm_pelanggan']; ?></span></b></div><hr>
                   
                    <div class="name">Status : <b><span class="text-muted"><?php echo $data['status'] ?></span></b></div>
                    
                  </div>
                </div>
                <br>
                <hr>

                <div class="container">
                	<h4 class="page-title">Daftar Pembelian</h4>
                </div>
                
                  <table class="table table-bordered table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>Nama Produk</th>
                                    <th width="1%" style="text-align: center;">Harga</th>
                                    <th width="1%" style="text-align: center;">Jumlah</th>
                                    <th width="1%" style="text-align: center;">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $id_invoice = $data['id_invoice'];
                                  $ppata = mysqli_query($koneksi,"SELECT produk.nama_produk,produk.harga,transaksi.qty,transaksi.total,transaksi.id_invoice FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk where id_invoice='$id_invoice'");
                                  while($pp = mysqli_fetch_array($ppata)){
                                    ?>
                                    <tr>
                                      <td>
                                        <?php echo $pp['nama_produk']; ?>
                                        
                                      </td>
                                      <td style="text-align: center;"><?php echo "Rp.".number_format($pp['harga']).",-"; ?></td>  
                                      <td style="text-align: center;"><?php echo $pp['qty']; ?></td>
                                      <td style="text-align: center;"><?php echo "Rp.".number_format($pp['total']).",-"; ?></td>  
                                    </tr>
                                    <?php 
                                  }
                                  ?>
                                </tbody>
                              </table>

                        <div class="row">
                                <div class="col-lg-12">
                                  <table class="table table-bordered table-striped">
                                    <tr>
                                      <th width="50%">Sub Total</th>
                                      <td>
                                        <span class="sub_total_pembelian"><?php echo "Rp.".number_format($data['sub_total']).",-"; ?></span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Biaya Ongkir</th>
                                      <td>
                                        <span class="ongkir"><?php echo "Rp.".number_format($data['ongkir']).",-"; ?></span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Total</th>
                                      <td>
                                        <span class="total_pembelian"><?php echo "Rp.".number_format($data['bayar']).",-"; ?></span>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>



                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



















 <?php 
 include "inc/footer.php";
  ?>