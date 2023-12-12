<?php

//include koneksi database
include('../koneksi.php');

$id = $_POST['id_bank'];
$nama_bank = trim(str_replace('  ', ' ',$_POST['nama_bank']));
$rekening = trim(str_replace('  ', ' ',$_POST['rekening']));
$pemilik = trim(str_replace('  ', ' ',$_POST['pemilik']));
$nama_logo_baru = $_FILES['logo']['name'];
$lama=$_POST['lama'];

$cek = mysqli_query($koneksi,"SELECT * FROM bank where nama_bank='$nama_bank' and rekening='$rekening' and pemilik='$pemilik' and logo='$lama'");
$num=mysqli_num_rows($cek);
if($num==1 and empty($nama_logo_baru)){
  echo"<script>alert('Data Bank tidak diubah'); window.location.href='edit_bank.php' </script>";

}else if($nama_logo_baru !=''){
  $ekstensi_boleh = array('png','jpg','jpeg');
  $x = explode('.',$nama_logo_baru);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['logo']['size'];
  $file_tmp = $_FILES['logo']['tmp_name'];
  $angka_acak = rand(1,999);

  if(in_array($ekstensi, $ekstensi_boleh)===true){
    if($ukuran < 1044070){
      unlink('upload/bank/'.$lama);
      move_uploaded_file($file_tmp, 'upload/bank/'.$nama_logo_baru);
      $update=mysqli_query($koneksi,"UPDATE bank set nama_bank='$nama_bank',rekening='$rekening',pemilik='$pemilik',logo='$nama_logo_baru' where id_bank='$id'");
        if($update){
          echo"<script>alert('Data Bank Berhasil Diubah!!'); window.location.href='bank.php' </script>";
          }else{
          echo"<script>alert('Gagal Menyimpan Data!!'); window.location.href='edit_bank.php' </script>";
              }
            }else{
              echo"<script>alert('Ukuran file terlalu besar'); window.location.href='edit_bank.php' </script>";
                  }
                }else{
                  echo"<script>alert('Ekstensi file tidak diizinkan'); window.location.href='edit_bank.php' </script>";
                  }
                }else{
                  $update=mysqli_query($koneksi,"UPDATE bank set nama_bank='$nama_bank',rekening='$rekening',pemilik='$pemilik' where id_bank='$id'");
                  if($update){
                    echo"<script>alert('Data Bank Berhasil Diubah!!'); window.location.href='bank.php' </script>";
                  }
                }

?>