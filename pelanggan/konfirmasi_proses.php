<?php
include'../koneksi.php';


if ($_POST['upload']){
	$id=$_POST['id_invoice'];
	$ekstensi_boleh = array('png','jpg','jpeg','JPG');
	$nama = $_FILES['file']['name'];
	$x = explode('.',$nama);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];

	if(in_array($ekstensi, $ekstensi_boleh)===true){
		if($ukuran < 1044070){
			move_uploaded_file($file_tmp, '../admin/upload/bukti/'.$nama);
			$insert=mysqli_query($koneksi,"INSERT INTO pembayaran (id_invoice,bukti) VALUES ('$id','$nama')");
			$update = mysqli_query($koneksi,"UPDATE invoice set status='Menunggu Konfirmasi' where id_invoice='$id'");
			if($update){
				echo"<script>alert('Proses Upload Bukti Pembayaran Berhasil'); window.location.href='konfirmasi.php' </script>";
						}else{
							echo"<script>alert('Gagal Disimpan'); window.location.href='konfirmasi_detail.php' </script>";
									}
								}else{
									echo"<script>alert('Ukuran file terlalu besar'); window.location.href='konfirmasi_detail.php' </script>";
											}
											}else{
												echo"<script>alert('Ekstensi file tidak diizinkan'); window.location.href='konfirmasi_detail.php' </script>";
													}
												}else
												echo"<script>alert('Upload bukti pembayaran gagal'); window.location.href='konfirmasi_detail.php' </script>";							
								?>