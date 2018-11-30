-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 11:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('p','l') COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
(141112691, 'Fajar Setiawan Siagian', 'Medan', '1996-05-30', 'l', 'Teknik Informatika'),
(141112692, 'Adinda Putri Hutagalung', 'Lubuk Pakam', '2000-09-12', 'p', 'Teknik Listrik'),
(141112693, 'adelia damanik', 'medan', '1998-11-10', 'l', 'Teknik Kimia Industri'),
(141112699, 'Satrio Hidayat Purba', 'Balige', '1999-09-02', 'p', 'Matematika Terapan');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_terbit` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak 1','rak 2','rak 3','rak 4') COLLATE utf8_unicode_ci NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
('1ad16711-12f7-44d3-b956-9df694d98466', 'Bagaimana Memotret Landscape', 'Si tukang Photo', 'photosaja', '2017', '77621919jjhh', 5, 'rak 3', '2018-11-01'),
('441a8b9a-a043-466c-9b22-d82724b96cc9', 'Belajar PHP Dasar Jilid 2', 'S pairman & fajar', 'Komputer Media', '2012', '11212sssa6', 4, 'rak 1', '2018-11-10'),
('92ecdc0f-54bb-4c1a-9108-7eb2eceafbde', 'memasak masakan indonesia modern', 'chef fajar itu', 'bukumasak', '2010', '9878098880', 5, 'rak 1', '0000-00-00'),
('9d977dfd-25bc-4684-8da9-5cb72a925b0e', 'Belajar Memasak', 'Ibuk tukang masak', 'Eleksaja', '2016', '998210jhjhj', 3, 'rak 2', '2018-11-01'),
('b671dfaf-f108-4489-a0f2-1c3f4742197d', 'Mengarang Bebas dan Sebebas bebasnya', 'ibu idah aja', 'hikmatul fadhillah', '2017', '98881771717', 5, 'rak 3', '2018-11-10'),
('f26f1a1d-16ab-4127-8b69-f6e3ffa08f06', 'cara menjadi dewa', 'komik', 'komik1', '2016', '887777898771', 0, 'rak 1', '2018-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_buku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nim` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('kembali','pinjam') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `nim`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('1c5074ca-dabf-45cf-83f3-2d4ab2edf9c3', 'f26f1a1d-16ab-4127-8b69-f6e3ffa08f06', 141112691, '2018-11-24', '2018-12-01', 'kembali'),
('36fec6ee-9101-4a1c-b276-b396b6ab84f9', '9d977dfd-25bc-4684-8da9-5cb72a925b0e', 141112692, '2018-11-24', '2018-12-08', 'pinjam'),
('d6828181-eef5-4f6a-bd00-920376e1aa9d', 'f26f1a1d-16ab-4127-8b69-f6e3ffa08f06', 141112699, '2018-11-27', '2018-12-11', 'pinjam'),
('eb4ecaa9-e07d-49f9-b5ef-5158417c4176', '1ad16711-12f7-44d3-b956-9df694d98466', 141112693, '2018-11-16', '2018-11-20', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `foto`, `status`, `tgl_dibuat`) VALUES
('79618aaa-a701-44ce-9599-fc19187f420b', 'admin', 'admin', 'admin', 'admin', '', 'enable', '2018-11-30 16:07:56'),
('9c45c020-88ae-421e-b508-aab1462210ee', 'user', 'user', 'user', 'user', '', 'enable', '2018-11-30 16:07:56'),
('a8b604f5-7c59-4799-874e-48801d0600df', 'fajar', 'fajar', 'fajar', 'user', '', 'enable', '2018-11-30 16:08:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
