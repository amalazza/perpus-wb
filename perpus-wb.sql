-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 03:44 AM
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
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(5, 'mala', '$2y$14$kefF6aqkuOEWo7CIFduNf.7O8BuGR4uWrIAFcHWm2u99OcLPDFWOe');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `no_anggota` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no_anggota`, `nama`, `password`, `kelas`, `email`, `no_telpon`, `alamat`, `foto`) VALUES
('4817040347', 'Nurul Amala Azza', 'malacantik', 'CCIT 6B', 'mala@gmail.com', '0895332220388', 'Citayam', 0x6164612d2074696e6767616c2067616e746920746970652064617461),
('4817040348', 'Tendo Kairi', 'pacarnyamala', 'CCIT 6B', 'tendo@gmail.com', '045678933', 'Jepang', 0x7365737561696b616e207469706520646174612e);

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
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `kota_terbit` varchar(20) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `absktrak` varchar(500) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `e-book` varchar(500) NOT NULL,
  `cover` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `no_klasifikasi` varchar(10) NOT NULL,
  `nama_klasifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `no_koleksi` varchar(4) NOT NULL,
  `jenis_koleksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_kunjungan` int(11) NOT NULL,
  `waktu_kunjungan` datetime NOT NULL,
  `no_anggota` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`no_kunjungan`, `waktu_kunjungan`, `no_anggota`) VALUES
(18, '2020-03-22 02:51:31', '4817040348'),
(19, '2020-03-22 02:53:12', '4817040348'),
(22, '2020-03-22 03:37:43', '4817040348'),
(23, '2020-03-22 03:38:18', '4817040348'),
(24, '2020-03-22 03:38:26', '4817040347');

-- --------------------------------------------------------

--
-- Table structure for table `log-admin`
--

CREATE TABLE `log-admin` (
  `id_log_admin` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log-anggota`
--

CREATE TABLE `log-anggota` (
  `id_log_anggota` int(11) NOT NULL,
  `no_anggota` varchar(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
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
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `log-admin`
--
ALTER TABLE `log-admin`
  ADD PRIMARY KEY (`id_log_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `log-anggota`
--
ALTER TABLE `log-anggota`
  ADD PRIMARY KEY (`id_log_anggota`),
  ADD KEY `no_anggota` (`no_anggota`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `no_katalog` (`no_katalog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`);

--
-- Constraints for table `log-admin`
--
ALTER TABLE `log-admin`
  ADD CONSTRAINT `log-admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `log-anggota`
--
ALTER TABLE `log-anggota`
  ADD CONSTRAINT `log-anggota_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`);

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
