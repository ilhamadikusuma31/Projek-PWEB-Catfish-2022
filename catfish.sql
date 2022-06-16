-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 12:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catfish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'ilhamketiga', '$2y$10$Jjv7n//qAD39Ka6FzvCNJeLZ9/9NhbW2gq0HXzNyDXknB1T0POfji'),
(5, 'ilham', '$2y$10$iUohKvR9K0CU8evbnXWP7uJVt40xOJSWXkmuHQIHAtea8.4F7HUk6'),
(6, 'marizka', '$2y$10$pAP1Vz2TBXdA7FYyIZ1RBehZoVAnJPNf8SI9K2qlFlLhbGAzbjzA.');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jenis_aktivitas` int(50) NOT NULL,
  `id_karyawan` int(50) NOT NULL,
  `id_kolam` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `tanggal`, `id_jenis_aktivitas`, `id_karyawan`, `id_kolam`) VALUES
(1, '2022-06-07', 3, 32, 4),
(2, '2022-04-09', 1, 31, 4),
(3, '2022-07-02', 1, 31, 4),
(4, '2022-07-02', 1, 31, 4),
(5, '2022-06-17', 3, 31, 4),
(6, '2022-06-11', 2, 43, 4),
(7, '2022-06-11', 2, 43, 4),
(8, '2022-06-11', 2, 43, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aktivitas`
--

CREATE TABLE `jenis_aktivitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_aktivitas`
--

INSERT INTO `jenis_aktivitas` (`id`, `nama`) VALUES
(1, 'pembibitan'),
(2, 'panen'),
(3, 'perawatan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `nama`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telpon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_lengkap`, `id_jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_telpon`) VALUES
(31, 'juki', 1, '2022-06-11', '123123', '123123'),
(32, 'ronaldinho gauch', 1, '2022-06-17', '12313', '123123'),
(43, 'ilham', 1, '2000-01-10', 'jl.apel', '08123456789'),
(44, 'marizka', 2, '2022-06-04', 'jl.jeruk', '0123456789'),
(46, 'bambangs', 1, '0000-00-00', 'jl.jeruk', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `kolam`
--

CREATE TABLE `kolam` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(225) NOT NULL,
  `id_lele` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kolam`
--

INSERT INTO `kolam` (`id`, `nama`, `jumlah`, `id_lele`) VALUES
(4, 'kolam merah', 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lele`
--

CREATE TABLE `lele` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lele`
--

INSERT INTO `lele` (`id`, `nama`) VALUES
(1, 'pyhton'),
(2, 'dumbo'),
(3, 'masamo'),
(4, 'mutiara'),
(5, 'mandalika'),
(6, 'limbat'),
(7, 'kepala lebar'),
(8, 'albino'),
(22, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kolam` (`id_kolam`),
  ADD KEY `id_jenis_aktivitas` (`id_jenis_aktivitas`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `jenis_aktivitas`
--
ALTER TABLE `jenis_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_kelamin` (`id_jenis_kelamin`);

--
-- Indexes for table `kolam`
--
ALTER TABLE `kolam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lele` (`id_lele`);

--
-- Indexes for table `lele`
--
ALTER TABLE `lele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_aktivitas`
--
ALTER TABLE `jenis_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kolam`
--
ALTER TABLE `kolam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lele`
--
ALTER TABLE `lele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_ibfk_1` FOREIGN KEY (`id_kolam`) REFERENCES `kolam` (`id`),
  ADD CONSTRAINT `aktivitas_ibfk_2` FOREIGN KEY (`id_jenis_aktivitas`) REFERENCES `jenis_aktivitas` (`id`),
  ADD CONSTRAINT `aktivitas_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `jenis_kelamin` (`id`);

--
-- Constraints for table `kolam`
--
ALTER TABLE `kolam`
  ADD CONSTRAINT `kolam_ibfk_1` FOREIGN KEY (`id_lele`) REFERENCES `lele` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
