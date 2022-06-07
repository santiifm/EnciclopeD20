-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 08:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encicloped20`
--

-- --------------------------------------------------------

--
-- Table structure for table `hojas`
--

CREATE TABLE `hojas` (
  `id` int(11) NOT NULL,
  `nombre_pj` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hojas`
--

INSERT INTO `hojas` (`id`, `nombre_pj`, `pdf`, `img`, `autor`, `fecha`) VALUES
(1, 'Mystara', '2022-05-17-20-12-05.pdf', '2022-05-17-20-12-05.bmp', 'santiifm', '2022-05-17 20:12:05'),
(2, 'Kriev', '2022-05-17-20-12-40.pdf', '2022-05-17-20-12-40.bmp', 'santiifm', '2022-05-17 20:12:40'),
(5, 'Xin Zhao', '2022-05-17-20-14-31.pdf', '2022-05-17-20-14-31.bmp', 'santiifm', '2022-05-17 20:14:31'),
(6, 'Fae', '2022-05-17-20-15-14.pdf', '2022-05-17-20-15-14.bmp', 'hola', '2022-05-17 20:15:14'),
(7, 'Janna', '2022-05-17-20-15-37.pdf', '2022-05-17-20-15-37.bmp', 'hola', '2022-05-17 20:15:37'),
(8, 'Elyn', '2022-05-17-20-16-35.pdf', '2022-05-17-20-16-35.bmp', 'hola', '2022-05-17 20:16:35'),
(9, 'Aegar', '2022-05-17-20-17-32.pdf', '2022-05-17-20-17-32.bmp', 'hola', '2022-05-17 20:17:32'),
(11, 'Artorias', '2022-06-07-08-25-57.pdf', '2022-06-07-08-25-57.bmp', 'santiifm', '2022-06-07 08:25:57'),
(12, 'Syf', '2022-06-07-08-36-00.pdf', '2022-06-07-08-36-00.bmp', 'santiifm', '2022-06-07 08:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`) VALUES
(1, 'hola', '4d186321c1a7f0f354b297e8914ab240'),
(2, 'santiifm', 'bfab0fcdc1e77ac81c2a08a8b4f928f5'),
(3, 'tobieche', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'elPeladoChotoDeLaFacultad', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hojas`
--
ALTER TABLE `hojas`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `hojas` ADD FULLTEXT KEY `nombre_pj` (`nombre_pj`,`autor`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hojas`
--
ALTER TABLE `hojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
