-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 12:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus-wb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notlp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `role` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `mime` varchar(100) NOT NULL,
  `foto` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(17, 'Azka Dini Yuntari', '081973249144', 'azkady1930@gmail.com', 'Alam Baka Perum Puri Pesona Blok B14 RT009/RW004 Kel.Bojong Pondok Terong Kec.Cipayung Kota Depok', 'admin', 'azkady', 'faf4d8af357337ba9360ac9e4ec21fce9bcb7f43', 'image/jpeg','', '2020-04-05 09:52:55');
INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(41, 'Hazza Intan Tuhbaruni', '0973862632', 'hazzaintan99@gmail.com', 'Perum Puri Pesona Blok B14 RT009/RW004 Kel.Bojong Pondok Terong Kec.Cipayung Kota Depok', 'admin', 'hazza', '80554f03601509ecd7e6266169d7adea29fa792d', 'image/jpeg', '','2020-04-03 05:39:20');
INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(43, 'Nurul Amala Azza', '098765445', 'mala@gmail.com', 'Citayam', 'admin', 'mala', 'c02c8e4776c5a2135fa88f31652b8d79b81a437a', 'image/jpeg','', '2020-03-30 13:57:52');
INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(44, 'Helmi Adi Pratama', '098765', 'helmi@gmail.com', 'Jakarta', 'admin', 'helmi', '47a659829cb18bbffe5d21f3627694531f64035d', 'image/jpeg','', '2020-03-30 15:27:50');
INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(45, 'Azka Dini kuy', '081973249144', 'azkady1930@gmail.com', 'Alam BAKA Perum Puri Pesona Blok B14 RT009/RW004 Kel.Bojong Pondok Terong Kec.Cipayung Kota Depok', 'admin', 'aaazkady', 'b56c2440320bf59ad484aef55fbb0a98c577805f', 'image/jpeg','', '2020-04-03 13:37:20');
INSERT INTO `admin` (`id_admin`, `nama`, `notlp`, `email`, `alamat`, `role`, `username`, `password`, `mime`, `foto`, `timestamp`) VALUES
(46, 'Agnia Putri Firdaus', '0987654321', 'asdnia@gmail.com', 'Perum Puri Pesona Blok B14 RT009/RW004 Kel.Bojong Pondok Terong Kec.Cipayung Kota Depok', 'admin', 'agnia', '2a810abf6f26d42f2d71521dc9de78b830e700a4', 'image/jpeg','', '2020-04-05 09:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `no_anggota` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no_anggota`, `nama`, `password`, `kelas`, `email`, `no_telpon`, `alamat`, `foto`) VALUES
('1322347455', 'azka', '7091092255ebc28ebc48ac45b2dbc0bfeff9c1ca', 'ccit 6b', 'azka@gmail.com', '098765', 'Citayam', '');
INSERT INTO `anggota` (`no_anggota`, `nama`, `password`, `kelas`, `email`, `no_telpon`, `alamat`, `foto`) VALUES
('4817040341', 'Sato Takeru', '$2y$14$kefF6aqkuOEWo7CIFduNf.7O8BuGR4uWrIAFcHWm2u99OcLPDFWOe', 'CCIT 6B', 'sato@gmail.com', '09876543', 'Kyoto', '');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `no_katalog` varchar(10) NOT NULL,
  `no_klasifikasi` varchar(10) NOT NULL,
  `no_koleksi` varchar(4) NOT NULL,
  `jenis_katalog` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `kota_terbit` varchar(20) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `absktrak` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `e_book` longblob NOT NULL,
  `cover` longblob NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`no_katalog`, `no_klasifikasi`, `no_koleksi`, `jenis_katalog`, `judul`, `pengarang`, `penerbit`, `kota_terbit`, `tahun_terbit`, `isbn`, `lokasi`, `absktrak`, `tanggal_masuk`, `e_book`, `cover`, `stok`) VALUES
