<!-- Header -->
<?php 
	include "inc/header.php";
	
	if (isset($_POST['addongkir'])) 
	{
		$kota	= $_POST['kota'];
		$ongkir = $_POST['ongkir'];

		$query = mysqli_query($koneksi, "INSERT INTO ongkir (kota, ongkir) VALUES ('$kota', '$ongkir')");

		if ($query) {
			// menampilkan notifikasi
			echo "<script>alert('Berhasil menambahkan Data'); window.location.href='ongkir.php' </script> ";
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
						<h4 class="page-title">Ongkir</h4>
						
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">

								<div class="card-header">

									<div class="card-title">Data Ongkir</div>
									<button data-toggle="modal" data-target="#addongkir" class="btn btn-primary pull-right">Tambah Ongkir</button>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-bordered table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Kota</th>
													<th>Ongkir</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													$no = 1;
													$query = mysqli_query($koneksi, "SELECT * FROM ongkir");
													while ($ambil_data = mysqli_fetch_assoc($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $ambil_data['kota'] ?></td>
													<td>Rp. <?php echo number_format($ambil_data['ongkir'],0,'','.');?> ,-</td>
													<td>
														<a href="edit_ongkir.php?id_ongkir=<?php echo $ambil_data['id_ongkir']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
														<a href="hapus_ongkir.php?id_ongkir=<?php echo $ambil_data['id_ongkir'] ?>" onclick="return confirm('Yakin anda ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
			<div id="addongkir" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Ongkir</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Kota</label>
									<input name="kota" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Ongkir</label>
									<input name="ongkir" type="text" class="form-control" required autofocus>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addongkir" type="submit" class="btn btn-primary" value="Tambah">
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