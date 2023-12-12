<?php 
	include '../koneksi.php';

	$id = $_GET['id_kategori'];

	$query = "DELETE FROM kategori WHERE id_kategori = '$id'";

	if ($koneksi->query($query)) {
		echo "<script>alert('Berhasil menghapus Data'); window.location.href='kategori.php' </script> ";
	}else{
		// menampilkan notifikasi gagal
		echo "<script>alert('Gagal menambahkan Data'); </script>";
	}


?>