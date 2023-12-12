<?php 
	
	include "inc/header.php";
	
?>

	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">Bukti Pembayaran</h4>
					<div class="row justify-content-center">
						
						<div class="col-md-6">
							<div class="card card-profile card-secondary">
								<?php 
								$query = mysqli_query($koneksi,"SELECT invoice.id_invoice,invoice.no_invoice,pembayaran.id_pembayaran,pembayaran.tgl_pembayaran,pembayaran.bank,pembayaran.bukti,pembayaran.total_bayar from pembayaran join invoice ON pembayaran.id_invoice=invoice.id_invoice where bank!='' order by id_invoice ASC");
			                    if (mysqli_num_rows($query) > 0) { ?>
			                      <?php
			                      while ($data = mysqli_fetch_array($query)) {
			                      ?>
								
								<div class="card-body">
									<img src="<?php echo 'upload/bukti/'.$data['bukti'] ?>" style="width: 100% ;height: auto" alt="...">
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
