<?php
include'../koneksi.php';


$id= isset($_REQUEST['id']) ? $_REQUEST['id'] :'' ;
if ($id<>''){
mysqli_query($koneksi,"DELETE FROM produk where id_produk='$id'");
echo"<script>alert('Data Produk berhasil dihapus'); window.location.href='produk.php' </script>";
}
else{
echo"<script>alert('Gagal dihapus'); window.location.href='produk.php' </script>";
}
?>
