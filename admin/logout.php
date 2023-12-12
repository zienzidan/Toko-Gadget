<?php 
// mengaktifkan session php
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman ke halaman login
echo "<script>alert('Anda Berhasil Logout'); window.location.href='login.php' </script>";
?>