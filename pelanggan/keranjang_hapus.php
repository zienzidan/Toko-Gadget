<?php
include'../koneksi.php';


$id= isset($_REQUEST['id']) ? $_REQUEST['id'] :'' ;
if ($id<>''){
mysqli_query($koneksi,"DELETE FROM checkout where id_produk='$id'");
echo"<script>alert('Berhasil Dihapus'); window.location.href='keranjang.php' </script>";
}
else{
echo"<script>alert('Gagal Dihapus'); </script>";
}
?>
