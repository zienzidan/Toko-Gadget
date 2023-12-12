<?php
include'../koneksi.php';

$id = $_POST['id_pelanggan'];
$lama = trim(str_replace('  ', ' ',$_POST['lama']));
$sha1lama=sha1($lama);
$baru = trim(str_replace('  ', ' ',$_POST['baru']));
$ulang = trim(str_replace('  ', ' ',$_POST['ulang']));

if($baru !=$ulang){
	echo"<script>alert('Password tidak sama!'); window.location.href='ganti_password.php' </script>";	
}else{
$cek=mysqli_query($koneksi,"SELECT * FROM pelanggan where pass='$sha1lama' and id_pelanggan='$id'");
$num=mysqli_num_rows($cek);
if($num==1){
	$sha1baru=sha1($baru);
	$update=mysqli_query($koneksi,"UPDATE pelanggan set pass='$sha1baru' where id_pelanggan='$id'");
	if($update){
		echo"<script>alert('Ganti Password Berhasil diubah!'); window.location.href='profile.php' </script>";
			}else{
				echo"<script>alert('Gagal disimpan!'); window.location.href='ganti_password.php' </script>";
							}
						}else{
				echo"<script>alert('Password lama salah'); window.location.href='ganti_password.php' </script>";
						}}
					?>