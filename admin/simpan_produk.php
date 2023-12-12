<?php 
   
   include "../koneksi.php";

		$nama_produk		= $_POST['nama_produk'];
		$id_kategori		= $_POST['id_kategori'];
		$harga				= $_POST['harga'];
		$jumlah_stok		= $_POST['jumlah_stok'];
		$deskripsi			= $_POST['deskripsi'];
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
        move_uploaded_file($file_tmp, 'upload/produk/'.$nama_foto_baru); //memindahkan file foto ke folder foto
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
        $query = "INSERT INTO produk (id_kategori, nama_produk, harga, jumlah_stok, deskripsi, foto)
        VALUES ('$id_kategori', '$nama_produk', '$harga', '$jumlah_stok', '$deskripsi', '$nama_foto_baru')";
        $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
        } else {
            // tampil alert dan akan redirect ke halaman laptop.php
            echo "<script>alert('Berhasil menambahkan Data Produk'); window.location.href='produk.php' </script>";
        } 
            
        } else {
            // jika file ekstensi tidak sesuai
            header("location:produk.php?alert=gagal_ekstensi");
        }

} else {
    $query = "INSERT INTO produk (id_kategori, nama_produk, harga, jumlah_stok, deskripsi, foto) 
    VALUES ('$id_kategori', '$nama_produk', '$harga', '$jumlah_stok', '$deskripsi', '$nama_foto_baru')";
    $result = mysqli_query($koneksi, $query);
        // periksa query apakah ada error
    if (!$result) {
    die("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
        // tampil alert dan akan redirect ke halaman laptop.php
          echo "<script>alert('Berhasil menambahkan Data Produk'); window.location.href='produk.php' </script>";
        
    }
}



?>