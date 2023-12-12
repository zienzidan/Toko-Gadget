<!-- Header -->
<?php 
	
	include "inc/header.php";

$id = $_GET['id_kategori'];

$query = "SELECT * FROM kategori WHERE id_kategori = $id LIMIT 1";

$result = mysqli_query($koneksi, $query);

$edit = mysqli_fetch_array($result);


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
									<div class="card-title">Edit Kategori</div>
								</div>
								<div class="card-body">
									<form method="POST" action="update_kategori.php">

									<div class="form-group">
										<label for="email2">Nama Kategori</label>
										<input type="hidden" name="id_kategori" class="form-control" value="<?php echo $edit['id_kategori']; ?>">
										<input type="text" class="form-control" value="<?php echo $edit['nama_kategori']; ?>" name="nama_kategori" placeholder="Nama Kategori">
									</div>
									
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="kategori.php" class="btn btn-info">Kembali</a>
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