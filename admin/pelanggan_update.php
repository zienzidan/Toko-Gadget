<?php
include'../koneksi.php';

$id = $_POST['id_pelanggan'];
$nama = trim(str_replace('  ', ' ',$_POST['nama']));
$hp = trim(str_replace('  ', ' ',$_POST['hp']));
$email = trim(str_replace('  ', ' ',$_POST['email']));
$alamat = trim(str_replace('  ', ' ',$_POST['alamat']));
$kota=$_POST['kota'];

$cek=mysqli_query($koneksi,"SELECT * from pelanggan where nm_pelanggan ='$nama' and hp='$hp' and email='$email' and id_ongkir='$kota' and alamat='$alamat'");
$num=mysqli_num_rows($cek);
if($num==1){
	echo"<script>alert('Data Pelanggan tidak diubah'); window.location.href='pelanggan_edit.php' </script> ";
}else{
$cek2=mysqli_query($koneksi,"SELECT * from pelanggan where (email ='$email' or hp='$hp') and id_pelanggan!='$id'");
$num2=mysqli_num_rows($cek2);
if($num2==0){
	$update=mysqli_query($koneksi,"UPDATE pelanggan set nm_pelanggan='$nama',hp='$hp',email='$email',alamat='$alamat',id_ongkir='$kota' where id_pelanggan='$id'");
	if($update){
		echo"<script>alert('Data Pelanggan Berhasil Diubah'); window.location.href='pelanggan.php' </script> ";
				}else{
					echo"<script>alert('Gagal disimpan'); ";
							}
						}else{
							echo"<script>alert('Email atau Nomor HP sudah terdaftar'); window.location.href='pelanggan_edit.php' </script> ";
									} }
									?>