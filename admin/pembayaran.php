<?php 
  
  include "inc/header.php";
  
?>

  <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <h4 class="page-title">Data Pembayaran</h4>
          <div class="row justify-content-center">
            
            <div class="col-md-6">
              <div class="card card-profile card-secondary">
                <?php 
                $query = mysqli_query($koneksi,"SELECT invoice.id_invoice,invoice.no_invoice,pembayaran.id_pembayaran,pembayaran.tgl_pembayaran,pembayaran.bank,pembayaran.bukti,pembayaran.total_bayar from pembayaran join invoice ON pembayaran.id_invoice=invoice.id_invoice where bank!='' order by id_invoice ASC");
                          if (mysqli_num_rows($query) > 0) { ?>
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                <div class="card-header" style="background-image: url('img/blogpost.jpg')">
                  <div class="profile-picture">
                    <div class="avatar avatar-xl">
                      <img target="_blank" src="<?php echo 'upload/bukti/'.$data['bukti'] ?>" alt="..."style="width: 100% ;height: auto" class="avatar-img">
                    </div>
                  </div>
                </div><br>
                <div class="card-body">
                  <div class="user-profile">
                    <div class="name">No.Pesanan : <b><span class="text-muted"><?php echo $data['no_invoice'] ?></span></b></div><hr>
                    
                    <div class="name">Tgl. Bayar : <b><span class="text-muted"><?php echo $data['tgl_pembayaran'] ?></span></b></div><hr>
                    
                    <div class="name">Total Pembayaran : <b><span class="text-muted">Rp. <?php echo number_format($data['total_bayar'],0,'','.');?> ,-</span></b></div><hr>
                   
                    <div class="name">Rekening Pengirim : <b><span class="text-muted"><?php echo $data['bank'] ?></span></b></div>
                    
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
