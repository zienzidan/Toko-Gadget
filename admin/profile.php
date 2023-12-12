<?php 
	
	include "inc/header.php";
	
?>

	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">Profile</h4>
					<div class="row justify-content-center">
						
						<div class="col-md-6">
							<div class="card card-profile card-secondary">
								<?php 
								$query = mysqli_query($koneksi, "SELECT * FROM user where id_user = '$_SESSION[id_user]' ");
								if (mysqli_num_rows($query) > 0) {
									 while ($data = mysqli_fetch_array($query)) { ?>
								<div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="<?php echo 'upload/user/'.$data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile">
										<h4><b>Nama Lengkap : </b></h4>
										<p class="text-muted"><?php echo $data['nama']; ?></p>
										<hr>

										<h4><b>Email : </b></h4>
										<p class="text-muted"><?php echo $data['email']; ?></p>
										<hr>
										<h4><b>Username : </b></h4>
										<p class="text-muted"><?php echo $data['username']; ?></p>
										
										<div class="view-profile">
											<a href="profile_edit.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-info btn-block"><b>Edit Profile</b></a>
											<a href="pass_edit.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-info btn-block"><b>Ganti Password</b></a>
										</div>
									</div>
								</div>
								<?php } } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



<?php 
	include "inc/footer.php";

?>
