<?php
 
  include "header.php";
  
?>

<!-- Header -->

<!-- HERO SECTION-->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
      <div class="col-lg-6">
        <h1 class="h2 text-uppercase mb-0">Pembayaran</h1>
      </div>
      <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="keranjang.php">Keranjang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
            </ol>
          </nav>
      </div>
    </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
  <div class="card mb-3">
  <div class="row no-gutters">
   
    <div class="col-md-12">
      <div class="card-body shadow bg-white rounded">
        <form action="konfirmasi_detail.php" method="POST">
         <?php
          $query = mysqli_query($koneksi,"SELECT * from invoice where id_pelanggan='$_SESSION[id_pelanggan]' order by id_invoice DESC LIMIT 1");
          while($data = mysqli_fetch_array($query)){?>         
        <h2 class="card-title text-center">Konfirmasi Pembayaran</h2>
        <hr>  
        <p class="card-text">Nomor pesanan anda <b><?php echo $data['no_invoice'];?></b>, Segera lakukan pembayaran sejumlah <b>Rp. <?php echo number_format($data['bayar'],0,'','.');?>,-</b>&nbsp; dengan cara transfer ke salah satu rekening bank kami dibawah ini :
        <input type="hidden" name="id" value="<?php echo $data['id_invoice']; ?>">  
        <?php } ?>
        <br>
        <br>

        <?php 
        $data2 = mysqli_query($koneksi,"SELECT * FROM bank");
        while($d2 = mysqli_fetch_array($data2)){?>
        <div class="text-center">
          Nama Bank : <b><?php echo $d2['nama_bank'];?></b>
          <br>
          Nomor Rekening : <b><?php echo $d2['rekening'];?></b>
          <br>
          Atas Nama : <b><?php echo $d2['pemilik'];?></b>
          <br>
          <b><img src="<?php echo '../admin/upload/bank/'.$d2['logo']; ?>" alt="" width="100px"></b>
          <br>     
        </div>
         
        </p>
         <?php } ?>
      
         <h6><b>Setelah melakukan pembayaran mohon lakukan konfirmasi pembayaran anda dengan cara klik tombol di bawah ini dengan melampirkan foto bukti pembayaran.</b></h6>
        <br>

        <center>
        <input type="submit" class="btn btn-dark" value="Konfirmasi Pembayaran">
        <center>  
      
        </form>
      </div>
    </div>
  </div>
</div>
</div>


</section>

<!-- footer -->
<?php 
  include "footer.php";
?>