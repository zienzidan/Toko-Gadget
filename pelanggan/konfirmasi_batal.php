<?php
include '../koneksi.php';


$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
if ($id <> '') {
	$query = mysqli_query($koneksi, "SELECT * from transaksi where id_invoice='$id'");
	while ($d = mysqli_fetch_assoc($query)) {
		$id_produk = $d['id_produk'];
		$qty = $d['qty'];
		$detail = mysqli_query($koneksi, "select * from produk where id_produk='$id_produk'");
		$de = mysqli_fetch_assoc($detail);
		$jumlah_produk = $de['jumlah_stok'];
		$jp = $jumlah_produk + $qty;
		mysqli_query($koneksi, "UPDATE produk set jumlah_stok='$jp' where id_produk='$id_produk'");
	}
	mysqli_query($koneksi, "DELETE FROM invoice where id_invoice='$id'");
	echo "<script>alert('Pesanan telah dibatalkan'); window.location.href='konfirmasi.php' </script>";
} else
	echo "<script>alert('Gagal dibatalkan'); window.location.href='konfirmasi_detail.php' </script>";
