<?php 
include "koneksi.php";

$nama = trim(str_replace('  ', ' ',$_POST['nama']));
$hp = trim(str_replace('  ', ' ',$_POST['hp']));
$email = trim(str_replace('  ', ' ',$_POST['email']));
$alamat = trim(str_replace('  ', ' ',$_POST['alamat']));
$kota=$_POST['kota'];
$password = trim(str_replace('  ', ' ',$_POST['password']));
$confirm = trim(str_replace('  ', ' ',$_POST['confirm']));

$sha1 = sha1($password);

if($password !=$confirm){
	echo"<script>alert('Password tidak sama'); window.location.href='register.php' </script>";	
}else{
$cek=mysqli_query($koneksi,"SELECT * from pelanggan where email ='$email' or hp='$hp'");
$num=mysqli_num_rows($cek);
if($num==0){
$insert=mysqli_query($koneksi,"INSERT INTO pelanggan VALUES ('','$nama', '$alamat','$hp','$email','$sha1', '$kota')");
if($insert){
	echo"<script>alert('Terimakasih telah registrasi'); window.location.href='login.php' </script>";
	}else{
		echo"<script>alert('Gagal Disimpan!'); window.location.href='register.php' </script>";
	}
	}else{
	echo"<script>alert('Email atau nomor hp sudah terdaftar'); window.location.href='register.php' </script>>";
} }



?>