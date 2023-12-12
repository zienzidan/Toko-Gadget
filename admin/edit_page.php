<!-- Header -->
<?php 
	
	include "inc/header.php";
	

	// mengecek apakah di url ada nilai get id
if (isset($_GET['id_page'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_metode
    $id = ($_GET["id_page"]);

    // menampilkan data dari database yang mempunyai id_metode=$id
    $query = "SELECT * FROM page WHERE id_page='$id'";
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
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='page.php';</script>";
    }
} else {
    // apabila tidak ada data GET no admin pada akan di redirect ke profile.php
    echo "<script>alert('Masukkan data Page.');window.location='page.php';</script>";
}

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Page</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Page</div>
								</div>
								<div class="card-body">
									<form method="POST" action="update_page.php" enctype="multipart/form-data">

									<div class="form-group">
										<label>Nama</label>
										<input type="hidden" name="id_page" class="form-control" value="<?php echo $data['id_page']; ?>">
										<input type="text" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" placeholder="Nama">
									</div>


									<div class="form-group">
										<label>Konten</label>
										<textarea name="konten" id="konten" cols="30" rows="5"><?php echo $data['konten'] ?></textarea>
									</div>

									<div class="form-group">
										<label for="">Gambar Sebelumnya :</label><br>
										<img src="<?php echo 'upload/page/'.$data['gambar']?>" alt="Foto Page" width="100px">
									</div>
									
									<div class="form-group">
										<label>Gambar</label>
										<input type="file" class="form-control" value="<?php echo $data['gambar']; ?>" name="gambar" placeholder="Logo">
										 <input type="hidden" name="lama" value="<?php echo $data['gambar']; ?>">
									</div>
								
									
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="page.php" class="btn btn-info">Kembali</a>
								</div>
							</form>

							</div>
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