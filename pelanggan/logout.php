<?php 

// mengaktifkan session php
session_start();
// menghapus semua session
session_destroy();
// mengalihkan halaman ke halaman login
echo"<script>alert('Anda telah logout'); window.location.href='../index.php' </script>";
?>