-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2021 pada 01.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_gadget`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `pemilik` varchar(32) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `rekening`, `pemilik`, `logo`) VALUES
(1, 'BANK BCA', '62380021329', 'Ucup SI', 'bca-bank.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `no_invoice` int(11) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Handphone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `ongkir`) VALUES
(1, 'Tangerang', 10000),
(2, 'Jakarta', 8000),
(3, 'Bandung', 15000),
(4, 'Bekasi', 12000),
(5, 'Depok', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id_page`, `nama`, `konten`, `gambar`) VALUES
(1, 'Cara Belanja', '<p>1. Browse</p>\r\n\r\n<p>Browse berbagai koleksi kami berdasarkan Kategori atau Anda dapat mengklik &ldquo;NEW ARRIVALS&rdquo; untuk melihat koleksi baju model terbaru kami</p>\r\n\r\n<p>2. Add to cart</p>\r\n\r\n<p>Sesaat setelah Anda menemukan produk yang akan dibeli, pastikan ukuran yang sesuai, dan tambahkan ke dalam kantong belanjaan Anda dengan mengklik tombol &ldquo;ADD TO BAG&rdquo;.</p>\r\n\r\n<p>3. Check out</p>\r\n\r\n<p>Setelah Anda selesai berbelanja, tekan tombol &ldquo;CHECK OUT&rdquo; untuk meninggalkan halaman.</p>\r\n\r\n<p>4. Sign In</p>\r\n\r\n<p>Buatlah account baru atau Sign in jika Anda sudah mempunyai account dan isilah detail data diri Anda. Anda dapat juga CHECK OUT sebagai tamu (GUEST).</p>\r\n\r\n<p>5. Proceed to purchase</p>\r\n\r\n<p>Pilihlah jenis pembayaran yang Anda inginkan dan pilihlah metode pengiriman yang diinginkan. Masukkan KODE VOUCHER jika ada.</p>\r\n\r\n<p>6. Confirm</p>\r\n\r\n<p>Periksa kembali data pembelian Anda dan informasi yang ada. Tekan tombol CONFIRM jika semua data sudah sesuai. Periksa Email Anda untuk memeriksa Invoice dari kami.</p>\r\n\r\n<p>7. Payment</p>\r\n\r\n<p>Lakukan pembayaran, kemudian lakukan konfirmasi pembayaran dengan menekan tombol &ldquo;CONFIRM PAYMENT&rdquo; dan isilah data yang diperlukan.</p>\r\n\r\n<p>8. Done</p>\r\n\r\n<p>Tunggulah pesanan Anda dikirim. Kami akan mengirim email berisi konfirmasi sesaat setelah pesanan dikirimkan. Harap diperhatikan bahwa konfirmasi ini akan memerlukan waktu 1-2 hari. Harap melakukan pembayaran dalam waktu 24 jam atau pesanan Anda akan dibatalkan secara otomatis. Jangan lupa melakukan konfirmasi pembayaran atau kami tidak dapat memproses pesanan Anda.</p>', 'shopping-cart.png'),
(2, 'Terms & Condition', '<p>Syarat dan Ketentuan</p>\r\n\r\n<p>Selamat Datang di Beatrice Clothing, online webstore terpercaya bagi Anda. Silakan baca persyaratan berikut dengan seksama. Jika Anda tidak setuju dengan kebijakan Ketentuan dan Kondisi, Anda tidak dapat masuk dan menggunakan Website ini. Jika Anda terus mencari dan menggunakan Website ini, Anda setuju untuk mematuhi dan terikat oleh persyaratan dan ketentuan berikut penggunaan, yang bersama-sama dengan kebijakan privasi kami mengatur Beatrice Clothing dan penggunaannya oleh Anda sehubungan dengan situs ini.</p>\r\n\r\n<p>Perubahan Informasi Website</p>\r\n\r\n<p>Beatrice Clothing mempunyai hak untuk memperbaiki segala kekurangan dan memperbarui informasi di dalam website setiap saat tanpa ada pemberitahuan, termasuk harga, penjelasan dari produk dan ketersediaan dari barang yang ada.</p>\r\n\r\n<p>Copyright</p>\r\n\r\n<p>Semua konten dari situr seperti gambar, logo, grafis, data, foto adalah properti dari Beatrice Clothing. Anda tidak diperbolehkan menggandakan, mereproduksi dan atau menjual konten apapun yang ditampilkan di website ini tanpa persetujuan dari Beatrice Clothing.</p>\r\n\r\n<p>Penggunaan Komersial</p>\r\n\r\n<p>Anda dilarang keras untuk menggunakan konten yang ada di dalam website ini untuk tujuan iklan atau penggunaan komersial di website Anda atau media publikasi apapun.</p>\r\n\r\n<p>Deskripsi Produk</p>\r\n\r\n<p>Kami melakukan setiap usaha untuk menampilkan setiap informasi dan warna dari produk kami di website seakurat mungkin. Tetapi dikarenakan oleh tidak konsistennya display warna di monitor komputer dari berbagai merek yang tersedia, warna yang ditampilkan dapat terlihat berbeda</p>\r\n\r\n<p>Kebijakan Privasi</p>\r\n\r\n<p>Informasi Anda aman bersama kami. Kami memahami bahwa privacy sangat penting bagi pelanggan kami. Kami memastikan bahwa setiap informasi yang Anda kirimkan kepada kami tidak akan disalahgunakan, ataupun dijual kepada pihak lain. Kami hanya akan menggunakan informasi pribadi Anda untuk melengkapi pesanan Anda.</p>\r\n\r\n<p>Kebijakan Harga</p>\r\n\r\n<p>Beatrice Clothing mempunyai hak untuk menyesuaikan harga dari produk kami secara berkala. Semua harga yang tercantum di website ini dalam mata uang Rupiah (IDR). Jika dikarenakan oleh sesuatu hal terdapat kesalahan harga, kami mempunyai hak untuk tidak memproses order Anda. Biaya pengiriman akan ditagihkan tergantung dari alamat tujuan pelanggan dan akan ditambahkan secara otomatis dan ditampilkan pada saat Checkout.</p>\r\n\r\n<p>Kebijakan Pengembalian/Penukaran</p>\r\n\r\n<p>Barang Beatrice Clothing tidak menerima pengembalian barang yang disebabkan oleh kekecilan atau kebesaran. Sebab detail ukuran produk sudah dicantumkan pada detail produk dan kami berharap customer bisa menyesuaikan dengan kebutuhannya. Pengembalian/penukaran barang hanya dapat dilakukan apabila terdapat cacat produksi pada produk yang kami kirim dengan syarat produk masih dalam keadaan baik (selain cacat produksi tersebut), belum dicuci, dan price tag masih menggantung. Detail pengiriman untuk pengembalian/penukaran akan dilakukan via pesan singkat (chat) atau e-mail. Beatrice Clothing berhak memutuskan bahwa produk cacat tersebut bukan merupakan cacat produksi apabila menemukan hal-hal yang janggal.</p>\r\n\r\n<p>Produk yang dibeli pada saat event/promo/sale tidak dapat ditukar/dikembalikan</p>\r\n\r\n<p>Persetujuan Anda setuju bahwa Anda akan bertanggungjawab atas setiap aktivitas Anda di dalam website ini. Jika kami mengetahui Anda sedang atau telah melakukan aktivitas yang dilarang atau melanggar Syarat dan Ketentuan, kami dapat menolak akses Anda ke website ini secara temporer atau permanen.</p>\r\n\r\n<p>Resiko Kehilangan</p>\r\n\r\n<p>Semua barang yang dibeli dari kami dibuat sesuai dengan kontrak pengiriman. Ini berarti bahwa resiko kehilangan dari barang tersebut menjadi tanggung jawab Anda setelah kami melakukan pengiriman kepada ekspedisi. Kami akan bertanggungjawab atas kehilangan tersebut jika kami melanggar syarat dan ketentuan yang berlaku.</p>\r\n\r\n<p>Kompensasi</p>\r\n\r\n<p>Anda setuju untuk memberikan kompensasi secara penuh terhadap semua tuntutan, pengeluaran, kerusakan, kehilangan, termasuk biaya hukum yang timbul dari setiap pelanggaran syarat dan ketentuan yang dilakukan oleh Anda, termasuk penggunaan dari orang lain yang mengakses website ini menggunakan Account Internet Anda secara langsung maupun tidak langsung.</p>\r\n\r\n<p>Komunikasi Elektronik</p>\r\n\r\n<p>Ketika Anda melakukan registrasi di website kami, artinya Anda telah setuju bahwa kami dapat mengirimkan update kami dan email promosi. Jika Anda mengharapkan untuk tidak mengikuti newsletters kami, Anda dapat menekan tombol Unsubscribe.</p>\r\n\r\n<p>Promo Kode Diskon</p>\r\n\r\n<p>Kami dapat menawarkan Promo Kode Diskon secara berkala yang dapat digunakan untuk melakukan pembelian melalui website ini sesuai dengan syarat dan ketentuan yang berlaku.</p>\r\n\r\n<p>Sign Up Anda</p>\r\n\r\n<p>tidak perlu melakukan sign up sebagai tamu atau member untuk melakukan pembelian pada saat check out. Tetapi sign up akan memberikan keuntungan lebih seperti newsletter, event, dan update terhadap semua aktivitas dan transaksi yang ada.</p>', 'contract.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat`, `hp`, `email`, `password`, `id_ongkir`) VALUES
(1, 'Rafli Fadhlika', 'Perum, Talaga Bestari Blok G1/10 Rt03/03', '081319099502', 'raflifadhlika27@gmail.com', 'cf22d232a7ec40091c8f8b9347d85254501c1741', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_invoice`, `tgl_pembayaran`, `total_bayar`, `bank`, `bukti`) VALUES
(1, 1, '0000-00-00', 2510000, '6630429978', 'Bukti-Transfer-ATM-BCA.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_stok` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `jumlah_stok`, `deskripsi`, `foto`) VALUES
(1, 1, 'Realme 5s', 2500000, 4, 'Fitur menarik, dan harga terjangkau', '659-realme-5s-f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id_social` int(11) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`id_social`, `youtube`, `instagram`, `facebook`) VALUES
(1, 'https://www.youtube.com/', 'https://www.instagram.com/', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_invoice`, `id_produk`, `qty`, `total`) VALUES
(1, 2, 1, 1, 2500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `foto`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'foto1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id_social`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