('001', '2', '2', 'Buku Fisik', 'DILAN dia adalah Dilanku 1990', 'Pidi Baiq', 'Mizan', 'Jakarta', '2014', '12345679', 'Rak 1', 'Milea (Vanesha Prescilla) bertemu dengan Dilan (Iqbaal Ramadhan) di sebuah SMA di Bandung. Itu adalah tahun 1990, saat Milea pindah dari Jakarta ke Bandung. Perkenalan yang tidak biasa kemudian membawa Milea mulai mengenal keunikan Dilan lebih jauh. Dilan yang pintar, baik hati dan romantis... semua dengan caranya sendiri. Cara Dilan mendekati Milea tidak sama dengan teman-teman lelakinya yang lain, bahkan Beni, pacar Milea di Jakarta. Bahkan cara berbicara Dilan yang terdengar kaku, lambat laun justru membuat Milea kerap merindukannya jika sehari saja ia tak mendengar suara itu. Perjalanan hubungan mereka tak selalu mulus. Beni, gank motor, tawuran, Anhar, Kang Adi, semua mewarnai perjalanan itu. Dan Dilan... dengan caranya sendiri...selalu bisa membuat Milea percaya ia bisa tiba di tujuan dengan selamat. Tujuan dari perjalanan ini. Perjalanan mereka berdua. Katanya, dunia SMA adalah dunia paling indah. Dunia Milea dan Dilan satu tingkat lebih indah daripada itu.', '2020-04-04', '','', 10);
INSERT INTO `katalog` (`no_katalog`, `no_klasifikasi`, `no_koleksi`, `jenis_katalog`, `judul`, `pengarang`, `penerbit`, `kota_terbit`, `tahun_terbit`, `isbn`, `lokasi`, `absktrak`, `tanggal_masuk`, `e_book`, `cover`, `stok`) VALUES
('002', '2', '2', 'E-Book', 'Jackson', 'Pinurbo', 'Media', 'Depok', '2018', '0987654', 'Rak 2', 'Paragraf adalah bagian dari suatu karangan yang terdiri atas sejumlah kalimat yang mengungkapkan satuan informasi dengan ide pokok sebagai pengendalinya (Ramlan). Paragraf adalah serangkaian kalimat yang saling bertalian untuk membuat sebuah ide atau gagasan baru (Handayani dkk)', '2020-04-04','','', 1);
INSERT INTO `katalog` (`no_katalog`, `no_klasifikasi`, `no_koleksi`, `jenis_katalog`, `judul`, `pengarang`, `penerbit`, `kota_terbit`, `tahun_terbit`, `isbn`, `lokasi`, `absktrak`, `tanggal_masuk`, `e_book`, `cover`, `stok`) VALUES
('003', '2', '2', 'Buku Fisik dan E-Book', 'Dicekik Kata-kata', 'Amalazza', 'Indie', 'Bogor', '2019', '12345677', 'Rak 2', 'Paragraf adalah bagian dari suatu karangan yang terdiri atas sejumlah kalimat yang mengungkapkan satuan informasi dengan ide pokok sebagai pengendalinya (Ramlan). Paragraf adalah serangkaian kalimat yang saling bertalian untuk membuat sebuah ide atau gagasan baru (Handayani dkk)', '2020-04-04','','', 2);
INSERT INTO `katalog` (`no_katalog`, `no_klasifikasi`, `no_koleksi`, `jenis_katalog`, `judul`, `pengarang`, `penerbit`, `kota_terbit`, `tahun_terbit`, `isbn`, `lokasi`, `absktrak`, `tanggal_masuk`, `e_book`, `cover`, `stok`) VALUES
('99345679', '1', '2', 'Buku Fisik dan E-Book', 'My Self', 'zka.dy', 'gramedia', 'Depok', '2020', '1234567', 'Depok', 'Misal kita ingin memotong teks pada posisi tertentu dan ditambahkan tiga titik dibelakangnya. Contoh dibawah ini akan mengambil 50 huruf pertama dengan hasil apa adanya dan ditambahkan tiga titik dibelakangnya.', '2020-04-05','','', 3);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `no_klasifikasi` varchar(10) NOT NULL,
  `nama_klasifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`no_klasifikasi`, `nama_klasifikasi`) VALUES
('1', 'buku referensi'),
('2', 'buku non referensi');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `no_koleksi` varchar(4) NOT NULL,
  `jenis_koleksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`no_koleksi`, `jenis_koleksi`) VALUES
