<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id_social  = $_POST['id_social'];
$youtube   = $_POST['youtube'];
$instagram   = $_POST['instagram'];
$facebook   = $_POST['facebook'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE social_media SET youtube = '$youtube', instagram = '$instagram', facebook = '$facebook' WHERE id_social = '$id_social'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($koneksi->query($query)) {
  // menampilkan notifikasi
  echo "<script>alert('Berhasil mengubah data Social Media'); window.location.href='social_media.php' </script>";
} else {
  // menampilkan notifikasi gagal
  echo "<script>alert('Gagal mengubah data Kategori'); </script>";
}
