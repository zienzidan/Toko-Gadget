<?php 
  
  //menyertakan file program koneksi.php pada register
  include "header.php";
//inisialisasi session
        // mengecek apakah di url ada nilai get id
if (isset($_GET['id_pelanggan'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_user
    $id = ($_GET["id_pelanggan"]);

    // menampilkan data dari database yang mempunyai id_user=$id
    $query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id'";
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
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='profile.php';</script>";
    }
} else {
    // apabila tidak ada data GET id_user pada akan di redirect ke user.php
    echo "<script>alert('Masukkan data Profile.');window.location='profile.php';</script>";
}
?>



  <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Ganti Password</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
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
          <div class="card card-header bg-dark text-white">Ganti Password</div>
          <div class="card-body shadow">
           
              <div class="card-body">
                  
                <form action="pass_update.php" method="post">
                  <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'];?>">
                <div class="form-group">
                    <label>Password Lama :</label>
                    <input type="password"  name="lama" class="form-control" placeholder="Password lama" required oninvalid="this.setCustomValidity('Password lama belum diisi')" oninput="setCustomValidity('')">
                </div>
              <div class="form-group">
                  <label>Password Baru :</label>
                  <input type="password" name="baru" class="form-control" placeholder="Password baru" required oninvalid="this.setCustomValidity('Password baru belum diisi')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <label>Ulangi Password Baru :</label>
                <input type="password" name="ulang" class="form-control" name="nama" placeholder="Password baru" required oninvalid="this.setCustomValidity('Password baru belum diisi')" oninput="setCustomValidity('')">
              </div>

                  <button class="btn btn-primary" type="submit">Update</button>
                  </form>
             
                  <!-- /.card-body -->
              
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