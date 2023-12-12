<?php

//include koneksi database
include('../koneksi.php');

$id = $_POST['id_page'];
$nama = trim(str_replace('  ', ' ',$_POST['nama']));
$konten = trim(str_replace('  ', ' ',$_POST['konten']));
$gambar = $_FILES['gambar']['name'];
$lama=$_POST['lama'];

$cek = mysqli_query($koneksi,"SELECT * FROM page where nama='$nama' and konten='$konten' and gambar='$lama'");
$num=mysqli_num_rows($cek);
if($num==1 and empty($gambar)){
  echo"<script>alert('Data Bank tidak diubah'); window.location.href='edit_page.php' </script>";

}else if($gambar !=''){
  $ekstensi_boleh = array('png','jpg','jpeg', 'gif');
  $x = explode('.',$gambar);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['gambar']['size'];
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $angka_acak = rand(1,999);

  if(in_array($ekstensi, $ekstensi_boleh)===true){
    if($ukuran < 1044070){
      unlink('upload/page/'.$lama);
      move_uploaded_file($file_tmp, 'upload/page/'.$gambar);
      $update=mysqli_query($koneksi,"UPDATE page set nama='$nama',konten='$konten',gambar='$gambar' where id_page='$id'");
        if($update){
          echo"<script>alert('Data Page Berhasil Diubah!!'); window.location.href='page.php' </script>";
          }else{
          echo"<script>alert('Gagal Menyimpan Data!!'); window.location.href='edit_page.php' </script>";
              }
            }else{
              echo"<script>alert('Ukuran file terlalu besar'); window.location.href='edit_page.php' </script>";
                  }
                }else{
                  echo"<script>alert('Ekstensi file tidak diizinkan'); window.location.href='edit_page.php' </script>";
                  }
                }else{
                  $update=mysqli_query($koneksi,"UPDATE page set nama='$nama',konten='$konten' where id_page='$id'");
                  if($update){
                    echo"<script>alert('Data Bank Berhasil Diubah!!'); window.location.href='page.php' </script>";
                  }
                }

?>