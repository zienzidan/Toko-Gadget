<!-- Header -->
<?php 
	
	include "inc/header.php";
	


?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Penjualan</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-outline">
								<div class="card-header">
									<div class="card-title">Filter Laporan Penjualan</div>
								</div>
								<div class="card-body">
									<form method="get" action="">

									<div class="row">
										<div class="col-md-3">
						                  <div class="form-group">
						                    <label>Mulai Tanggal</label>
						                    <input autocomplete="off" type="date" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
						                  </div>
	                					</div>

	                					<div class="col-md-3">
						                  <div class="form-group">
						                    <label>Sampai Tanggal</label>
						                    <input autocomplete="off" type="date" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
						                  </div>
                						</div>

                						<div class="col-md-2">
						                  <div class="form-group">
						                    <input style="margin-top: 30px" type="submit" value="Tampilkan" class="btn btn-sm btn-primary btn-block">
						                  </div>
					                	</div>		
									</div>									
								</div>
							</form>

							</div>
						</div>

					</div>

					 <div class="row">
        <div class="col-12">
          <div class="card card-outline">
            <div class="card-header">
              <h3 class="card-title">Data Penjualan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              ?>
              <div class="row mt-3">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <br><br>
            
              <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead class="bg-info">
                <tr>
                  <th class="text-center">NO.</th>
                  <th class="text-center">NO. PESANAN</th>
                  <th class="text-center">TGL. PESANAN</th>
                  <th class="text-center">NAMA PELANGGAN</th>
                  <th class="text-center">SUB TOTAL</th>
                  <th class="text-center">ONGKIR</th>
                  <th class="text-center">TOTAL PEMBAYARAN</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $x_total_sub_total = 0;
                  $x_total_total = 0;
                  $x_total_ongkir = 0;
                  $query = mysqli_query($koneksi,"SELECT invoice.id_invoice,invoice.no_invoice,invoice.tgl_invoice,invoice.id_pelanggan,invoice.sub_total,invoice.ongkir,invoice.bayar,invoice.status,pelanggan.nm_pelanggan from invoice join pelanggan on invoice.id_pelanggan=pelanggan.id_pelanggan where status='Produk Dikirim' and date(tgl_invoice) >= '$tgl_dari' and date(tgl_invoice) <= '$tgl_sampai'order by id_invoice ASC");
                  if(mysqli_num_rows($query)>0){?>
                    <?php $no=1;
                    while ($data = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $data['no_invoice'];?></td>
                        <td class="text-center"><?php echo $data['tgl_invoice'];?></td>
                        <td class="text-center"><?php echo $data['nm_pelanggan'];?></td>
                        <td class="text-center">Rp. <?php echo number_format($data['sub_total'],0,'','.');?> ,-</td>
                        <td class="text-center">Rp. <?php echo number_format($data['ongkir'],0,'','.');?> ,-</td>
                        <td class="text-center">Rp. <?php echo number_format($data['bayar'],0,'','.');?> ,-</td>
                      </tr>
                      <?php 
                      $x_total_sub_total += $data['sub_total'];
                      $x_total_ongkir += $data['ongkir'];
                      $x_total_total += $data['bayar'];
                      } }?>
                </tbody>
                <tfoot>
                    <tr class="bg-secondary">
                      <td colspan="4" class="text-right"><b>TOTAL</b></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_sub_total).",-"; ?></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_ongkir).",-"; ?></td>
                      <td class="text-center"><?php echo "Rp.".number_format($x_total_total).",-"; ?></td>
    
                    </tr>
                  </tfoot>
              </table>
            </div>
            <?php
            }else{
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            }
            ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
				
				</div>


			</div>
			
		</div>


		
	
	</div>
</div>

<?php 
	include "inc/footer.php";

?>