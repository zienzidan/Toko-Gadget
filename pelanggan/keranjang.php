<?php 
	include 'header.php';
?>


   <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Keranjang</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
              	<form action="checkout.php" method="POST">
                <table class="table table-hover">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Produk</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah</strong></th>
                      <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                      <th class="border-0" scope="col"><strong class="text-small text-uppercase">Opsi</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $no = 1; 
                  		$query=mysqli_query($koneksi,"SELECT * FROM checkout where id_pelanggan ='$_SESSION[id_pelanggan]'");
                  		while($data=mysqli_fetch_array($query)){ 
                      $stok=mysqli_query($koneksi,"SELECT * FROM produk where id_produk ='$data[id_produk]'");
                    while($ambil_data=mysqli_fetch_array($stok)){?> 
                  	
                    <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="../admin/upload/produk/<?php echo $ambil_data['foto'] ?>" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html"><?php echo $ambil_data['nama_produk'] ?></a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small"> Rp. <?php echo number_format($ambil_data['harga'],0, ',', '.');?></p>
                      </td>
                      <td class="align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family"><?php echo $data['qty'] ?></span>
                          
                        </div>
                      </td>
                      <td class="align-middle border-0">
                        <p class="mb-0 small">Rp. <?php echo number_format($data['total'],0, ',', '.');?></p>
                      </td>
                      <td class="align-middle border-0"><a class="btn btn-sm btn-danger delete-link" href="keranjang_hapus.php?id=<?php echo $data['id_produk'];?>" onclick="return confirm('Batalkan Pesanan ini?')">X</a></td>
                    </tr>
              
                  </tbody>
                  <input type="hidden" name="id_produk[]" value="<?php echo $data['id_produk'];?>">
                <input type="hidden" name="qty[]" value="<?php echo $data['qty'];?>">
                <input type="hidden" name="total[]" value="<?php echo $data['total'];?>">
                   <?php
                $no++;}}?>
                </table>
               
              </div>
              <!-- CART NAV-->
             <!--  <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="produk.php"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                </div>
              </div> -->
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <?php $query = mysqli_query($koneksi, "SELECT SUM(total) AS sub_total FROM checkout where id_pelanggan = '$_SESSION[id_pelanggan]'"); 
                  $sum = mysqli_fetch_array($query);
                  ?>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">Rp. <?php echo number_format($sum['sub_total'],0,'','.');?> ,-</span></li>
                    <input type="hidden" name="sub_total" value="<?php echo $sum['sub_total'] ?>">
                    <li class="border-bottom my-2"></li>


                    <?php
                    $data2=mysqli_query($koneksi,"SELECT ongkir.id_ongkir,ongkir.kota,ongkir.ongkir,pelanggan.id_pelanggan,pelanggan.id_ongkir,pelanggan.nm_pelanggan,pelanggan.alamat,pelanggan.hp from pelanggan JOIN ongkir ON pelanggan.id_ongkir=ongkir.id_ongkir where id_pelanggan='$_SESSION[id_pelanggan]'");
                    while($d2=mysqli_fetch_array($data2)){?> 


                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Biaya Ongkir</strong>

                      <span class="text-muted small"><?php if($sum['sub_total']==0){
                      echo "Rp. 0";
                      }else echo "Rp. ".number_format($d2['ongkir'],0,'','.');?> ,-</span></li>
                    
                    
                  <!--   <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold"></strong><span></span></li> -->

                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total Pembayaran</strong>

                       <?php
                    $total = $sum['sub_total'];
                    $ongkir = $d2['ongkir'];
                    $total_bayar = $total+$ongkir;
                    ?>

                      <span class="text-muted small"><?php if($sum['sub_total']==0){
                      echo "Rp. 0";
                    }else echo "Rp. ".number_format($total_bayar,0,'','.');?> ,-</span></li>
                     <input type="hidden" name="bayar" value="<?php echo $total_bayar;?>">

                    <li>
 
                        <div class="form-group mb-0">
                          <?php if ($total==0){
                            echo "<a class='btn btn-dark btn-sm btn-block' href='produk.php'> <i class='fas fa-shopping-cart mr-2'></i>Lanjutkan Belanja</a>";
                          }else{
                            echo "<a class='btn btn-dark btn-sm btn-block' href='produk.php'> <i class='fas fa-shopping-cart mr-2'></i>Lanjutkan Belanja</a>;
                              <input type='submit' class='btn btn-block btn-dark btn-sm' value='Checkout'>";
                          }}?>
                        </div>
                     
                    </li>
                  </ul>
                </div>
              </div>
            </div>
             </form>
          </div>
        </section>
      </div>




<?php 
	include "footer.php";


?>