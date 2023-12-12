<?php

//include koneksi database
include('../koneksi.php');

$id = $_POST['id_user'];
$nama = trim(str_replace('  ', ' ',$_POST['nama']));
$username = trim(str_replace('  ', ' ',$_POST['username']));
$email = trim(str_replace('  ', ' ',$_POST['email']));
$nama_foto_baru = $_FILES['foto']['name'];
$lama=$_POST['lama'];

$cek=mysqli_query($koneksi,"SELECT * from user where nama ='$nama' and username='$username' and email='$email' and foto='$lama'");
$num=mysqli_num_rows($cek);
if($num==1 and empty($nama_foto_baru)){
  echo"<script>alert('Data Profile tidak diubah'); </script>";

}else if($nama_foto_baru !=''){
  $ekstensi_boleh = array('png','jpg');
  $x = explode('.',$nama_foto_baru);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak = rand(1,999);

  if(in_array($ekstensi, $ekstensi_boleh)===true){
    if($ukuran < 1044070){
      unlink('upload/user/'.$lama);
      move_uploaded_file($file_tmp, 'upload/user/'.$nama_foto_baru);
      $update=mysqli_query($koneksi,"UPDATE user set nama='$nama',username='$username', email='$email', foto='$nama_foto_baru' where id_user='$id'");
        if($update){
          echo"<script>alert('Berhasil mengubah data Profile'); window.location.href='profile.php' </script>";
          }else{
          echo"<script>alert('Gagal Disimpan'); </script>";
              }
            }else{
              echo"<script>alert('Ukuran File terlalu besar'); </script>";
                  }
                }else{
                  echo"<script>alert('Ekstensi file tidak diizinkan'); </script>";
                  }
                }else{
                  $update=mysqli_query($koneksi,"UPDATE user set nama='$nama',username='$username',email='$email' where id_user='$id'");
                  if($update){
                    echo"<script>alert('Berhasil mengubah data Profile'); window.location.href='profile.php' </script>";
                  }
                }

?>