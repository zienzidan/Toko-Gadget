<!-- Header -->
<?php 
	
	include "inc/header.php";
	
	if (isset($_POST['addkategori'])) 
	{
		$nama_kategori	= $_POST['nama_kategori'];

		$tambahkat = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

		if ($tambahkat) {
			// menampilkan notifikasi
			echo "<script>alert('Berhasil menambahkan Data'); window.location.href='kategori.php' </script> ";
		}else{
			// menampilkan notifikasi gagal 
			echo "<script>alert('Gagal menambahkan Data'); </script>";
		}
	}
	
?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Kategori</h4>
						
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">

								<div class="card-header">

									<div class="card-title">Data Kategori</div>
									<button data-toggle="modal" data-target="#addkategori" class="btn btn-primary pull-right">Tambah Kategori</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-bordered table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama Kategori</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													$no = 1;
													$query = mysqli_query($koneksi, "SELECT * FROM kategori");
													while ($ambil_data = mysqli_fetch_assoc($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $ambil_data['nama_kategori'] ?></td>
													<td>
														<a href="edit_kategori.php?id_kategori=<?php echo $ambil_data['id_kategori']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
														<a href="hapus_kategori.php?id_kategori=<?php echo $ambil_data['id_kategori'] ?>" onclick="return confirm('Yakin anda ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
			<div id="addkategori" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Kategori</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Nama Kategori</label>
									<input name="nama_kategori" type="text" class="form-control" required autofocus>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addkategori" type="submit" class="btn btn-primary" value="Tambah">
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