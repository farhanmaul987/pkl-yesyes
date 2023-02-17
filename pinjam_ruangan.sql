-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2023 pada 08.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

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
-- Struktur dari tabel `t_pinjam`
--

CREATE TABLE `t_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `keperluan` varchar(45) NOT NULL,
  `telp` bigint(20) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pinjam`
--

INSERT INTO `t_pinjam` (`id_pinjam`, `nama`, `keperluan`, `telp`, `id_ruangan`, `tanggal`, `waktu`, `status`) VALUES
(9, 'Akmal Aliffandhi Anwar', 'Rapat', 696969, 3, '2023-02-17', '14:04:00', 'Pending'),
(10, 'Haidarr', 'ngewe', 214, 2, '2023-02-17', '14:06:00', 'Pending'),
(11, 'Farhan Ngentot', 'ngewe', 696969, 3, '2023-02-17', '14:06:00', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ruangan`
--

CREATE TABLE `t_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `n_ruangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_ruangan`
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
-- Indeks untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD PRIMARY KEY (`id_pinjam`,`id_ruangan`),
  ADD KEY `fk_t_pinjam_t_ruangan_idx` (`id_ruangan`);

--
-- Indeks untuk tabel `t_ruangan`
--
ALTER TABLE `t_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_ruangan`
--
ALTER TABLE `t_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD CONSTRAINT `fk_t_pinjam_t_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `t_ruangan` (`id_ruangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
