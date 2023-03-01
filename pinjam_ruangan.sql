-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2023 pada 11.32
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
(3, 'Projector');

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
(96, 'aka', 'aka', 1, 1, '2023-03-01', '15:02:00', 'tes1111', 'Pending'),
(97, 'akmal tampan', 'kgn dia yg di sana :(', 1234556, 2, '2023-03-01', '16:33:00', 'tambahan akmal ganteng adalah akmal pemberani', 'Pending');

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
(38, 96, 1, 1, 'tv'),
(39, 96, 3, 3, 'projector'),
(40, 97, 1, 11, 'tv'),
(41, 97, 3, 33, 'projector');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_pinjam`
--
ALTER TABLE `t_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `t_pinjambarang`
--
ALTER TABLE `t_pinjambarang`
  MODIFY `id_pinjamBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
