-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 10:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasku`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabid`
--

CREATE TABLE `kabid` (
  `id_kabid` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabid`
--

INSERT INTO `kabid` (`id_kabid`, `nama`, `nim`, `jabatan`, `no_tlp`) VALUES
(3, 'yeni', '2054679', 'kepala bidang', '081xxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `kadis`
--

CREATE TABLE `kadis` (
  `id_kadis` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kadis`
--

INSERT INTO `kadis` (`id_kadis`, `nama`, `nim`, `alamat`, `jabatan`) VALUES
(1, 'agusriadi', '', '', ''),
(2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kepala dinas`
--

CREATE TABLE `kepala dinas` (
  `JABATAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala dinas`
--

INSERT INTO `kepala dinas` (`JABATAN`) VALUES
('Kepala Dinas'),
('Kepala Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `NO_TELP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nim`, `NO_TELP`) VALUES
(1, 'yeni', '12345', '082xxxxxx'),
(2, 'sofi', '2341018', '081xxxxxx'),
(3, 'sinta', '2113457', '081xxxxxx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kadis`
--
ALTER TABLE `kadis`
  ADD PRIMARY KEY (`id_kadis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kadis`
--
ALTER TABLE `kadis`
  MODIFY `id_kadis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
