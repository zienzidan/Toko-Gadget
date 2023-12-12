<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include "../koneksi.php";



$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, sha1($_POST['password']));

$cek_login = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."'");
    if (mysqli_num_rows($cek_login) > 0) {
          $panggil = mysqli_fetch_object($cek_login);
          $_SESSION['statuslogin'] = true;
          $_SESSION['admin_global'] = $panggil;
          $_SESSION['id_user'] = $panggil->id_user;
          echo "<script>alert('Anda Berhasil login ke halaman admin!'); window.location.href='index.php' </script>";
        }else{
            echo "<script>alert('Email atau password anda salah!'); window.location.href='login.php' </script> </script>";
    }                                  

                                                
?>