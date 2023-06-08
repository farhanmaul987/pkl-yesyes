-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2023 pada 11.10
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
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `id_barang` int(11) NOT NULL,
  `n_barang` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`id_barang`, `n_barang`) VALUES
(1, 'TV'),
(2, 'Printer'),
(3, 'Projector'),
(4, 'Kabel');

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
  `tambahan` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pinjam`
--

INSERT INTO `t_pinjam` (`id_pinjam`, `nama`, `keperluan`, `telp`, `id_ruangan`, `tanggal`, `waktu`, `tambahan`, `status`) VALUES
(112, 'AKMALALA   ', 'RAPAT', 123456789, 1, '2023-03-17', '20:58:00', 'DADASDDASDSAD', 'Diterima'),
(113, 'FADARR ', 'RAPAT', 12345678, 1, '2023-03-17', '20:59:00', 'AHAHHAHAAHAAH', 'Diterima'),
(114, 'Akmallalalalal        ', 'Rapat', 89192332, 1, '2023-06-05', '17:57:00', '', 'Selesai'),
(115, 'Rifki', 'Rapat', 123141541, 2, '2023-06-05', '18:42:00', '', 'Pending'),
(116, 'Rifki', 'rapat', 12313241, 2, '2023-06-05', '18:46:00', '', 'Pending'),
(117, 'farhan', 'rapat', 131312124, 2, '2023-06-05', '18:54:00', '', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pinjambarang`
--

CREATE TABLE `t_pinjambarang` (
  `id_pinjamBarang` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pinjambarang`
--

INSERT INTO `t_pinjambarang` (`id_pinjamBarang`, `id_pinjam`, `id_barang`, `jumlah`, `keterangan`) VALUES
(62, 0, 1, 1, 'ADAA'),
(63, 0, 2, 2, 'ASDD'),
(64, 0, 3, 3, 'ASDAD'),
(65, 113, 1, 12, 'ADSD'),
(66, 113, 2, 21, 'ASDA'),
(67, 113, 3, 32, 'ASDASD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ruangan`
--

CREATE TABLE `t_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `n_ruangan` varchar(45) NOT NULL,
  `kuota` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_ruangan`
--

INSERT INTO `t_ruangan` (`id_ruangan`, `n_ruangan`, `kuota`) VALUES
(1, 'Wilis', 50),
(2, 'Raung', 60),
(3, 'Salak', 100),
(4, 'Sumeru', 70),
(5, 'Sindoro', 50),
(6, 'Slamet', 40),
(7, 'Cereme', 30),
(8, 'Andong', 40),
(9, 'Anjasmoro', 50),
(10, 'Ijenmmmm', 50),
(11, 'awdadd', 0),
(12, 'Akmal', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  ADD PRIMARY KEY (`id_pinjam`,`id_ruangan`),
  ADD KEY `fk_t_pinjam_t_ruangan_idx` (`id_ruangan`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indeks untuk tabel `t_pinjambarang`
--
ALTER TABLE `t_pinjambarang`
  ADD PRIMARY KEY (`id_pinjamBarang`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indeks untuk tabel `t_ruangan`
--
ALTER TABLE `t_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `t_pinjambarang`
--
ALTER TABLE `t_pinjambarang`
  MODIFY `id_pinjamBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `t_ruangan`
--
ALTER TABLE `t_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
