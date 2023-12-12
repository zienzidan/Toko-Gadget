<!-- Header -->
<?php 
	include "inc/header.php";
	
$id = $_GET['id_ongkir'];

$query = "SELECT * FROM ongkir WHERE id_ongkir = $id LIMIT 1";

$result = mysqli_query($koneksi, $query);

$edit = mysqli_fetch_array($result);


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
									<div class="card-title">Edit Ongkir</div>
								</div>
								<div class="card-body">
									<form method="POST" action="update_ongkir.php">

									<div class="form-group">
										<label for="email2">Kota</label>
										<input type="hidden" name="id_ongkir" class="form-control" value="<?php echo $edit['id_ongkir']; ?>">
										<input type="text" class="form-control" value="<?php echo $edit['kota']; ?>" name="kota" placeholder="Kota">
									</div>

									<div class="form-group">
										<label for="email2">Ongkir</label>
										
										<input type="text" class="form-control" value="<?php echo $edit['ongkir']; ?>" name="ongkir" placeholder="ongkir">
									</div>
									
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="ongkir.php" class="btn btn-info">Kembali</a>
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