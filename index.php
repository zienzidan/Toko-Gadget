<?php 
 
  include "header.php";
  
?>

 
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(assets/img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">Inspirari terbaru di tahun <?php echo date('Y') ?></p>
                <h1 class="h2 text-uppercase mb-3">Diskon 20% untuk musim baru</h1><a class="btn btn-dark" href="register.php">Register</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Koleksi yang dibuat dengan hati-hati</p>
            <h2 class="h5 text-uppercase mb-4">Telusuri Kategori Kami</h2>
          </header>
          <div class="row">
            <?php 
              $sql = "SELECT * FROM kategori INNER JOIN produk ON kategori.id_kategori=produk.id_produk";
                $query = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_array($query)){
            ?>
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="kategori.php?id_kategori=<?php echo $data['id_kategori'] ?>"><img class="img-fluid" src="<?php echo 'admin/upload/produk/'. $data['foto'] ?>" alt=""><strong class="category-item-title"><?php echo $data['nama_kategori'] ?></strong></a></div>
            <?php } ?>              
          </div>
        </section>

        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Dibuat dengan cara yang sulit</p>
            <h2 class="h5 text-uppercase mb-4">Produk terbaruk kami</h2>
          </header>
          <div class="row">
            <!-- PRODUCT-->
            <?php 
                $sql = "SELECT * FROM kategori INNER JOIN produk ON kategori.id_kategori=produk.id_produk";
                $query = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-xl-3 col-lg-4 col-sm-6">
              
              <div class="product text-center">
                <div class="position-relative mb-3">
                  <div class="badge text-white badge-"></div><a class="d-block" href="detail_produk.php?id_produk=<?php echo $data['id_produk'] ?>"><img class="img-fluid w-100" src="<?php echo 'admin/upload/produk/'. $data['foto'] ?>" alt="Foto Produk"></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="produk.php"><i class="fa fa-search"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="produk.php"><?php echo $data['nama_produk'] ?></a></h6>
                <p class="small text-muted">Rp. <?php echo number_format($data['harga'],0, ',', '.');?></p>
              </div>
            
            </div>
              <?php } ?>
      
          </div>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="media align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="media-body text-left ml-3">
                      <h6 class="text-uppercase mb-1">Festival offer</h6>
                      <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <div class="col-lg-6 mb-3 mb-lg-0">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group flex-column flex-sm-row mb-3">
                    <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
     <!-- Footer -->
<?php 
  include "footer.php";
?>