<!-- Header -->
<?php 
	include "inc/header.php";
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
              <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>No. Pesanan</th>
                      <th>Tgl. Pesanan</th>
                      <th>Pelanggan</th>
                      <th>Sub Total</th>
                      <th>Ongkir</th>
                      <th>Total Pembayaran</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT invoice.id_invoice,invoice.tgl_invoice,invoice.no_invoice,invoice.bayar,invoice.status,invoice.sub_total,invoice.ongkir,pelanggan.nm_pelanggan from invoice join pelanggan ON invoice.id_pelanggan=pelanggan.id_pelanggan where status='Menunggu Konfirmasi' order by id_invoice ASC limit 5");
                    if (mysqli_num_rows($query) > 0) { ?>
                      <?php $no = 1;
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['no_invoice']; ?></td>
                          <td><?php echo $data['tgl_invoice']; ?></td>
                          <td><?php echo $data['nm_pelanggan']; ?></td>
                          <td>Rp. <?php echo number_format($data['sub_total'], 0, '', '.'); ?> ,-</td>
                          <td>Rp. <?php echo number_format($data['ongkir'], 0, '', '.'); ?> ,-</td>
                          <td>Rp. <?php echo number_format($data['bayar'], 0, '', '.'); ?> ,-</td>
                          <td><a href="konfirmasi_setuju.php?id=<?php echo $data['id_invoice']; ?>" class="btn btn-xs btn-primary"><i class="fas fa-search"></i></a></td>
                        <?php
                        $no++;
                      } ?>
                      <?php } ?>
                        </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="konfirmasi.php" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
            </div>
            <!-- /.card-footer -->
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
	include "inc/footer.php";

?>