-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 11:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notulensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `agenda` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `pimpinan` varchar(50) NOT NULL,
  `notulis` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `agenda`, `tempat`, `pimpinan`, `notulis`, `tanggal`, `time`) VALUES
(6, 'MUSLAMAH ALI', 'RS AWALBROS', 'DIREKTUR', 'ADE KAMPRET', '2022-05-04', '09:00:00'),
(7, 'tes', 'coba', 'tes', 'coba', '2022-05-17', '18:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('admin','user') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pembahasan`
--

CREATE TABLE `pembahasan` (
  `id` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `pembahasan` varchar(500) NOT NULL,
  `pic` varchar(30) NOT NULL,
  `duedate` date NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembahasan`
--

INSERT INTO `pembahasan` (`id`, `id_data`, `pembahasan`, `pic`, `duedate`, `gambar`) VALUES
(143, 6, '<p>INI GAMBAR ADE</p>\r\n', 'ADE', '2022-05-10', 'babi.jpg'),
(144, 7, '<p>tes1</p>\r\n', 'tes2', '2022-05-19', 'prwt-nojil-blur.jpg'),
(145, 7, '<p>tes1</p>\r\n', 'tes2', '2022-05-19', 'prwt-nojil-blur.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembahasan`
--
ALTER TABLE `pembahasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembahasan`
--
ALTER TABLE `pembahasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
