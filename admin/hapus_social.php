<?php
	include "../koneksi.php";


	$id = $_GET['id_social'];


	$query = "DELETE FROM social_media WHERE id_social = '$id'";

	if ($koneksi->query($query)) {
		echo "<script>alert('Berhasil menghapus Data'); window.location.href='social_media.php' </script> ";
	}else{
		// menampilkan notifikasi gagal
		echo "<script>alert('Gagal menghapus Data'); </script>";
	}



?>