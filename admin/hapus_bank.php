<?php
	include "../koneksi.php";


	$id = $_GET['id_bank'];


	$query = "DELETE FROM bank WHERE id_bank = '$id'";

	if ($koneksi->query($query)) {
		echo "<script>alert('Berhasil menghapus Data'); window.location.href='bank.php' </script> ";
	}else{
		// menampilkan notifikasi gagal
		echo "<script>alert('Gagal menghapus Data'); </script>";
	}



?>