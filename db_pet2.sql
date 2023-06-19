-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 03:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pet2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopsi`
--

CREATE TABLE `adopsi` (
  `id` int(11) NOT NULL,
  `pet` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(30) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopsi`
--

INSERT INTO `adopsi` (`id`, `pet`, `nama`, `notelp`, `waktu`, `pesan`) VALUES
(1, '15', 'Bryan', '08123434544', '2023-06-21T23:02', 'Oke'),
(2, '18', 'Joko', '81336766761', '2023-06-10T14:07', 'kuat'),
(3, '17', 'Loki', '09127232343', '2023-06-15T14:06', 'Oke'),
(4, '19', 'Koki', '08133434', '2023-06-10T14:09', 'Siap');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `notelp`, `alamat`) VALUES
(1, 'Bryan', '08134573638', 'Kembang Kuning'),
(2, 'Aisyah', '081233434534', 'Gubeng'),
(3, 'Bryan', '123233', 'kembangkuning'),
(4, 'Hari', '2341223434', 'Ujung Kulon'),
(8, 'Jokowi', '812346296', 'Solo'),
(9, 'Yazud', '9213324333', 'Konoha makmur no,56'),
(10, 'Lahad bin Sufyan', '8134627434', 'Jalan Quiras no.12'),
(11, 'Samuel Jaimal', '815647263', 'Pekalongan Timur'),
(12, 'Bryan Syahputra', '81336766761', 'Karah tama no.54'),
(13, 'Hakam', '762532323', 'Wonosobo'),
(14, 'Firman', '813365423', 'Kalimas');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kucing'),
(2, 'Anjing'),
(4, 'Kelinci');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(5) NOT NULL,
  `kategori_ID` int(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `umur` int(15) DEFAULT NULL,
  `vaksin` varchar(20) NOT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `kategori_ID`, `nama`, `umur`, `vaksin`, `deskripsi`, `img`) VALUES
(15, 1, 'Altair Zunkanair', 12, '2', 'Jenis Persia Langka Sangar Lucu', 'kucing1.jpg'),
(16, 1, 'Altair ibn-La’Ahad', 18, '3', 'Patang Menyerah dan rendah hati', 'kucing2.jpg'),
(17, 1, 'Ezia Auditore da Firenze', 6, '2', 'Paling hebat kalau nyerang', 'kucing3.jpg'),
(18, 2, 'Burhan Jainal', 12, '3', 'Lucu dan tidak bisa diam', 'anjang1.jpg'),
(19, 2, 'Thomas Hobbs', 12, '3', 'Pemikir yang handal', 'anjing1.jpg'),
(20, 1, 'Ahsa', 12, '2', 'Lucu', 'kucing6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `reservasi` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `waktu` varchar(26) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pesan` varchar(1000) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `reservasi`, `nama`, `notelp`, `waktu`, `alamat`, `pesan`, `status`) VALUES
(2, 'penitipan', 'Joko', '081336766761', '2023-06-02T14:06', 'Kampus', 'Oke', 'Waiting'),
(6, 'konsultasi', 'Jokowi', '0812346296', '2023-06-03T16:49', 'Solo', 'Sakit Parah Anabul saya', 'Waiting'),
(7, 'penitipan', 'Yazud', '09213324333', '2023-06-12T20:49', 'Konoha makmur no,56', 'Perlu menitipkan anabul saya', 'Done'),
(8, 'konsultasi', 'Lahad bin Sufyan', '08134627434', '2023-06-12T19:51', 'Jalan Quiras no.12', 'Lebih cepat lebih baik', 'Waiting'),
(9, 'konsultasi', 'Samuel Jaimal', '0815647263', '2023-06-12T19:50', 'Pekalongan Timur', 'Hebat', 'Done'),
(12, 'konsultasi', 'Bryan Syahputra', '081336766761', '2023-06-13T01:27', 'Karah tama no.54', 'Segera', 'Waiting'),
(13, 'grooming', 'Hakam', '0762532323', '2023-06-14T15:16', 'Wonosobo', 'Keren', 'Waiting'),
(14, 'penitipan', 'Firman', '0813365423', '2023-06-14T15:17', 'Kalimas', 'Oke', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$PjNN/0TjocEzf2RvbFMXBeaEu6VGETsZHXFhKrAeIws/fsis8zrku'),
(2, 'admin1', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_FK` (`kategori_ID`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopsi`
--
ALTER TABLE `adopsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `produk_FK` FOREIGN KEY (`kategori_ID`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
