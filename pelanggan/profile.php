<?php 
  
  //menyertakan file program koneksi.php pada register
  include "header.php";
//inisialisasi session

?>



  <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Profile</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>

<section class="py-5">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline">
          <div class="card card-header">Profile Pelanggan</div>
          <div class="card-body shadow">
            <?php
                $data = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan,pelanggan.nm_pelanggan,pelanggan.id_ongkir,pelanggan.hp,pelanggan.email,pelanggan.alamat,ongkir.kota FROM pelanggan join ongkir on pelanggan.id_ongkir=ongkir.id_ongkir where id_pelanggan='$_SESSION[id_pelanggan]'");
                while($d = mysqli_fetch_array($data)){?>
           
              <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <strong>Nama Lengkap :</strong>
                      <p class="text-muted"><?php echo $d['nm_pelanggan'];?></p>
                      <hr>
                      <strong>Kota :</strong>
                      <p class="text-muted"><?php echo $d['kota'];?></p>
                      <hr>
                      <strong>Alamat :</strong>
                      <p class="text-muted"><?php echo $d['alamat'];?></p>
                      <hr>
                      <strong>Nomor HP :</strong>
                      <p class="text-muted"><?php echo $d['hp'];?></p>
                      <hr>
                      <strong>Alamat Email :</strong>
                      <p class="text-muted"><?php echo $d['email'];?></p>
                      <hr>
                    </div>
                  </div>

                  <!-- /.card-body -->
                <a href="edit_profile.php?id_pelanggan=<?php echo $d['id_pelanggan'] ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                <a href="ganti_password.php?id_pelanggan=<?php echo $d['id_pelanggan'] ?>" class="btn btn-danger btn-block"><b>Ganti Password</b></a>
                <?php }  ?>
                </div>
           
           </div>
          
        </div>

        </div>
        
    </div>
       
  </div>
 
</section>
 
 <!-- footer -->
<?php
include 'footer.php';

?>