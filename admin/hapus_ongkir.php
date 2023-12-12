<?php 
	include '../koneksi.php';

	$id = $_GET['id_ongkir'];

	$query = "DELETE FROM ongkir WHERE id_ongkir = '$id'";

	if ($koneksi->query($query)) {
		echo "<script>alert('Berhasil menghapus Data'); window.location.href='ongkir.php' </script> ";
	}else{
		// menampilkan notifikasi gagal
		echo "<script>alert('Gagal menambahkan Data'); </script>";
	}


?>