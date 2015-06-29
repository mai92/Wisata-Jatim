-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2015 at 08:59 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.6.10-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wisatajatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabkot`
--

CREATE TABLE IF NOT EXISTS `kabkot` (
  `id_kabkot` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kabkot` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kabkot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kabkot`
--

INSERT INTO `kabkot` (`id_kabkot`, `nama_kabkot`, `keterangan`, `gambar`) VALUES
(1, 'Surabaya', 'kota pahlawan', ''),
(2, 'Sidoarjo', 'Kota Bandeng', ''),
(3, 'Malang', 'Bumi Arema', 'kabkot-1435507589.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kerajinan`
--

CREATE TABLE IF NOT EXISTS `kerajinan` (
  `id_kerajinan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(11) NOT NULL,
  `nama_kerajinan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kerajinan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE IF NOT EXISTS `kuliner` (
  `id_kuliner` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(11) NOT NULL,
  `nama_kuliner` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kuliner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id_kuliner`, `id_kabkot`, `nama_kuliner`, `keterangan`, `gambar`) VALUES
(1, 1, 'Rujak Cingur', 'Rujak Wenakk', ''),
(2, 2, 'Petis', 'Buat sambal2', 'kuliner-1435520440.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE IF NOT EXISTS `wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabkot` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_kabkot`, `nama_wisata`, `keterangan`, `gambar`) VALUES
(1, 1, 'Wisata Mangrove', 'Hutan bakau', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
