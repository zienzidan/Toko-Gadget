<?php 

include "../koneksi.php";



//get data dari form
$id_ongkir  = $_POST['id_ongkir'];
$kota   = $_POST['kota'];
$ongkir   = $_POST['ongkir'];

//query update data ke dalam database berdasarkan ID
$editongkir = "UPDATE ongkir SET kota = '$kota', ongkir = '$ongkir' WHERE id_ongkir = '$id_ongkir'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($editongkir)) {
  // menampilkan notifikasi
  echo "<script>alert('Berhasil mengubah data Ongkir'); window.location.href='ongkir.php' </script>";
} else {
  // menampilkan notifikasi gagal
  echo "<script>alert('Gagal mengubah data Ongkir'); </script>";
}

	

?>