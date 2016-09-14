-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2016 pada 10.17
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemiskinandb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiger_kabupaten`
--

CREATE TABLE `tiger_kabupaten` (
  `id` int(11) NOT NULL,
  `nama_kab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiger_kabupaten`
--

INSERT INTO `tiger_kabupaten` (`id`, `nama_kab`) VALUES
(1, 'Mataram'),
(2, 'Lombok Barat'),
(3, 'Lombok Tengah'),
(4, 'Lombok Timur'),
(5, 'Lombok Utara'),
(6, 'Sumbawa Barat'),
(7, 'Sumbawa'),
(8, 'Dompu'),
(9, 'Bima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiger_kabupaten`
--
ALTER TABLE `tiger_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiger_kabupaten`
--
ALTER TABLE `tiger_kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
