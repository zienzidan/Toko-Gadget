 <?php 

 include "koneksi.php";

$batas = isset($_GET['perpage']) ?  (int) $_GET['perpage'] : 10;;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * from produk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$query_all_produk = mysqli_query($koneksi,"SELECT * FROM produk limit $halaman_awal, $batas");

$produk = array();
while ($data = mysqli_fetch_array($query_all_produk))
$produk[] = $data;
$nomor = $halaman_awal + 1;




?>