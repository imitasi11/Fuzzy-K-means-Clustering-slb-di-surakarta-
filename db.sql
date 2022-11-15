-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 05:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE IF NOT EXISTS `cluster` (
  `id_cluster` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `nama`, `c1`, `c2`, `c3`) VALUES
(3, 'c3', 1, 4, 1),
(2, 'c2', 2, 2, 3),
(1, 'c1', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `guru` float NOT NULL,
  `fasilitas` float NOT NULL,
  `tanah` float NOT NULL,
  `cluster` int(11) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `p_fasilitas` text NOT NULL,
  `p_layanan` text NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nama`, `guru`, `fasilitas`, `tanah`, `cluster`, `lng`, `lat`, `p_fasilitas`, `p_layanan`) VALUES
(1, 'SLB Negeri Surakarta', 3, 2, 4, 3, 110.8146068, -7.5552581, '', ''),
(2, 'SLB E prayuwana', 4, 2, 2, 3, 110.8174653, -7.5579282, '', ''),
(3, 'SLB A Ykab surakarta', 1, 1, 3, 2, 110.8459063, -7.5653687, '', ''),
(4, 'SLB Autis agya center', 3, 3, 3, 3, 110.8374834, -7.570798, '', ''),
(5, 'SLB autis alamanda', 1, 4, 1, 3, 110.7925881, -7.5521895, '', ''),
(6, 'SLB autis harmony', 2, 4, 2, 3, 110.833369217, -7.5734774, '', ''),
(7, 'SLB BC autis yba', 1, 1, 1, 1, 110.820516617, -7.5857376, '', ''),
(8, 'SLBC setyadarma', 1, 1, 3, 2, 110.829840917, -7.5502252, '', ''),
(9, 'SLB C YPSLB', 1, 3, 3, 3, 110.797009913, -7.5501334, '', ''),
(10, 'SLB C1 YSSD', 1, 3, 1, 3, 110.829947317, -7.5546653, '', ''),
(11, 'SLBC9 YPPCG bina sejahtera', 1, 1, 1, 1, 110.8149477, -7.5507121, '', ''),
(12, 'SLB D YPAC surakarta', 3, 3, 3, 3, 110.804972617, -7.9814564, '', ''),
(13, 'SLB D1 YPAC', 1, 2, 3, 2, 110.804972617, -7.5649814, '', ''),
(14, 'SLB BHINA PUTERA', 1, 3, 1, 3, 110.830648317, -7.5516067, '', ''),
(15, 'SLB PANCA BAKTI MULIA', 1, 3, 3, 3, 110.824260514, -7.5610497, '', ''),
(16, 'SLB YRTRW', 2, 2, 3, 3, 110.812562617, -7.5543189, '', ''),
(17, 'SLB B YAAT ', 1, 1, 1, 1, 110.796397214, -7.5807841, '', ''),
(33, 'coba dulus', 1, 1, 1, 1, 213123, 21321, '0,1,0,0,0,1,0,0,1,0,0', '1,1,0,0,0,0,0');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `fasilitas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `fasilitas`) VALUES
(1, 'kelas umum'),
(2, 'kelas khusus'),
(3, 'perpustakaan'),
(4, 'tempat ibadah'),
(5, 'ruang UKS'),
(6, 'ruang guru'),
(7, 'ruang konseling'),
(8, 'toilet'),
(9, 'tempat bermain/berolahraga'),
(10, 'jaringan internet'),
(11, 'laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(11) NOT NULL,
  `layanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan`) VALUES
(1, 'Anak Tunanetra'),
(2, 'Anak Tunarungu'),
(3, 'Anak TunaGrahita'),
(4, 'Anak Autism'),
(5, 'Anak Tunawicara'),
(6, 'Anak Tunadaksa'),
(7, 'Anak Tunalaras');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`, `level`) VALUES
('asd', 'asd', 2),
('user', 'user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
