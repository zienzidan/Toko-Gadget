<?php

//include koneksi database
include('../koneksi.php');

$id = $_POST['id_produk'];
$nama_produk = trim(str_replace('  ', ' ',$_POST['nama_produk']));
$id_kategori = $_POST['id_kategori'];
$harga = trim(str_replace('  ', ' ',$_POST['harga']));
$jumlah_stok = trim(str_replace('  ', ' ',$_POST['jumlah_stok']));
$deskripsi = trim(str_replace('  ', ' ',$_POST['deskripsi']));
$nama_foto_baru = $_FILES['foto']['name'];
$lama=$_POST['lama'];

$cek = mysqli_query($koneksi,"SELECT * FROM produk where nama_produk='$nama_produk' and id_kategori='$id_kategori' and harga='$harga' and jumlah_stok= '$jumlah_stok' and deskripsi='$deskripsi' and foto='$lama'");
$num=mysqli_num_rows($cek);
if($num==1 and empty($nama_foto_baru)){
  echo"<script>alert('Data Produk tidak diubah'); window.location.href='edit_produk.php' </script>";

}else if($nama_foto_baru !=''){
  $ekstensi_boleh = array('png','jpg','jpeg', 'JPG');
  $x = explode('.',$nama_foto_baru);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak = rand(1,999);

  if(in_array($ekstensi, $ekstensi_boleh)===true){
    if($ukuran < 1044070){
      unlink('upload/produk/'.$lama);
      move_uploaded_file($file_tmp, 'upload/produk/'.$nama_foto_baru);
      $update=mysqli_query($koneksi,"UPDATE produk set nama_produk='$nama_produk',id_kategori='$id_kategori',harga='$harga', jumlah_stok='$jumlah_stok', deskripsi='$deskripsi', foto='$nama_foto_baru' where id_produk='$id'");
        if($update){
          echo"<script>alert('Data Produk Berhasil Diubah!!'); window.location.href='produk.php' </script>";
          }else{
          echo"<script>alert('Gagal Menyimpan Data!!'); window.location.href='edit_produk.php' </script>";
              }
            }else{
              echo"<script>alert('Ukuran file terlalu besar'); window.location.href='edit_produk.php' </script>";
                  }
                }else{
                  echo"<script>alert('Ekstensi file tidak diizinkan'); window.location.href='edit_produk.php' </script>";
                  }
                }else{
                  $update=mysqli_query($koneksi,"UPDATE produk set nama_produk='$nama_produk',id_kategori='$id_kategori',harga='$harga', jumlah_stok='$jumlah_stok', deskripsi='$deskripsi' where id_produk='$id'");
                  if($update){
                    echo"<script>alert('Data Produk Berhasil Diubah!!'); window.location.href='produk.php' </script>";
                  }
                }

?>