-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2019 pada 14.46
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_ai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarlagu`
--

CREATE TABLE `daftarlagu` (
  `id` int(11) NOT NULL,
  `judul_lagu` varchar(255) NOT NULL,
  `penyanyi` varchar(255) NOT NULL,
  `keyword` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftarlagu`
--

INSERT INTO `daftarlagu` (`id`, `judul_lagu`, `penyanyi`, `keyword`) VALUES
(1, 'Amin Paling Serius', 'Nadin Amizah, Sal Priadi', 'NADIN AMIZAH SAL PRIADI AMIN PALING SERIUS AMINPALINGSERIUS N A S P'),
(2, 'Rehat', 'Kunto Aji', 'KUNTO AJI REHAT K'),
(3, 'Kangen', 'Dewa 19', 'KANGEN DEWA 19 DEWA19 K'),
(4, 'Seberapa Pantas', 'Sheila On 7', 'SEBERAPA PANTAS SHEILA ON 7 SEBERAPAPANTAS'),
(5, 'Intuisi', 'Yura Yunita', 'YURA YUNITA INTUISI I Y 5 LIMA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftarlagu`
--
ALTER TABLE `daftarlagu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftarlagu`
--
ALTER TABLE `daftarlagu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
