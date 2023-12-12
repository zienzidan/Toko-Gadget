<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../koneksi.php';

$hari_ini = date('Y-m-d');
$id_pelanggan=$_SESSION['id_pelanggan'];
$sub_total = $_POST['sub_total'];
$ongkir = $_POST['ongkir'];
$bayar = $_POST['bayar'];

$hasil = mysqli_query($koneksi,"SELECT max(no_invoice) as maxKode FROM invoice");
$kp = mysqli_fetch_array($hasil);
$kodeInvoice = $kp['maxKode'];
// echo $kodeInvoice;
// echo "<br/>";
$noUrut = substr($kodeInvoice, 6, 3);
// echo $noUrut;
$noUrut++;
// echo $noUrut;
$thn = date('y');
$bln = date('m');
$tgl = date('d');
$char = $thn.$bln.$tgl;
$noInvoice = $char . sprintf("%02s", $noUrut);

$insert = mysqli_query($koneksi,"INSERT into invoice VALUES('','$noInvoice','$hari_ini','$id_pelanggan','$sub_total','$ongkir','$bayar','Menunggu Pembayaran')");
	
$id_invoice = mysqli_insert_id($koneksi);
$id_produk = $_POST['id_produk'];
$qty = $_POST['qty'];
$total = $_POST['total'];

$jumlah_pembelian = count($id_produk);
for($a=0;$a<$jumlah_pembelian;$a++){
   	$t_produk = $id_produk[$a];
   	$t_qty = $qty[$a];
   	$t_total = $total[$a];
   	echo $t_produk;

   	// ambil jumlah produk
	$detail = mysqli_query($koneksi, "select * from produk where id_produk='$t_produk'");
	$de = mysqli_fetch_assoc($detail);
	$jumlah_produk = $de['jumlah_stok'];

	// kurangi jumlah produk
	$jp = $jumlah_produk-$t_qty;
	mysqli_query($koneksi, "update produk set jumlah_stok='$jp' where id_produk='$t_produk'");

	// simpan data pembelian
	mysqli_query($koneksi, "insert into transaksi values(NULL,'$id_invoice','$t_produk','$t_qty','$t_total')")or die(mysqli_errno($koneksi));

	// hapus data temp
	mysqli_query($koneksi, "DELETE FROM checkout where id_pelanggan='$id_pelanggan'")or die(mysqli_errno($koneksi));


	echo "<script>alert('Lakukan Pembayaran'); window.location.href='pembayaran.php';</script>";
	}?>