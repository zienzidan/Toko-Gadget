<!-- Header -->
<?php 
	include "inc/header.php";

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Produk</h4>
						
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
									<div class="card-title">Data Produk</div>
									<a href="tambah_produk.php" class="btn btn-primary pull-right">Tambah Produk</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table-bordered table table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama Produk</th>
													<th>Kategori</th>
													<th>Harga</th>
													<th>Stok Jumlah</th>
													<th>Deskripsi</th>
													<th>Foto</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$sql = "SELECT * FROM kategori INNER JOIN produk ON kategori.id_kategori = produk.id_kategori";
									                 $query = mysqli_query($koneksi, $sql);
									                  while ($data = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $data['nama_produk'] ?></td>
													<td><?php echo $data['nama_kategori'] ?></td>
													<td>Rp. <?php echo number_format($data['harga'],0, ',', '.');?></td>
													<td><?php echo $data['jumlah_stok'] ?></td>
													<td><?php echo $data['deskripsi'] ?></td>
													<td><img src="<?php echo 'upload/produk/'. $data['foto'] ?>" alt="Foto Produk" width="100px"></td>
													<td>
														<a href="edit_produk.php?id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
														<a href="hapus_produk.php?id=<?php echo $data['id_produk'] ?>" onclick="return confirm('Yakin anda ingin menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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