('1', 'biografi'),
('2', 'fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_kunjungan` int(11) NOT NULL,
  `waktu_kunjungan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_anggota` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`no_kunjungan`, `waktu_kunjungan`, `no_anggota`) VALUES
(27, '2020-03-30 10:28:36', '1322347455'),
(29, '2020-04-03 07:53:40', '1322347455'),
(30, '2020-04-03 08:16:30', '1322347455'),
(31, '2020-04-03 08:29:23', '1322347455'),
(32, '2020-04-03 08:34:03', '1322347455'),
(33, '2020-04-03 08:35:07', '1322347455'),
(34, '2020-04-03 08:35:55', '1322347455'),
(35, '2020-04-03 08:36:16', '4817040341'),
(37, '2020-04-05 03:30:13', '4817040341'),
(38, '2020-04-05 03:30:41', '1322347455');

-- --------------------------------------------------------

--
-- Table structure for table `logadmin`
--

CREATE TABLE `logadmin` (
  `id_log_admin` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `activity` varchar(1000) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logadmin`
--

INSERT INTO `logadmin` (`id_log_admin`, `id_admin`, `activity`, `tanggal`) VALUES
(1, 17, 'Azka Dini Yuntari menambahkan admin Hazza Intan Tu', '2020-03-30 06:18:16'),
(2, 17, 'Azka Dini Yuntari menambahkan admin Hazza Intan Tu', '2020-03-30 06:20:16'),
(3, 17, 'Azka Dini Yuntari menambahkan admin Hazza Intan Tuhbaruni', '2020-03-30 06:21:48'),
(4, 17, 'Azka Dini Yuntari menambahkan admin bismillah', '2020-03-30 06:27:19'),
(5, 17, 'Azka Dini Yuntari mengubah data profile admin bismillah bisaaa', '2020-03-30 06:28:07'),
(6, 17, 'Azka Dini Yuntari menghapus data profile admin ', '2020-03-30 06:28:29'),
(7, 41, 'Hazza Intan Tuhbaruni mengubah data profile admin Hazza Intan Tuhbaruni uye', '2020-03-30 10:43:32'),
(8, 41, 'Hazza Intan Tuhbaruni mengubah data profile admin Hazza Intan Tuhbaruni', '2020-03-30 10:44:02'),
(9, 17, 'Azka Dini Yuntari menambahkan admin Nurul Amala Azza', '2020-03-30 13:57:53'),
(10, 17, 'Azka Dini Yuntari menghapus data profile admin ', '2020-03-30 14:01:17'),
(11, 17, 'Azka Dini Yuntari mengubah data profile admin Joko Pinurbo', '2020-03-30 14:01:38'),
(12, 17, 'Azka Dini Yuntari mengubah data profile admin Joko Pinurbo', '2020-03-30 14:01:58'),
(13, 17, 'Azka Dini Yuntari mengubah data profile admin Joy RV', '2020-03-30 14:41:35'),
(14, 17, 'Azka Dini Yuntari menambahkan admin Helmi Adi Pratama', '2020-03-30 15:27:50'),
(15, 17, 'Azka Dini Yuntari menghapus data profile admin ', '2020-04-03 05:36:02'),
(16, 17, 'Azka Dini Yuntari menambahkan admin Azka Dini Yuntari yyy', '2020-04-03 07:54:47'),
(17, 17, 'Azka Dini Yuntari mengubah data profile admin Azka Dini yyy', '2020-04-03 08:07:54'),
(18, 17, 'Tendo Kairi berkunjung ke perpus dan dilayani oleh admin Azka Dini Yuntari', '2020-04-03 13:35:55'),
(19, 17, 'Tendo Kairi berkunjung ke perpus dan dilayani oleh admin Azka Dini Yuntari', '2020-04-03 13:36:16'),
(20, 17, 'Azka Dini Yuntari mengubah data profile admin Azka Dini kuy', '2020-04-03 13:37:20'),
(21, 17, 'Tendo Kairi berkunjung ke perpus dan dilayani oleh admin Azka Dini Yuntari', '2020-04-03 13:39:59'),
(22, 17, 'Sato Takeru berkunjung ke perpus dan dilayani oleh admin Azka Dini Yuntari', '2020-04-05 03:30:13'),
(23, 17, 'Sato Takeru berkunjung ke perpus dan dilayani oleh admin Azka Dini Yuntari', '2020-04-05 03:30:41'),
(24, 17, 'Azka Dini Yuntari menambahkan admin Agnia Putri Firdaus', '2020-04-05 03:32:16'),
(25, 17, 'Azka Dini Yuntari mengubah data profile admin Agnia Putri Firdaus', '2020-04-05 09:51:09'),
(26, 17, 'Azka Dini Yuntari mengubah data profile admin Agnia Putri Firdaus', '2020-04-05 09:51:30'),
(27, 17, 'Azka Dini Yuntari mengubah data profile admin Azka Dini Yuntari', '2020-04-05 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `loganggota`
--

CREATE TABLE `loganggota` (
  `id_log_anggota` int(11) NOT NULL,
  `no_anggota` varchar(20) NOT NULL,
  `activity` varchar(1000) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `no_peminjaman` int(11) NOT NULL,
  `no_anggota` varchar(11) NOT NULL,
  `no_katalog` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `batas_kembali` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterlambatan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perpanjangan`
--

CREATE TABLE `perpanjangan` (
  `hari` int(11) NOT NULL,
  `batas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` bigint(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`) VALUES
(1234567868, 'mala', 'ccit 5b'),
(1322347455, 'azka', 'ccit 6b'),
(4817040424, 'ufairoh nabihah', 'ccit 6b'),
(8417040401, 'haydar', 'ccit5b');

-- --------------------------------------------------------

--
-- Table structure for table `tahunterbit`
--

CREATE TABLE `tahunterbit` (
  `id_thn` int(11) NOT NULL,
  `thn_terbit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunterbit`
--

INSERT INTO `tahunterbit` (`id_thn`, `thn_terbit`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`no_katalog`),
  ADD KEY `no_klasifikasi` (`no_klasifikasi`),
  ADD KEY `no_koleksi` (`no_koleksi`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`no_klasifikasi`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`no_koleksi`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`no_kunjungan`),
  ADD KEY `no_anggota` (`no_anggota`);

--
-- Indexes for table `logadmin`
--
ALTER TABLE `logadmin`
  ADD PRIMARY KEY (`id_log_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `loganggota`
--
ALTER TABLE `loganggota`
  ADD PRIMARY KEY (`id_log_anggota`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `no_katalog` (`no_katalog`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tahunterbit`
--
ALTER TABLE `tahunterbit`
  ADD PRIMARY KEY (`id_thn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `logadmin`
--
ALTER TABLE `logadmin`
  MODIFY `id_log_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `loganggota`
--
ALTER TABLE `loganggota`
  MODIFY `id_log_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahunterbit`
--
ALTER TABLE `tahunterbit`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_ibfk_1` FOREIGN KEY (`no_klasifikasi`) REFERENCES `klasifikasi` (`no_klasifikasi`),
  ADD CONSTRAINT `katalog_ibfk_2` FOREIGN KEY (`no_koleksi`) REFERENCES `koleksi` (`no_koleksi`);

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logadmin`
--
ALTER TABLE `logadmin`
  ADD CONSTRAINT `logadmin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`no_katalog`) REFERENCES `katalog` (`no_katalog`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
