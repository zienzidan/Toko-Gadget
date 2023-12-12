<?php
include'../koneksi.php';

$id=$_POST['id'];
$tgl=$_POST['tgl'];
$total_bayar = trim(str_replace('  ', ' ',$_POST['total_bayar']));
$pengirim = trim(str_replace('  ', ' ',$_POST['pengirim']));

$update=mysqli_query($koneksi,"UPDATE pembayaran SET tgl_pembayaran='$tgl',total_bayar='$total_bayar',bank='$pengirim' where id_invoice='$id'");
$update2=mysqli_query($koneksi,"UPDATE invoice set status='Produk Dikirim' where id_invoice='$id'");
if($update2){
	echo"<script>alert('Pesanan telah dikonfirmasi'); window.location.href='konfirmasi.php' </script>";
	}else{
		echo"<script>alert('Gagal disimpan'); window.location.href='konfirmasi_simpan.php' </script>";
	}
?>