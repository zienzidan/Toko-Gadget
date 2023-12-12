<!-- Header -->
<?php 	
	include "inc/header.php";
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
									<div class="card-title">Data Page</div>
									
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama</th>
													<th>Gambar</th>
													<th>Konten</th>
													
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query =  mysqli_query($koneksi, "SELECT * FROM page order by id_page ASC");
													while ($data = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $data['nama'] ?></td>
													<td><img src="<?php echo 'upload/page/'. $data['gambar'] ?>" alt="Foto Page" width="50px"></td>
													<td><?php echo $data['konten'] ?></td>

													<td>
														<a href="edit_page.php?id_page=<?php echo $data['id_page']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"> Edit</i></a>
														
													</td>
												</tr>
												<?php } ?>
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