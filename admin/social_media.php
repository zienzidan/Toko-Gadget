<!-- Header -->
<?php 

	include "inc/header.php";
	
?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Social Media</h4>
						
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Input Social Media</div>
								</div>
								<div class="card-body">
									<form action="#" method="post">
									<div class="form-group">
										<label for="email2">Youtube</label>
										<input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/">
										<small class="form-text text-danger">Silahkan isi link youtube</small>
									</div>
									<div class="form-group">
										<label for="email2">Instagran</label>
										<input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/">
										<small class="form-text text-danger">Silahkan isi link Instagram</small>
									</div>
									<div class="form-group">
										<label for="email2">Facebook</label>
										<input type="text" class="form-control" name="facebook" placeholder="https://facebook.com/">
										<small class="form-text text-danger">Silahkan isi link Facebook</small>
									</div>
								
								</div>
								<div class="card-action">
									<button type="submit" name="Submit" class="btn btn-success">Simpan</button>
									<button class="btn btn-danger">Cancel</button>
								</div>
							</form>
							<?php 
								// cek jika form di submit, maka 
								if (isset($_POST['Submit'])) {
									$youtube = $_POST['youtube'];
									$instagram = $_POST['instagram'];
									$facebook = $_POST['facebook'];

									// jalankan query database
									$query = "INSERT INTO social_media (youtube,instagram,facebook)
									VALUES ('$youtube', '$instagram', '$facebook')";

									// kondisi pengecekan apakah data berhasil dimasukkan atau tidak
									if ($koneksi->query($query)) {
										// menampilkan notifikasi
										echo "<script>alert('Berhasil menambahkan Data'); window.location.href='social_media.php' </script> ";
									}else{
										// menampilkan notifikasi gagal
										echo "<script>alert('Gagal menambahkan Data'); </script>";
									}

								}
							?>		
							</div>
						</div>

						<div class="col-md-7">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Data Social Media</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-bordered table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Youtube</th>
													<th>Instagram</th>
													<th>Facebook</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													$no = 1;
													$query = mysqli_query($koneksi, "SELECT * FROM social_media order by id_social ASC");
													while ($ambil_data = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $ambil_data['youtube'] ?></td>
													<td><?php echo $ambil_data['instagram'] ?></td>
													<td><?php echo $ambil_data['facebook'] ?></td>
													<td>
														<a href="edit_social.php?id_social=<?php echo $ambil_data['id_social'] ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
														<a href="" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
		
	
	</div>
</div>

<?php 
	include "inc/footer.php";

?>