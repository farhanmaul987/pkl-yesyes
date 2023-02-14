-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 03:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjam_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam`
--

CREATE TABLE `t_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `keperluan` varchar(45) NOT NULL,
  `telp` bigint(20) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pinjam`
--

INSERT INTO `t_pinjam` (`id_pinjam`, `nama`, `keperluan`, `telp`, `id_ruangan`, `tanggal`, `waktu`) VALUES
(1, 'asd', 'asd', 213, 1, '2023-02-14', '00:00:00'),
(2, 'asdasd', 'asdasd', 1231231, 2, '2023-02-14', '15:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_ruangan`
--

CREATE TABLE `t_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `n_ruangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ruangan`
--

INSERT INTO `t_ruangan` (`id_ruangan`, `n_ruangan`) VALUES
(1, 'Ruangan 1'),
(2, 'Ruangan 2'),
(3, 'Ruangan 3'),
(4, 'Ruangan 4'),
(5, 'Ruangan 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD PRIMARY KEY (`id_pinjam`,`id_ruangan`),
  ADD KEY `fk_t_pinjam_t_ruangan_idx` (`id_ruangan`);

--
-- Indexes for table `t_ruangan`
--
ALTER TABLE `t_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_ruangan`
--
ALTER TABLE `t_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD CONSTRAINT `fk_t_pinjam_t_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `t_ruangan` (`id_ruangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
