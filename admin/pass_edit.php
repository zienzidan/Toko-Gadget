<?php 
	session_start();
	include "inc/header.php";
	include "../koneksi.php";


	if ($_SESSION['statuslogin'] != true) {
      echo '<script>window.location="login.php"</script>';
  }

  		// mengecek apakah di url ada nilai get id
if (isset($_GET['id_user'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_user
    $id = ($_GET["id_user"]);

    // menampilkan data dari database yang mempunyai id_user=$id
    $query = "SELECT * FROM user WHERE id_user='$id'";
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


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Ganti Password</div>
								</div>
								<div class="card-body">
									<form method="POST" action="pass_update.php">

									<div class="form-group">
										<label>Password Lama :</label>
										<input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user'] ?>">
										<input type="password" class="form-control" name="lama" placeholder="Password Lama" required oninvalid="this.setCustomValidity('Password lama belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Password Baru :</label>
										<input type="password" class="form-control" name="baru" placeholder="Password Baru" required oninvalid="this.setCustomValidity('Password baru belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Ulangi Password Baru :</label>
										<input type="password" class="form-control" name="ulang" name="nama" placeholder="Ulangi Password Baru" required oninvalid="this.setCustomValidity('Ulangi Password belum diisi')" oninput="setCustomValidity('')">
									</div>
								
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="profile.php" class="btn btn-info">Kembali</a>
								</div>
							</form>

							</div>
						</div>

					</div>
				
				</div>

			</div>
			
		</div>
		
	
	</div>








<?php 
	include "inc/footer.php";	
?>