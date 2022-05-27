-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 01:01 PM
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
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas` int(10) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas`, `nama_fasilitas`, `deskripsi`, `foto`) VALUES
(1, 'danau', 'luas dan cantik ', 'kamar_1.jpg'),
(2, 'kolam renang', 'airnya jernih', 'th-697411354.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas_kamar` int(10) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas_kamar`, `id_tipe_kamar`, `nama_fasilitas`) VALUES
(17, 1, 'kasur '),
(18, 1, 'kulkas '),
(19, 2, 'lemari');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(10) NOT NULL,
  `nomor_kamar` varchar(10) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `id_tipe_kamar`, `deskripsi`, `foto`) VALUES
(16, '111', 1, 'bagus', 'hotel.jpeg'),
(17, '222', 2, 'lucu banget', 'kamar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `cek-in` date NOT NULL,
  `cek-out` date NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `jumlah_kamar` int(10) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `total` bigint(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `status` enum('pending','check-in','check-out','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `cek-in`, `cek-out`, `id_tipe_kamar`, `jumlah_kamar`, `harga`, `total`, `nik`, `nama`, `email`, `no_tlp`, `status`) VALUES
(3, '2022-05-17', '2022-05-20', 1, 2, 200000, 600000, '2147483647', 'Fany Muhammad Fahmi Kamilah', 'fahmikamilah@gmail.com', '0895636980792', 'check-out'),
(4, '2022-05-19', '2022-05-23', 2, 1, 20000000, 80000000, '1928399928', 'Dea Nur Amanda Sari', 'deanur03@gmail.com', '083823241720', 'check-in'),
(5, '2022-05-19', '2022-05-21', 2, 3, 60000000, 120000000, '123', 'mia septiami', 'miaseptiami30@gmail.com', '0895333452402', 'check-in'),
(6, '2022-05-20', '2022-05-22', 2, 2, 40000000, 80000000, '0987653773', 'ikahkomalasari', 'ikahks@mail.com', '08966677555', 'check-in'),
(7, '2022-05-20', '2022-05-21', 3, 6, 600000, 600000, '0987653773', 'mia', 'miaseptiami30@gmail.com', '08654677', 'check-out'),
(8, '2022-05-20', '2022-05-21', 1, 2, 200000, 200000, '0987653773', 'mia', 'miaseptiami30@gmail.com', '12345', 'check-in'),
(9, '2022-05-21', '2022-05-20', 1, 3, 300000, -300000, '0987653773', 'ikahkomalasari', 'ikah30@gmail.com', '098765753222', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(2, 'resepsionis', '202cb962ac59075b964b07152d234b70', 'resepsionis', 'resepsionis'),
(3, 'ikah', '202cb962ac59075b964b07152d234b70', 'ikah', 'admin'),
(4, 'mia', '202cb962ac59075b964b07152d234b70', 'mia', 'admin'),
(5, 'yanti', '202cb962ac59075b964b07152d234b70', 'yanti', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_tipe_kamar` varchar(128) NOT NULL,
  `harga_tipe_kamar` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe_kamar`, `nama_tipe_kamar`, `harga_tipe_kamar`) VALUES
(1, 'deluxe', 100000),
(2, 'presidential', 20000000),
(3, 'superior', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_kamar`),
  ADD KEY `fasilitas_kamar_ibfk_1` (`id_tipe_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kamar_ibfk_1` (`id_tipe_kamar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `reservasi_ibfk_1` (`id_tipe_kamar`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
