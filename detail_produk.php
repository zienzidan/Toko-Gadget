 <?php 
  include "header.php";
  include "controller/data_produk.php";

   // mengecek apakah di url ada nilai get id
if (isset($_GET['id_produk'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $no_admin
    $id = ($_GET["id_produk"]);

    // menampilkan data dari database yang mempunyai no_admin=$id
    $query = "SELECT * FROM kategori INNER JOIN produk ON kategori.id_kategori = produk.id_kategori WHERE id_produk='$id'";
    $result = mysqli_query($koneksi, $query);


    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apakah data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='produk.php';</script>";
    }
} else {
    // apabila tidak ada data GET no admin pada akan di redirect ke profile.php
    echo "<script>alert('Masukkan data id produk.');window.location='produk.php';</script>";
}

?> 

<!-- Header -->

 <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" data-lightbox="product" title="<?php echo $data['nama_produk'] ?>"><img class="img-fluid" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></a><a class="d-block" href="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></a><a class="d-block" href="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></a><a class="d-block" href="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="<?php echo 'admin/upload/produk/'.$data['foto'] ?>" alt="..."></a></div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
           
            <div class="col-lg-6">
              <!-- <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
              </ul> -->
              <h1><?php echo $data['nama_produk'] ?>
                <p></p>
              </h1>
              <p class="text-muted lead">Harga : Rp. <?php echo number_format($data['harga'],0, ',', '.');?></p>
              <p class="text-small mb-4"><?php echo $data['deskripsi'] ?></p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="text" value="1" name="qty" size="2" maxlength="12" min="1" max="<?php echo $data['jumlah_stok'];?>">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="pelanggan/index.php">Masukkan Keranjang</a></div>
              </div><br>


              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Stok :</strong><span class="ml-2 text-muted"><?php echo $data['jumlah_stok'] ?></span></li>
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Kategori :</strong><span class="ml-2 text-muted"><?php echo $data['nama_kategori'] ?></span></li>
                
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi</a></li>
          
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Deskripsi Produk </h6>
                <p class="text-muted text-small mb-0"><?php echo $data['deskripsi'] ?></p>
              </div>
            </div>
           
          </div>
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Produk-produk terkait</h2>

          <div class="row">
            <!-- PRODUCT-->
            <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM produk order by id_produk DESC");
             while($row = mysqli_fetch_array($query)){
            ?>
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="produk.php"><img class="img-fluid w-100" src="<?php echo 'admin/upload/produk/'. $row['foto'] ?>" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="produk.php">Produk Lain</a></li>
                      
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="detail.html"><?php echo $row['nama_produk']; ?></a></h6>
                <p class="small text-muted">Rp. <?php echo number_format($row['harga'],0, ',', '.');?></p>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </section>

<!-- footer -->
<?php 
  include "footer.php";

?>