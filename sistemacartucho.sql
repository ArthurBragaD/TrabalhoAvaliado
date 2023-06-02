-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 12:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemacartucho`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartucho`
--

CREATE TABLE `cartucho` (
  `id` int(255) NOT NULL,
  `nome` text NOT NULL,
  `sistema` text NOT NULL,
  `tela` text NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `CPF` varchar(255) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`CPF`, `nome`, `email`, `senha`, `tipo`) VALUES
('', 'tut', 'tut@tut.tut', '$2y$10$PZg.AIifRVFhqm9ozVzAlORknf2I3hNcBA6SrEdP20Owzx4s5.c3W', ''),
('00000000001', 'enzo', 'enzo@enzo.enzo', '$2y$10$xyJtXBS0MWmAGmt2l92A8OmZBarF2MDwPf.9nN/UT.mz3SSfvmIje', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartucho`
--
ALTER TABLE `cartucho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CatalogadoPor` (`usuario`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartucho`
--
ALTER TABLE `cartucho`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartucho`
--
ALTER TABLE `cartucho`
  ADD CONSTRAINT `CatalogadoPor` FOREIGN KEY (`usuario`) REFERENCES `login` (`CPF`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
