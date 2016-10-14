-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2016 pada 14.56
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
-- Struktur dari tabel `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`id` int(11) NOT NULL,
  `program` varchar(400) NOT NULL,
  `kegiatan` varchar(400) NOT NULL,
  `jumlah_pagu` double(11,2) NOT NULL,
  `skpd` varchar(50) NOT NULL,
  `id_klaster` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `program`, `kegiatan`, `jumlah_pagu`, `skpd`, `id_klaster`, `keterangan`, `tahun`) VALUES
(1, 'Distribusi Dana Stimulus Rukun Tetangga', 'Distribusi Dana Stimulus Rukun Tetangga', 135600000.00, 'BPM PEMDES', 2, 'Program Distribusi Dana Stimulus Rukun Tetangga di berikan kepada keluarga yang kurang mampu memlalui pemerintah terdekat. pendistribusian dana stimulus rukun tetangga ini diharapkan dapat membantu mensejahterakan kehidupan ekonomi dari setiap keluarga miskin yang berada di Kabupaten Sumbawa Barat.', 2014),
(3, 'Program Rehab Rumah', 'Peningkatan Kualitas Rumah Tidak Layak Huni Bagi Masyarkat Berpenghasil Rendah', 190920000.00, 'BPM PEMDES', 2, 'Program Distribusi Dana Stimulus Rukun Tetangga di berikan kepada keluarga yang kurang mampu memlalui pemerintah terdekat. pendistribusian dana stimulus rukun tetangga ini diharapkan dapat membantu mensejahterakan kehidupan ekonomi dari setiap keluarga miskin yang berada di Kabupaten Sumbawa Barat. ', 2014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
