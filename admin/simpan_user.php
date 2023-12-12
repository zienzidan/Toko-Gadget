<?php 
    session_start();
    if ($_SESSION['statuslogin'] != true) {
      echo '<script>window.location="login.php"</script>';
  }
	include "../koneksi.php";

		$nama		       = $_POST['nama'];
		$username	       = $_POST['username'];
		$email			   = $_POST['email'];
		$password		   = sha1($_POST['password']);
		$foto				= $_FILES['foto']['name'];

		// cek dulu jika ada logo jalankan coding ini
	if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif', 'JPG'); //ekstensi file foto yang diupload
    $x = explode('.',$foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_foto_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'upload/user/'.$nama_foto_baru); //memindahkan file foto ke folder foto
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
        $query = "INSERT INTO user (nama, username, email, password, foto)
        VALUES ('$nama', '$username', '$email', '$password', '$nama_foto_baru')";
        $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
        } else {
            // tampil alert dan akan redirect ke halaman laptop.php
            header("location:user.php?alert=berhasil");
        } 
            
        } else {
            // jika file ekstensi tidak sesuai
            header("location:user.php?alert=gagal_ekstensi");
        }

} else {
    $query = "INSERT INTO user (nama, username, email, password, foto) 
    VALUES ('$nama', '$username', '$email', '$password', '$nama_foto_baru')";
    $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
    if (!$result) {
    die("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
        // tampil alert dan akan redirect ke halaman laptop.php
        header("location:user.php?alert=berhasil");
        
    }
}



?>