<!-- Header -->
<?php
	include "inc/header.php";



	// mengecek apakah di url ada nilai get id
if (isset($_GET['id_bank'])) {
    // ambil nilai no admin dari url dan disimpan dalam variabel $id_metode
    $id = ($_GET["id_bank"]);

    // menampilkan data dari database yang mempunyai id_metode=$id
    $query = "SELECT * FROM bank WHERE id_bank='$id'";
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
        echo "<script>alert('Data tidak ditemukan pada database'); window.location.href='bank.php';</script>";
    }
} else {
    // apabila tidak ada data GET no admin pada akan di redirect ke profile.php
    echo "<script>alert('Masukkan data Bank.');window.location='bank.php';</script>";
}

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Bank</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Bank / Metode Lain</div>
								</div>
								<div class="card-body">
									<form method="POST" action="update_bank.php" enctype="multipart/form-data">

									<div class="form-group">
										<label>Nama Bank</label>
										<input type="hidden" name="id_bank" class="form-control" value="<?php echo $data['id_bank']; ?>">
										<input type="text" class="form-control" value="<?php echo $data['nama_bank']; ?>" name="nama_bank" placeholder="Nama Bank">
									</div>

									<div class="form-group">
										<label>No. Rekening</label>
										<input type="text" class="form-control" value="<?php echo $data['rekening']; ?>" name="rekening" placeholder="Nomor Rekening">
									</div>

									<div class="form-group">
										<label>Pemilik</label>
										<input type="text" class="form-control" value="<?php echo $data['pemilik']; ?>" name="pemilik" placeholder="Pemilik">
									</div>

									<div class="form-group">
										<label for="">Logo Sebelumnya :</label><br>
										<img src="<?php echo 'upload/bank/'.$data['logo']?>" alt="Foto Bank" width="100px">
									</div>
									
									<div class="form-group">
										<label>Logo</label>
										<input type="file" class="form-control" value="<?php echo $data['logo']; ?>" name="logo" placeholder="Logo">
										 <input type="hidden" name="lama" value="<?php echo $data['logo']; ?>">
									</div>
									
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="bank.php" class="btn btn-info">Kembali</a>
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