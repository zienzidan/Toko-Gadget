<?php 
	include "inc/header.php";
	

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
    echo "<script>alert('Masukkan data User.');window.location='profile.php';</script>";
}

?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">User</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Profile</div>
								</div>
								<div class="card-body">
									<form method="POST" action="profile_update.php" enctype="multipart/form-data">

									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user'] ?>">
										<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $data['nama'] ?>" required oninvalid="this.setCustomValidity('Nama belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data['username'] ?>" required oninvalid="this.setCustomValidity('Username belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $data['email'] ?>" required oninvalid="this.setCustomValidity('Email belum diisi')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label for="">Foto Sebelumnya</label>
										<img src="<?php echo 'upload/user/'. $data['foto'] ?>" alt="Foto Sebelumnya" width="100px">
									</div>

								
									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control" name="foto" placeholder="Foto">
										<input type="hidden" name="lama" value="<?php echo $data['foto'] ?>">
									</div>
									
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Simpan</button>
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