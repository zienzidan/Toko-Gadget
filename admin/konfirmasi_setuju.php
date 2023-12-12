<?php
include 'inc/header.php';
$id= isset($_REQUEST['id']) ? $_REQUEST['id'] :'' ;
?>


	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Konfirmasi Pesanan</h4>
					</div>
					 
			
		<div class="row">
						
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header bg-info">
            	<h3 class="card-title  text-white">Konfirmasi Pesanan</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
              	<div class="col-md-4">
              		<strong>Bukti Pembayaran</strong>
              		<br>
              		<center>
              		<?php
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran where id_invoice ='$id'");
                  while($data = mysqli_fetch_array($query)){?>
                  
                  <img src="<?php echo 'upload/bukti/'.$data['bukti'];?>" class="img-fluid img-bordered mb-3 mt-2" style="width:300px;height:300px">
                  <?php } ?>
              		</center>
              	</div>

              	 <?php
                  $data = mysqli_query($koneksi,"SELECT invoice.id_invoice,invoice.no_invoice,invoice.tgl_invoice,invoice.bayar,pelanggan.nm_pelanggan FROM invoice join pelanggan on invoice.id_pelanggan=pelanggan.id_pelanggan where id_invoice ='$id'");
                  while($ambil_data = mysqli_fetch_array($data)){?>
                  <div class="col-md-4">
                  	<strong>No. Pesanan :</strong>
                  	<p class="text-muted"><?php echo $ambil_data['no_invoice'];?></p>
                  	<hr>
                  	<strong>Tgl. Pesanan :</strong>
                  	<p class="text-muted"><?php echo $ambil_data['tgl_invoice'];?></p>
                  	<hr>
                  	<strong>Nama Pelanggan :</strong>
                  	<p class="text-muted"><?php echo $ambil_data['nm_pelanggan'];?></p>	
                  	<hr>
                  	<strong>Jumlah Pembayaran :</strong>
                  	<p class="text-muted">Rp. <?php echo number_format($ambil_data['bayar'],0,'','.');?> ,-</p>
                  	<hr>
                  	<?php } ?>
                  </div>

                  <div class="col-md-4">
                  <form action="konfirmasi_simpan.php" method="post">
                    <div class="form-group">
                      <strong>Tgl. Pembayaran :</strong>
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                      <input type="date" class="form-control" name="tgl">
                    </div>
                    <div class="form-group">
                      <strong>Aktual Pembayaran :</strong>
                      <input type="number" class="form-control" name="total_bayar" placeholder="Aktual Pembayaran" required>
                    </div>
                    <div class="form-group">
                      <strong>Rekening Bank Pengirim:</strong>
                      <input type="number" class="form-control" name="pengirim" placeholder="No. Rekening Bank Pelanggan" required>
                    </div>
                    <div class="row justify-content-end">
                    <a href="konfirmasi_tolak.php?id=<?php echo $id;?>" class="btn btn-danger tolak-link"> Batalkan</a>&nbsp;
                    <input type="submit" class="btn btn-primary mr-2" Value="Konfirmasi">
                  </div>
                </form>        
                </div>
                
              </div>
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
     
	


					</div>
				
				</div>
			</div>
			
		</div>
		
		 
	</div>
</div>


















<?php
include 'inc/footer.php';
?>
