-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2011 at 03:09 PM
-- Server version: 5.1.55
-- PHP Version: 5.3.5-0.dotdeb.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kkn_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `body`, `created`, `modified`) VALUES
(2, 'Berita Baru', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. \r\n\r\nAt vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. \r\n\r\nAt vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. \r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consete', '2011-03-18 14:13:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`, `kode`, `email`, `created`, `modified`) VALUES
(1, 'Fakultas Pendidikan Matematika Dan Ilmu Pengetahuan Alam', 'FPMIPA', '', '2010-07-17 13:27:41', '2011-03-18 14:28:47'),
(2, 'Fakultas Ilmu Pendidikan', 'FIP', '', '2010-08-15 19:11:12', '0000-00-00 00:00:00'),
(3, 'Fakultas Pendidikan Ilmu Pengetahuan Sosial', 'FPIPS', '', '2010-08-15 19:12:00', '0000-00-00 00:00:00'),
(4, 'Fakultas Pendidikan Bahasa Dan Seni', 'FPBS', '', '2010-08-15 19:12:57', '0000-00-00 00:00:00'),
(5, 'Fakultas Pendidikan Teknik Dan Kejuruan', 'FPTK', '', '2010-08-15 19:14:05', '0000-00-00 00:00:00'),
(6, 'Fakultas Pendidikan Olahraga Dan Kesehatan', 'FPOK', '', '2010-08-15 19:14:58', '2010-08-15 21:26:58'),
(7, 'Sekolah Pascasarjana (S2)', 'SPS', '', '2010-08-15 19:15:49', '2010-08-15 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE IF NOT EXISTS `jenjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id`, `nama`, `kode`, `email`, `created`, `modified`) VALUES
(1, 'Strata 1', 'S1', '', '2010-08-16 00:03:11', '2010-08-17 07:11:14'),
(2, 'Strata 2', 'S2', '', '2010-08-16 00:03:28', '2010-08-17 07:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenjangId` int(11) DEFAULT NULL,
  `fakultasId` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jurusan_jenjangId` (`jenjangId`),
  KEY `jurusan_fakultasId` (`fakultasId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `kode`, `email`, `jenjangId`, `fakultasId`, `created`, `modified`) VALUES
