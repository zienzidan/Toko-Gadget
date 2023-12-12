<?php 

include "../koneksi.php";



//get data dari form
$id_kategori  = $_POST['id_kategori'];
$nama_kategori   = $_POST['nama_kategori'];

//query update data ke dalam database berdasarkan ID
$editkat = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($editkat)) {
  // menampilkan notifikasi
  echo "<script>alert('Berhasil mengubah data Social Media'); window.location.href='kategori.php' </script>";
} else {
  // menampilkan notifikasi gagal
  echo "<script>alert('Gagal mengubah data Kategori'); </script>";
}

	

?>