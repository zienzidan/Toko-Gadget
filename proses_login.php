<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = trim(str_replace('  ', ' ',$_POST['email']));
$password = trim(str_replace('  ', ' ',$_POST['password']));
$sha1 = sha1($password);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM pelanggan where email='$email' and password='$sha1'");
$cek=mysqli_num_rows($login);
if($cek==1){
	while ($data = mysqli_fetch_array($login)){
		$_SESSION['status'] = "login";
		$_SESSION['id_pelanggan'] = $data['id_pelanggan'];
		$_SESSION['nm_pelanggan'] = $data['nm_pelanggan'];
		// alihkan ke halaman dashboard admin
		echo"<script>alert('Selamat Datang!'); window.location.href='pelanggan/index.php' </script>";
}}else
	echo"<script>alert('Email atau Password salah'); window.location.href='login.php' </script>";
?>