(2, 'Administrasi Pendidikan', 'AP', '', 1, 2, '2010-08-15 19:18:57', '0000-00-00 00:00:00'),
(3, 'Psik. Pend. & Bimbingan', 'PB', '', 1, 2, '2010-08-15 19:19:59', '0000-00-00 00:00:00'),
(4, 'Pendidikan Luar Sekolah', 'LS', '', 1, 2, '2010-08-15 19:20:58', '0000-00-00 00:00:00'),
(5, 'Pendidikan Luar Biasa', 'LB', '', 1, 2, '2010-08-15 19:23:16', '0000-00-00 00:00:00'),
(6, 'Teknologi Pendidikan', 'TP', '', 1, 2, '2010-08-15 19:23:59', '0000-00-00 00:00:00'),
(7, 'Pendidikan Guru Sekolah Dasar', 'GD', '', 1, 2, '2010-08-15 19:24:43', '0000-00-00 00:00:00'),
(8, 'Pendidikan Guru Taman Kanak-Kanak', 'GT', '', 1, 2, '2010-08-15 19:25:29', '0000-00-00 00:00:00'),
(9, 'Psikologi', 'PG', '', 1, 2, '2010-08-15 19:25:59', '0000-00-00 00:00:00'),
(10, 'Pendidikan Moral Pancasila dan Kewarganegaraan (PMPKN)', 'KN', '', 1, 3, '2010-08-15 19:27:36', '2010-08-15 19:28:16'),
(11, 'Pendidikan Sejarah', 'SJ', '', 1, 3, '2010-08-15 19:28:48', '0000-00-00 00:00:00'),
(12, 'Pendidikan Geografi', 'GG', '', 1, 3, '2010-08-15 19:29:14', '0000-00-00 00:00:00'),
(13, 'Pendidikan Ekonomi', 'PE', '', 1, 3, '2010-08-15 19:30:09', '0000-00-00 00:00:00'),
(14, 'Pendididkan Akutansi', 'PA', '', 1, 3, '2010-08-15 19:30:56', '0000-00-00 00:00:00'),
(15, 'Pendidikan Tata Niaga', 'TN', '', 1, 3, '2010-08-15 19:31:26', '0000-00-00 00:00:00'),
(16, 'Pendidikan Administrasi Perkantoran', 'MK', '', 1, 3, '2010-08-15 19:32:20', '0000-00-00 00:00:00'),
(17, 'Pendidikan Ekonomi Dan Koperasi', 'KP', '', 1, 3, '2010-08-15 19:33:25', '0000-00-00 00:00:00'),
(18, 'Manajemen', 'MJ', '', 1, 3, '2010-08-15 19:34:02', '0000-00-00 00:00:00'),
(19, 'Akutansi', 'AK', '', 1, 3, '2010-08-15 19:34:35', '0000-00-00 00:00:00'),
(20, 'Manajemen Pemasaran Turisme', 'MP', '', 1, 3, '2010-08-15 19:35:52', '0000-00-00 00:00:00'),
(21, 'Manajemen Industri Katering', 'MI', '', 1, 3, '2010-08-15 19:36:54', '0000-00-00 00:00:00'),
(22, 'Manajemen Resort dan Leisure', 'MR', '', 1, 3, '2010-08-15 19:37:39', '0000-00-00 00:00:00'),
(23, 'Pendididkan Biologi', 'BI', '', 1, 1, '2010-08-15 19:38:21', '0000-00-00 00:00:00'),
(24, 'Pendididkan Fisika', 'FI', '', 1, 1, '2010-08-15 19:38:48', '0000-00-00 00:00:00'),
(25, 'Pendididkan Kimia', 'KI', '', 1, 1, '2010-08-15 19:39:10', '0000-00-00 00:00:00'),
(26, 'Pendidikan Matematika', 'MT', '', 1, 1, '2010-08-15 19:39:39', '2010-08-15 21:10:44'),
(27, 'Pendididkan Ilmu Komputer', 'IK', '', 1, 1, '2010-08-15 19:40:19', '0000-00-00 00:00:00'),
(28, 'Biologi', 'BI', '', 1, 1, '2010-08-15 19:40:45', '0000-00-00 00:00:00'),
(29, 'Fisika', 'FI', '', 1, 1, '2010-08-15 19:41:03', '0000-00-00 00:00:00'),
(30, 'Kimia', 'KI', '', 1, 1, '2010-08-15 19:41:24', '0000-00-00 00:00:00'),
(31, 'Matematika', 'MT', '', 1, 1, '2010-08-15 19:41:48', '0000-00-00 00:00:00'),
(32, 'Ilmu Komputer', 'IK', '', 1, 1, '2010-08-15 19:42:08', '0000-00-00 00:00:00'),
(33, 'Pendidikan Bahasa Indonesia', 'IN', '', 1, 4, '2010-08-15 20:28:52', '0000-00-00 00:00:00'),
(34, 'Pendidikan Bahasa Daerah', 'DR', '', 1, 4, '2010-08-15 20:30:24', '0000-00-00 00:00:00'),
(35, 'Pendidikan Bahasa Inggris', 'IG', '', 1, 4, '2010-08-15 20:31:03', '0000-00-00 00:00:00'),
(36, 'Pendidikan Bahasa Jerman', 'JR', '', 1, 4, '2010-08-15 20:31:45', '0000-00-00 00:00:00'),
(37, 'Pendidikan Bahasa Arab', 'AR', '', 1, 4, '2010-08-15 20:32:41', '0000-00-00 00:00:00'),
(38, 'Pendidikan Bahasa Jepang', 'JP', '', 1, 4, '2010-08-15 20:33:07', '0000-00-00 00:00:00'),
(39, 'Pendidikan Bahasa Perancis', 'PR', '', 1, 4, '2010-08-15 20:33:32', '0000-00-00 00:00:00'),
(40, 'Pendidikan Seni Musik', 'SM', '', 1, 4, '2010-08-15 20:34:22', '0000-00-00 00:00:00'),
(41, 'Pendidikan Seni Tari', 'ST', '', 1, 4, '2010-08-15 20:34:42', '0000-00-00 00:00:00'),
(42, 'Pendidikan Seni Rupa dan Kerajinan', 'RK', '', 1, 4, '2010-08-15 20:35:19', '0000-00-00 00:00:00'),
(43, 'Bahasa dan Sastra Indonesia', 'IN', '', 1, 4, '2010-08-15 20:35:57', '0000-00-00 00:00:00'),
(44, 'Bahasa dan Sastra Inggris', 'IG', '', 1, 4, '2010-08-15 20:36:35', '0000-00-00 00:00:00'),
(45, 'Pendididkan Teknik Bangunan', 'TB', '', 1, 5, '2010-08-15 20:38:03', '0000-00-00 00:00:00'),
(46, 'Pendididkan Teknik Sipil', 'TS', '', 1, 5, '2010-08-15 20:38:34', '0000-00-00 00:00:00'),
(47, 'Pendididkan Teknik Arsitektur', 'TA', '', 1, 5, '2010-08-15 20:39:16', '0000-00-00 00:00:00'),
(48, 'Pendididkan Teknik Mesin', 'TM', '', 1, 5, '2010-08-15 20:39:39', '0000-00-00 00:00:00'),
(49, 'Pendidikan Listrik Tenaga', 'LT', '', 1, 5, '2010-08-15 20:40:12', '0000-00-00 00:00:00'),
(50, 'Pendididkan Elektronika Komputer', 'EK', '', 1, 5, '2010-08-15 20:41:07', '0000-00-00 00:00:00'),
(51, 'Pendididkan Tata Boga', 'BG', '', 1, 5, '2010-08-15 20:41:59', '0000-00-00 00:00:00'),
(52, 'Pendididkan Tata Busana', 'BU', '', 1, 5, '2010-08-15 20:48:58', '0000-00-00 00:00:00'),
(53, 'Teknik Sipil', 'TS', '', 1, 5, '2010-08-15 20:49:44', '0000-00-00 00:00:00'),
(54, 'Teknik Arsitektur', 'TA', '', 1, 5, '2010-08-15 20:50:14', '0000-00-00 00:00:00'),
(55, 'Teknik Perumahan', 'TR', '', 1, 5, '2010-08-15 20:50:53', '0000-00-00 00:00:00'),
(56, 'Teknik Mesin', 'TM', '', 1, 5, '2010-08-15 20:51:30', '0000-00-00 00:00:00'),
(57, 'Teknik Elektro', 'TE', '', 1, 5, '2010-08-15 20:52:56', '0000-00-00 00:00:00'),
(58, 'Pendidikan Teknik Produksi dan Perancangan', 'PP', '', 1, 5, '2010-08-15 20:54:14', '0000-00-00 00:00:00'),
(59, 'Pendidikan Teknik Otomotif', 'OT', '', 1, 5, '2010-08-15 20:56:18', '0000-00-00 00:00:00'),
(60, 'Pendidikan Teknik Refrigasi dan Tata Udara', 'RT', '', 1, 5, '2010-08-15 20:57:56', '0000-00-00 00:00:00'),
(61, 'Pendididkan Olahraga', 'OR', '', 1, 6, '2010-08-15 20:59:16', '0000-00-00 00:00:00'),
(62, 'Pendidikan kesehatan dan Rekreasi', 'KR', '', 1, 6, '2010-08-15 21:00:02', '0000-00-00 00:00:00'),
(63, 'Pendidikan Kepelatihan', 'KP', '', 1, 6, '2010-08-15 21:00:47', '0000-00-00 00:00:00'),
(64, 'Pendidikan Guru Penjas', 'GJ', '', 1, 6, '2010-08-15 21:01:26', '0000-00-00 00:00:00'),
(65, 'ilmu Keolahragaan', 'IO', '', 1, 6, '2010-08-15 21:01:51', '0000-00-00 00:00:00'),
(66, 'Administrasi Pendidikan', 'AP', '', 2, 7, '2010-08-15 21:02:59', '2010-08-30 22:21:57'),
(67, 'Pengembangan Kurikulum', 'TK', '', 2, 7, '2010-08-15 21:03:26', '0000-00-00 00:00:00'),
(68, 'Bimbingan dan Konseling', 'BK', '', 2, 7, '2010-08-15 21:04:05', '0000-00-00 00:00:00'),
(69, 'Pendidikan Luar Sekolah', 'LS', '', 2, 7, '2010-08-15 21:04:49', '2010-08-15 21:05:03'),
(70, 'Pendidikan Umum ', 'PU', '', 2, 7, '2010-08-15 21:07:36', '0000-00-00 00:00:00'),
(71, 'Pendidikan Kebutuhan Khusus', 'KK', '', 2, 7, '2010-08-15 21:08:10', '0000-00-00 00:00:00'),
(72, 'Pendidikan IPA', 'PA', '', 2, 7, '2010-08-15 21:09:09', '0000-00-00 00:00:00'),
(73, 'Pendidikan Matematika', 'MT', '', 2, 7, '2010-08-15 21:10:09', '0000-00-00 00:00:00'),
(74, 'Pendidikan Bahasa Indonesia', 'IN', '', 2, 7, '2010-08-15 21:11:38', '0000-00-00 00:00:00'),
(75, 'Pendidikan Bahasa Inggris', 'IG', '', 2, 7, '2010-08-15 21:12:17', '0000-00-00 00:00:00'),
(76, 'Pendidikan Bahasa Jepang', 'JP', '', 2, 7, '2010-08-15 21:12:45', '0000-00-00 00:00:00'),
(77, 'Pendidikan Bahasa Perancis', 'PR', '', 2, 7, '2010-08-15 21:13:21', '0000-00-00 00:00:00'),
(78, 'Pendidikan IPS', 'SS', '', 2, 7, '2010-08-15 21:13:47', '0000-00-00 00:00:00'),
(79, 'Pendidikan Kewarganegaraan', 'KN', '', 2, 7, '2010-08-15 21:14:40', '0000-00-00 00:00:00'),
(80, 'Pendidikan Kesenian', 'KS', '', 2, 7, '2010-08-15 21:15:20', '0000-00-00 00:00:00'),
(81, 'Pendidikan Teknik Kejuruan', 'KJ', '', 2, 7, '2010-08-15 21:16:01', '0000-00-00 00:00:00'),
(82, 'Pendidikan Olahraga', 'OR', '', 2, 7, '2010-08-15 21:16:36', '0000-00-00 00:00:00'),
(83, 'Magister Manajemen Bisnis', 'MB', '', 2, 7, '2010-08-15 21:17:33', '0000-00-00 00:00:00'),
(84, 'Linguistik', 'LG', '', 2, 7, '2010-08-15 21:17:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama`, `created`, `modified`) VALUES
(3, 'Kota Bandung', '2010-08-15 21:52:21', '0000-00-00 00:00:00'),
(4, 'Kota Cimahi', '2010-08-15 21:52:45', '0000-00-00 00:00:00'),
(5, 'Bandung', '2010-08-15 21:53:15', '0000-00-00 00:00:00'),
(6, 'Bandung Barat', '2010-08-15 21:53:43', '0000-00-00 00:00:00'),
(7, 'Subang', '2010-08-15 21:54:07', '0000-00-00 00:00:00'),
(8, 'Garut', '2010-08-15 21:54:31', '0000-00-00 00:00:00'),
(9, 'Sumedang', '2010-08-15 21:55:02', '0000-00-00 00:00:00'),
(10, 'Purwakarta', '2010-08-15 21:55:21', '0000-00-00 00:00:00'),
(11, 'Tasikmalaya', '2010-08-15 21:55:50', '0000-00-00 00:00:00'),
(12, 'Sukabumi', '2010-08-15 21:56:19', '0000-00-00 00:00:00'),
(13, 'Cianjur', '2010-08-15 21:56:38', '0000-00-00 00:00:00'),
(14, 'Ciamis', '2010-08-15 21:56:57', '0000-00-00 00:00:00'),
(15, 'Majalengka', '2010-08-15 21:57:26', '0000-00-00 00:00:00'),
(16, 'Banjar', '2010-08-15 21:57:45', '0000-00-00 00:00:00'),
(17, 'Pandeglang', '2010-08-15 21:58:59', '0000-00-00 00:00:00'),
(18, 'Serang', '2010-08-31 18:40:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kabupatenId` int(11) DEFAULT NULL,
  `programKknId` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_kabupatenId` (`kabupatenId`),
  KEY `kecamatan_programKknId` (`programKknId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kabupatenId`, `programKknId`, `created`, `modified`) VALUES
(2, 'Cikalong Wetan', 6, NULL, '2010-08-15 22:03:12', '2010-09-29 22:37:55'),
(3, 'Lembang', 6, NULL, '2010-08-15 22:03:59', '0000-00-00 00:00:00'),
(4, 'Gununghalu', 6, NULL, '2010-08-15 22:05:32', '0000-00-00 00:00:00'),
(5, 'Cipeundeuy', 6, NULL, '2010-08-15 22:06:03', '0000-00-00 00:00:00'),
(6, 'Cililin', 6, NULL, '2010-08-15 22:06:34', '0000-00-00 00:00:00'),
(7, 'Desa Sukamanah Kecamatan Rongga', 6, NULL, '2010-08-15 22:07:25', '0000-00-00 00:00:00'),
(8, 'Desa Batujajar Timur Kecamatan Batujajar', 6, NULL, '2010-08-15 22:08:00', '0000-00-00 00:00:00'),
(9, 'Desa Nyenang Kecamatan Cipeundeuy', 6, NULL, '2010-08-15 22:08:42', '0000-00-00 00:00:00'),
(10, 'Cipatat', 6, NULL, '2010-08-15 22:09:15', '0000-00-00 00:00:00'),
(11, 'Cimahi Tengah', 4, NULL, '2010-08-15 22:16:17', '0000-00-00 00:00:00'),
(12, 'Cigugur Tengah', 4, NULL, '2010-08-15 22:20:06', '0000-00-00 00:00:00'),
(13, 'Baros', 4, NULL, '2010-08-15 22:24:20', '0000-00-00 00:00:00'),
(14, 'Sucinaraja', 8, NULL, '2010-08-15 22:31:59', '0000-00-00 00:00:00'),
(15, 'Wanaraja', 8, NULL, '2010-08-15 22:33:13', '0000-00-00 00:00:00'),
(16, 'Pangatikan', 8, NULL, '2010-08-15 22:33:45', '0000-00-00 00:00:00'),
(17, 'Sukasari', 3, NULL, '2010-08-15 22:38:22', '0000-00-00 00:00:00'),
(18, 'Andir', 3, NULL, '2010-08-15 22:38:52', '0000-00-00 00:00:00'),
(19, 'Sukajadi', 3, NULL, '2010-08-15 22:39:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(255) NOT NULL,
  `kabupatenId` int(11) DEFAULT NULL,
  `kecamatanId` int(11) DEFAULT NULL,
  `programKknId` int(11) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `jumlahAnggota` int(11) DEFAULT NULL,
  `jumlahLakiLaki` int(11) DEFAULT NULL,
  `jumlahPerempuan` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kelompok_kabupatenId` (`kabupatenId`),
  KEY `kelompok_kecamatanId` (`kecamatanId`),
  KEY `kelompok_programKknId` (`programKknId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `lokasi`, `kabupatenId`, `kecamatanId`, `programKknId`, `latitude`, `longitude`, `jumlahAnggota`, `jumlahLakiLaki`, `jumlahPerempuan`, `created`, `modified`) VALUES
(2, 'Jl. Amd No. 33 Ciraja Desa Mandalasari', 6, 2, 5, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:11:05', '2010-09-29 22:37:55'),
(3, 'Desa Wangunsari Rt 01 Rw. 09', 6, 3, 6, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:12:02', '0000-00-00 00:00:00'),
(4, 'Kp. Paratag Rt. 02 Rw. 21 Desa Gununghalu', 6, 4, 6, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:14:02', '0000-00-00 00:00:00'),
(5, 'Cigugur Tengah Sdn Cimindi 2', 4, 11, 4, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:17:11', '2010-08-15 22:18:47'),
(6, 'Sdn Bina Harapan Cibaligo No. 6 Cimindi', 4, 12, 4, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:21:27', '0000-00-00 00:00:00'),
(7, 'Sdn Kebonsari 1', 4, 13, 4, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:25:36', '0000-00-00 00:00:00'),
(8, 'Sadang', 8, 14, 2, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:34:35', '0000-00-00 00:00:00'),
(9, 'Wanaraja', 8, 15, 2, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:35:18', '0000-00-00 00:00:00'),
(10, 'Sukarasa', 8, 16, 2, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:36:05', '0000-00-00 00:00:00'),
(11, 'Kelurahan Sarijadi "a"', 3, 17, 3, -6.906659, 107.605591, 1, 1, 0, '2010-08-15 22:41:12', '2010-10-15 23:41:39'),
(12, 'Kelurahan Campaka', 3, 18, 3, -6.906659, 107.605591, 1, 1, 0, '2010-08-15 22:41:49', '2010-10-15 23:46:21'),
(13, 'Kelurahan Sukawarna', 3, 19, 3, -6.906659, 107.605591, 0, 0, 0, '2010-08-15 22:42:30', '0000-00-00 00:00:00'),
(14, 'Kelurahan Pasteur', 3, 19, 2, -6.88927628005024, 107.55546587793, 0, 0, 0, '2010-08-31 18:52:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaLengkap` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `alamatAsal` varchar(255) DEFAULT NULL,
  `alamatTinggal` varchar(255) DEFAULT NULL,
  `fakultasId` int(11) DEFAULT NULL,
  `jenjangId` int(11) DEFAULT NULL,
  `jurusanId` int(11) DEFAULT NULL,
  `kelompokId` int(11) DEFAULT NULL,
  `jenisKelamin` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `photoPath` varchar(255) DEFAULT NULL,
  `registred` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_jenjangId` (`jenjangId`),
  KEY `mahasiswa_fakultasId` (`fakultasId`),
  KEY `mahasiswa_jurusanId` (`jurusanId`),
  KEY `mahasiswa_kelompokId` (`kelompokId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `namaLengkap`, `nim`, `alamatAsal`, `alamatTinggal`, `fakultasId`, `jenjangId`, `jurusanId`, `kelompokId`, `jenisKelamin`, `phone1`, `phone2`, `photoPath`, `registred`, `created`, `modified`) VALUES
(1, 'Angga Kusumah P.', '045065', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Aprianti Fitriana R.', '0705016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Ani Anjaniah Kamilah', '0705118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Disky Herdian', '0707849', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Fadjar Agung W.', '0705849', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Yopi Rosdiana', '054005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Rusmiyanti', '0706682', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Ahmad Hamdan', '0703737', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Rika Wahyuni', '0704453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Wida Widaningsih', '0705347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Rendi Yogaswara', '0703796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Supriadi', '0707053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Taufan Setio Hadi  P.', '0705642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Fusti Yunita', '0706796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Ahmad Hamdan', '0703737', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Rika Wahyuni', '0704453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Wida Widaningsih', '0705347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Rendi Yogaswara', '0703796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Supriadi', '0707053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Taufan Setio Hadi  P.', '0705642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Fusti Yunita', '0706796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Gustiana Rikho', '0700069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Nina Rosalina', '0705053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Melasari Susanti', '0705127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Arlhian Fahar', '0703897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Khaerul Syabar', '0707674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Farchan Firmansyah', '0706575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Karima Huril Aini', '0706690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Ahmad Hamdan', '0703737', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Rika Wahyuni', '0704453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Wida Widaningsih', '0705347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Rendi Yogaswara', '0703796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Supriadi', '0707053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Taufan Setio Hadi  P.', '0705642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Fusti Yunita', '0706796', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Gustiana Rikho', '0700069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Nina Rosalina', '0705053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Melasari Susanti', '0705127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Arlhian Fahar', '0703897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Khaerul Syabar', '0707674', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Farchan Firmansyah', '0706575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Karima Huril Aini', '0706690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Ari Hikmah R.', '0705025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Feby Inggriyani', '0703802', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Indra Kurnianto', '0705250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Mala Robani Zohra', '0706728', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Nurul Hadi Sutanto', '0707720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Mamay Hamdani', '0705829', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Siti Aisyah Al Adzani', '0706542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Muh. Muhtar', '0700619', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Andini Kelana Putri', '0705085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Tiwi Kartiwi', '0705297', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Qomarudin', '055088', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Tatang Kusnandar', '0707682', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Bayu Saputra', '0706754', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Mutia Andini', '0706963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Latifah Az Zahra', '0700202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Melani Septor', '0700742', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Reza Ali Fahmi', '0706232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Kamil Ahmad Hambali', '0706704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Satria Nugraha', '0707270', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, ' Ismi Rizka Febriana', '0707652', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Dessy Rahmawati', '0704275', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Riki Ginanjar', '0704395', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Lucky Satria', '0708547', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Nindin Sudarna', '0706532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Dian Ramdani', '0705030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Adi Sotrisman', '0706527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Uni Nuraeni', '0700167', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Neliana', '0703764', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Bilqis Andini', '0706792', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Ade Tito Septian', '0705055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'MZ. Abdurohman', '067494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Arie Setiabudi', '0707953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Dian Zaini Arief', '0703916', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Nicke Oktaviani S.', '0703984', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Atih Ireana Mahadaniar', '0706789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Feny Candra Gunawan', '0706609', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Lilik Indriani', '0700534', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Intan Permana', '0700848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'R. Deasy Mandasari', '0707171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Widyoharsono Waluyo', '0706208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Sani Husni Sabar', '0707215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Ade Agustian', '060778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Kharisma Purwasakti', '0704082', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Gustika Dwi Herdiyanti', '0704633', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Desti Dwijayanti', '0705210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Rini Hardini H.', '0708545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Vina Benita', '0902704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Hari Dwi Sukarmana', '0707991', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Adi Yajidi', '0705827', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Eka Adipura', '0700002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Rohani Magdalena Sinaga', '0700282', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Desy Purwati', '070824', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Diana Rahayu', '0706953', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Eri Febriansyah F.', '0704171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Arief Priansyah N.', '0700604', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Dendi Nurwega', '0705687', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Garby Mukti P.', '0707625', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Dendy Noviandi Pratama', '0704395', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Citra Nur Anggraeni Aprilia', '0703702', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Yulis Setiowati', '0703151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'Hesti Meisyah', '0707056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Angga Febriana', '0706997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Reki Siaga A.', '0705023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Ade Nur Zaman', '0705231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Laili Fazri', '0706600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Nenny Hindatisnawati ', '0704226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Nindiah Sri Wahyuni', '0702929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Larasati Martha', '0706677', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Andri Irawan', '0705176', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Suharyadi', '0706628', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Silvius Yoris Sefire', '0709300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Yunus Hunaeni', '0704707', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prioritas`
--

CREATE TABLE IF NOT EXISTS `prioritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programKknId` int(11) DEFAULT NULL,
  `jurusanId` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prioritas_programKknId` (`programKknId`),
  KEY `prioritas_jurusanId` (`jurusanId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prioritas`
--

INSERT INTO `prioritas` (`id`, `programKknId`, `jurusanId`, `created`, `modified`, `level`) VALUES
(1, 2, 24, '2011-03-18 08:55:15', '0000-00-00 00:00:00', 1),
(2, 2, 4, '2011-03-18 08:55:33', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_kkn`
--

CREATE TABLE IF NOT EXISTS `program_kkn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `program_kkn`
--

INSERT INTO `program_kkn` (`id`, `nama`, `deskripsi`, `created`, `modified`) VALUES
(2, 'POSDAYA', 'nanti di isi', '2010-08-15 21:47:58', '2010-08-15 22:29:32'),
(3, 'PAUD', 'nanti di isi', '2010-08-15 21:48:31', '0000-00-00 00:00:00'),
(4, 'MANAJEMEN BERBASIS SEKOLAH (MBS)', 'nanti di isi', '2010-08-15 21:49:08', '0000-00-00 00:00:00'),
(5, 'SADAR HUKUM (DARKUM)', 'nanti di isi', '2010-08-15 21:49:49', '0000-00-00 00:00:00'),
(6, 'PKBM', 'nanti di isi', '2010-08-15 21:50:35', '0000-00-00 00:00:00'),
(7, 'SENI BUDAYA', 'nanti di isi', '2010-08-15 21:51:04', '0000-00-00 00:00:00'),
(8, 'TEKA', 'efghjui9o', '2010-10-11 19:58:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program_kkn_lampiran`
--

CREATE TABLE IF NOT EXISTS `program_kkn_lampiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `programKknId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `program_kkn_lampiran_programKknId` (`programKknId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `program_kkn_lampiran`
--


-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE IF NOT EXISTS `program_studi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenjangId` int(11) DEFAULT NULL,
  `fakultasId` int(11) DEFAULT NULL,
  `jurusanId` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_studi_jenjangId` (`jenjangId`),
  KEY `program_studi_fakultasId` (`fakultasId`),
  KEY `program_studi_jurusanId` (`jurusanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `program_studi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1300242374),
('m110315_021459_initial', 1300242402),
('m110318_015323_add_level_column_to_prioritas', 1300413280);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama`, `created`, `modified`, `role`) VALUES
(1, 'admin', 'ac43724f16e9241d990427ab7c8f4228', 'th3crypt@gmail.com', 'Administrator', '2011-03-25 10:34:32', '2011-03-12 10:34:35', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_fakultasId` FOREIGN KEY (`fakultasId`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `jurusan_jenjangId` FOREIGN KEY (`jenjangId`) REFERENCES `jenjang` (`id`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_programKknId` FOREIGN KEY (`programKknId`) REFERENCES `program_kkn` (`id`),
  ADD CONSTRAINT `kecamatan_kabupatenId` FOREIGN KEY (`kabupatenId`) REFERENCES `kabupaten` (`id`);

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_programKknId` FOREIGN KEY (`programKknId`) REFERENCES `program_kkn` (`id`),
  ADD CONSTRAINT `kelompok_kabupatenId` FOREIGN KEY (`kabupatenId`) REFERENCES `kabupaten` (`id`),
  ADD CONSTRAINT `kelompok_kecamatanId` FOREIGN KEY (`kecamatanId`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_kelompokId` FOREIGN KEY (`kelompokId`) REFERENCES `kelompok` (`id`),
  ADD CONSTRAINT `mahasiswa_fakultasId` FOREIGN KEY (`fakultasId`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `mahasiswa_jenjangId` FOREIGN KEY (`jenjangId`) REFERENCES `jenjang` (`id`),
  ADD CONSTRAINT `mahasiswa_jurusanId` FOREIGN KEY (`jurusanId`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `prioritas`
--
ALTER TABLE `prioritas`
  ADD CONSTRAINT `prioritas_jurusanId` FOREIGN KEY (`jurusanId`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `prioritas_programKknId` FOREIGN KEY (`programKknId`) REFERENCES `program_kkn` (`id`);

--
-- Constraints for table `program_kkn_lampiran`
--
ALTER TABLE `program_kkn_lampiran`
  ADD CONSTRAINT `program_kkn_lampiran_programKknId` FOREIGN KEY (`programKknId`) REFERENCES `program_kkn` (`id`);

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_jurusanId` FOREIGN KEY (`jurusanId`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `program_studi_fakultasId` FOREIGN KEY (`fakultasId`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `program_studi_jenjangId` FOREIGN KEY (`jenjangId`) REFERENCES `jenjang` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
