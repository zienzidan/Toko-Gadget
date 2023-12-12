<!-- Header -->
<?php 	
	include "inc/header.php";

	if (isset($_POST['addbank'])) 
	{
		$nama_bank		= $_POST['nama_bank'];
		$rekening		= $_POST['rekening'];
		$pemilik		= $_POST['pemilik'];
		$logo			= $_FILES['logo']['name'];

		// cek dulu jika ada logo jalankan coding ini
	if ($logo != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif', 'JPG'); //ekstensi file foto yang diupload
    $x = explode('.',$nama_logo_baru); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['logo']['tmp_name'];
   	$logo = $_FILES['logo']['name']; //menggabungkan angka acak dengan nama file sebenarnya

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

        move_uploaded_file($file_tmp, 'upload/bank/'.$nama_logo_baru); //memindahkan file foto ke folder foto
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
        $query = "INSERT INTO bank (nama_bank, rekening, pemilik, logo)
        VALUES ('$nama_bank', '$rekening', '$pemilik', '$nama_logo_baru')";
        $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
        } else {
            // tampil alert dan akan redirect ke halaman laptop.php
            echo "<script>alert('Berhasil Menambahkan Data Bank'); window.location.href='bank.php' </script>";
        } 
            
        } else {
            // jika file ekstensi tidak sesuai
            header("location:bank.php?alert=gagal_ekstensi");
        }

} else {
    $query = "INSERT INTO bank (nama_bank, rekening, pemilik, logo) 
    VALUES ('$nama_bank', '$rekening', '$pemilik', '$nama_logo_baru')";
    $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
    if (!$result) {
    die("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
        // tampil alert dan akan redirect ke halaman laptop.php
         echo "<script>alert('Berhasil menambahkan Data Bank'); window.location.href='bank.php' </script>";
        
    }
}


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
								<?php 
								if(isset($_GET['alert'])){
									if($_GET['alert']=='gagal_ekstensi'){
										?>
										<div class="alert alert-warning alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
											Ekstensi Tidak Diperbolehkan
										</div>								
										<?php
									}elseif($_GET['alert']=="gagal_ukuran"){
										?>
										<div class="alert alert-warning alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
											Ukuran File terlalu Besar
										</div> 								
										<?php
									}elseif($_GET['alert']=="berhasil"){
										?>
										<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> Success</h4>
											Berhasil Disimpan
										</div> 								
										<?php
									}
								}
								?>
									<div class="card-title">Daftar Bank / Metode Lain</div>
									<button data-toggle="modal" data-target="#addpembayaran" class="btn btn-primary pull-right">Tambah Metode</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama Bank</th>
													<th>Rekening</th>
													<th>Pemilik</th>
													<th>Logo</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													$no = 1;
													$query = mysqli_query($koneksi, "SELECT * FROM bank order by id_bank ASC");
													while ($ambil_data = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $ambil_data['nama_bank'] ?></td>
													<td><?php echo $ambil_data['rekening'] ?></td>
													<td><?php echo $ambil_data['pemilik'] ?></td>
													<td><img src="<?php echo 'upload/bank/'. $ambil_data['logo'] ?>" alt="Foto Bank" width="100px"></td>
													<td>
														<a href="edit_bank.php?id_bank=<?php echo $ambil_data['id_bank']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
														<a href="hapus_bank.php?id_bank=<?php echo $ambil_data['id_bank'] ?>" onclick="return confirm('Yakin anda ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
													</td>
												</tr>
												<?php 
												 }
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				
				</div>

			</div>
			
		</div>
		<!-- modal input -->
			<div id="addpembayaran" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Bank</h4>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nama Bank</label>
									<input name="nama_bank" type="text" class="form-control" placeholder="Nama Bank" required oninvalid="this.setCustomValidity('Nama Bank belum diisi')" oninput="setCustomValidity('')">
								</div>
								<div class="form-group">
									<label>Rekening</label>
									<input name="rekening" type="text" placeholder="Nomor Rekening" class="form-control" required oninvalid="this.setCustomValidity('Nomor Rekening belum diisi')" oninput="setCustomValidity('')">
								</div>
								<div class="form-group">
									<label>Pemilik</label>
									<input name="pemilik" type="text" class="form-control" placeholder="Pemilik" required oninvalid="this.setCustomValidity('Pemilik belum diisi')" oninput="setCustomValidity('')">
								</div>
								<div class="form-group">
									<label>Logo</label>
									<input name="logo" type="file" class="form-control" required oninvalid="this.setCustomValidity('Logo belum diisi')" oninput="setCustomValidity('')">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addbank" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
			</div>
		
	
	</div>
</div>

<?php 
	include "inc/footer.php";

?>