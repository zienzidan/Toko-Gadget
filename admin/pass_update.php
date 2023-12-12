<?php
include'../koneksi.php';


$id = $_POST['id_user'];
$lama = trim(str_replace('  ', ' ',$_POST['lama']));
$sha1lama=sha1($lama);
$baru = trim(str_replace('  ', ' ',$_POST['baru']));
$ulang = trim(str_replace('  ', ' ',$_POST['ulang']));

if($baru !=$ulang){
	echo"<script>alert('Password tidak sama'); window.location.href='pass_edit.php'</script>";	
}else{
$cek=mysqli_query($koneksi,"SELECT * FROM user where password='$sha1lama' and id_user='$id'");
$num=mysqli_num_rows($cek);
if($num==1){
	$sha1baru=sha1($baru);
	$update=mysqli_query($koneksi,"UPDATE user set password='$sha1baru' where id_user='$id'");
	if($update){
		echo"<script>alert('Ganti Password Berhasil Diubah'); window.location.href='profile.php' </script>";
			}else{
				echo"<script>alert('Gagal Disimpan'); window.location.href='pass_edit.php'</script>";
					}
						}else{
				echo"<script>alert('Password lama salah'); window.location.href='pass_edit.php'</script>";
				}}
			?>