-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 12:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiimahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `KodeJurusan` varchar(20) NOT NULL,
  `NamaJurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `KodeJurusan`, `NamaJurusan`) VALUES
(4, 'J004', 'Teknologi Informasi'),
(5, 'J001', 'Teknik Mesin'),
(6, 'J002', 'Teknik Sipil'),
(7, 'J003', 'Teknik Elektro'),
(8, 'J005', 'Administrasi Niaga'),
(9, 'J006', 'Akuntansi'),
(10, 'J007', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jekel` char(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jekel`, `tgllahir`, `id_jurusan`, `id_prodi`, `email`, `alamat`, `foto`) VALUES
(9, '1911082002', 'Nabila', 'P', '2001-05-26', 4, 23, 'nabila@gmail.com', 'Jalan Merdeka', 'hijab muslimah.png');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `id_jurusan`, `prodi`, `keterangan`) VALUES
(9, 5, 'D.3 Teknik Mesin', 'Teknik Mesin'),
(10, 5, 'D.3 Teknik Alat Berat', 'Teknik Alat Berat'),
(11, 5, 'D4 Teknik Manufaktur', 'Teknik Manufaktur'),
(12, 6, 'D3 Teknik Sipil', 'Teknik Sipil'),
(13, 6, 'D4 Teknik Perencanaan Irigasi dan Rawa', 'Teknik Perencanaan Irigasi dan Rawa'),
(14, 6, 'D4 Manajemen Rekayasa Konstruksi', 'Manajemen Rekayasa Konstruksi'),
(15, 6, 'D4 Perancangan Jalan dan Jembatan', 'Perancangan Jalan dan Jembatan'),
(16, 7, 'D.3 Teknik Listrik', 'Teknik Listrik'),
(17, 7, 'D.3 Teknik Elektronika', 'Teknik Elektronika'),
(18, 7, 'D.3 Teknik Telekomunikasi', 'Teknik Telekomunikasi'),
(19, 7, 'D.4 Teknik Elektronika', 'Teknik Elektronika'),
(20, 7, 'D.4 Teknik Telekomunikasi', 'Teknik Telekomunikasi'),
(21, 4, 'D3 Teknik Komputer', 'Teknik Komputer'),
(22, 4, 'D3 Manajemen Informatika', 'Manajemen Informatika'),
(23, 4, 'D4 Teknologi Rekayasa Perangkat Lunak', 'Teknologi Rekayasa Perangkat Lunak'),
(24, 8, 'D.3 Administrasi Bisnis', 'Administrasi Bisnis'),
(25, 8, 'D.3 Usaha Perjalanan Wisata', 'Usaha Perjalanan Wisata'),
(26, 8, ' D3 Pariwisata', 'Pariwisata'),
(27, 9, 'D.3 Akuntansi', 'Akuntansi'),
(28, 9, 'D.4 Akuntansi', 'Akuntansi'),
(29, 10, 'D.3 Bahasa Inggris', 'Bahasa Inggris'),
(30, 10, 'D4 Bahasa Inggris', 'Bahasa Inggris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idJurusan` (`id_jurusan`),
  ADD KEY `idJurusan_2` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
