<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../koneksi.php';

 
// menangkap data yang dikirim dari form login
$id = $_POST['id_produk'];
$qty = $_POST['qty'];
$data = mysqli_query($koneksi, "SELECT * from produk where id_produk='$id'");
  while($d = mysqli_fetch_array($data)){
  	$nama=$d['nama_produk'];
  	$harga=$d['harga'];
  	$pelanggan=$_SESSION['id_pelanggan'];
  	$total = $qty*$harga;

  	$insert = mysqli_query($koneksi,"INSERT into checkout VALUES('$pelanggan','$id','$nama','$harga','$qty','$total')");
  	if($insert){
		echo"<script>alert('Berhasil ditambahkan!'); window.location.href='produk.php' </script>";
}else
	echo"<script>alert('Gagal ditambahkan!'); </script>";
}?>