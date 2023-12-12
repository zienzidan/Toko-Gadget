<!-- Header -->
<?php
	
	include "inc/header.php";

$id = $_GET['id_social'];

$query = "SELECT * FROM social_media WHERE id_social = $id LIMIT 1";

$result = mysqli_query($koneksi, $query);

$edit = mysqli_fetch_array($result);
	
?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Social Media</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Social Media</div>
								</div>
								<div class="card-body">
									<form action="update_social.php" method="POST">
									<div class="form-group">
										<label for="email2">Youtube</label>
										<input type="hidden" name="id_social" class="form-control" value="<?php echo $edit['id_social']; ?>">
										<input type="text" class="form-control" value="<?php echo $edit['youtube']; ?>" name="youtube" placeholder="https://youtube.com/">
										<small class="form-text text-danger">Silahkan isi link youtube</small>
									</div>
									<div class="form-group">
										<label>Instagran</label>
										<input type="text" class="form-control" value="<?php echo $edit['instagram']; ?>" name="instagram" placeholder="https://instagram.com/">
										<small class="form-text text-danger">Silahkan isi link Instagram</small>
									</div>
									<div class="form-group">
										<label for="email2">Facebook</label>
										<input type="text" class="form-control" value="<?php echo $edit['facebook']; ?>" name="facebook" placeholder="https://facebook.com/">
										<small class="form-text text-danger">Silahkan isi link Facebook</small>
									</div>
								
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success">Update</button>
									<button type="reset" class="btn btn-danger">Cancel</button>
									<a href="social_media.php" class="btn btn-info">Kembali</a>
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