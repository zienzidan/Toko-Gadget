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
                <h1 class="h2 text-uppercase mb-0">Edit Profile</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
          <div class="card card-header bg-dark text-white">Profile Pelanggan</div>
          <div class="card-body shadow">
           
              <div class="card-body">
                  
                  <form action="pelanggan_update.php" method="post">
                  <div class="form-group">
                      <label>Nama Pelanggan :</label>
                      <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'];?>">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" required oninvalid="this.setCustomValidity('Nama pelanggan belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['nm_pelanggan'];?>">
                  </div>
                  <div class="form-group">
                      <label>No. HP :</label>
                      <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="hp" id="hp" placeholder="Nomor HP" required oninvalid="this.setCustomValidity('Nomor HP belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['hp'];?>">
                  </div>
                  <div class="form-group">
                      <label>Email :</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email belum diisi')" oninput="setCustomValidity('')" value="<?php echo $data['email'];?>">
                  </div>
                  <div class="form-group">
                      <label>Nama Kota :</label>
                      <select name="kota" class="form-control" onchange="changeValue(this.value)" required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">
                          <option value="">-Pilih-</option>
                          <?php
                          $query2 = mysqli_query($koneksi, "SELECT * from ongkir order by kota asc");
                          while ($row = mysqli_fetch_array($query2)) {
                              if($data[id_ongkir]==$row[id_ongkir]){
                              echo "<option value=$row[id_ongkir] selected>$row[kota]</option>";
                          }else{
                              echo "<option value=$row[id_ongkir]>$row[kota]</option>";
                          } }?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Alamat :</label>
                      <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat belum diisi')" oninput="setCustomValidity('')"><?php echo $data['alamat'];?></textarea>
                  </div>
                  <input type="submit" class="btn btn-primary" name="upload" value="Simpan">
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