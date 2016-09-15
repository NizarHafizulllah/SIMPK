-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Sep 2016 pada 13.36
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kemiskinandb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penduduk_miskin`
--

CREATE TABLE IF NOT EXISTS `data_penduduk_miskin` (
  `id_kab` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_penduduk_miskin`
--

INSERT INTO `data_penduduk_miskin` (`id_kab`, `tahun`, `jumlah`) VALUES
(1, 2000, 331),
(1, 2001, 111),
(1, 2007, 100),
(2, 2000, 767),
(2, 2001, 222),
(2, 2007, 100),
(3, 2000, 565),
(3, 2001, 333),
(3, 2007, 1000),
(4, 2000, 6),
(4, 2001, 444),
(4, 2007, 100),
(5, 2000, 4),
(5, 2001, 555),
(5, 2007, 100),
(6, 2000, 6),
(6, 2001, 666),
(6, 2007, 100),
(7, 2000, 6),
(7, 2001, 777),
(7, 2007, 100),
(8, 2000, 6),
(8, 2001, 888),
(8, 2007, 100),
(9, 2000, 6),
(9, 2001, 999),
(9, 2007, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penduduk_miskin`
--
ALTER TABLE `data_penduduk_miskin`
 ADD PRIMARY KEY (`id_kab`,`tahun`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
