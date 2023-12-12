<?php 
  include "header.php";
  include "controller/data_produk.php";
 
$id = $_GET['id_kategori'];

  
?> 

        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Kategori</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Kategori</h5>
                 <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Elektronik</strong></div>
                <?php   
                  $query = mysqli_query($koneksi, "SELECT * FROM kategori order by id_kategori ASC");
                  while($data = mysqli_fetch_array($query)) { ?>
                
               
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <li class="mb-2"><a class="reset-anchor" href="kategori.php?id_kategori=<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></a></li>
                </ul>
               <?php } ?>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-small text-muted mb-0">Halaman <?= $halaman; ?> dari <?= $total_halaman; ?></p>
                  </div>
                  
                </div>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php   
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='$id' order by id_produk ASC");
                    $query = mysqli_num_rows($sql);

                    if($sql > 0){
                      while($data = mysqli_fetch_array($query)){
                   
                  ?>
                  <div class="col-lg-4 col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <div class="badge text-white badge-"></div><a class="d-block" href="detail_produk.php?id_produk=<?php echo $data['id_produk'] ?>"><img class="img-fluid w-100" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="Foto Produk"></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="detail_produk.php?id_produk=<?php echo $data['id_produk'] ?>"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li>
                            
                          </ul>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail_produk.php?id_produk=<?php echo $data['id_produk'] ?>"><?php echo $data['nama_produk'] ?></a></h6>
                      <p class="small text-muted">Rp. <?php echo number_format($data['harga'],0, ',', '.');?></p>
                    </div>
                  </div>
                  <?php
                  }
                  } else {
                  echo '<div class="alert alert-warning" role="alert">
                        Data tidak ditemukan!.
                        </div>';
                  }
                  ?>
            
                </div>
                <!-- PAGINATION-->
                
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">

                    <?php 
                  $batas = isset($_GET['perpage']) ?  (int) $_GET['perpage'] : 10;;
                  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                  $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                  $previous = $halaman - 1;
                  $next = $halaman + 1;

                  $data = mysqli_query($koneksi, "SELECT * from produk");
                  $jumlah_data = mysqli_num_rows($data);
                  $total_halaman = ceil($jumlah_data / $batas);

                  $query_all_produk = mysqli_query($koneksi,"SELECT * FROM produk limit $halaman_awal, $batas");

                  $produk = array();
                  while ($data = mysqli_fetch_array($query_all_produk))
                  $produk[] = $data;
                  $nomor = $halaman_awal + 1;
                ?>

                    <li class="page-item"><a class="page-link" <?php if ($halaman > 1) { echo "href='?halaman=$previous'"; } ?> aria-label="Previous"><span aria-hidden="true">«</span></a></li>

                    <?php for ($i=1; $i <=$total_halaman ; $i++) { ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    
                    <li class="page-item"><a class="page-link" <?php if ($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> aria-label="Next"><span aria-hidden="true">»</span></a></li>
                  
                  </ul>
                </nav>

              </div>
            </div>
          </div>
        </section>
      
<!-- footer -->
<?php 
include "footer.php";

?>