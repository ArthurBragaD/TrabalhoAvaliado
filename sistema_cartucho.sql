-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Maio-2023 às 10:49
-- Versão do servidor: 8.0.32-0ubuntu0.22.04.2
-- versão do PHP: 7.3.33-8+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Sistema_cartucho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartucho`
--

CREATE TABLE `cartucho` (
  `id` int NOT NULL,
  `nome` text COLLATE utf8mb4_general_ci NOT NULL,
  `sistema` text COLLATE utf8mb4_general_ci NOT NULL,
  `tela` blob,
  `ano` int NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `localizado` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cartucho`
--

INSERT INTO `cartucho` (`id`, `nome`, `sistema`, `tela`, `ano`, `usuario`, `localizado`) VALUES
(29, 'a', 'a', NULL, 1, '00000000000', NULL),
(30, 'asd', '1421', NULL, 1231, '10000000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `deletados`
--

CREATE TABLE `deletados` (
  `id` int NOT NULL,
  `qex` text COLLATE utf8mb4_general_ci NOT NULL,
  `nome` text COLLATE utf8mb4_general_ci NOT NULL,
  `sistema` text COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ano` int NOT NULL,
  `data` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `deletados`
--

INSERT INTO `deletados` (`id`, `qex`, `nome`, `sistema`, `usuario`, `ano`, `data`) VALUES
(26, '0', 'a', 'a', '0', 1, '2023-04-10'),
(27, '0', 'testes', 'testes', '0', 1997, '2023-04-10'),
(28, '0', 'teste', 'dasdas', '0', 2221, '2023-04-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `CPF` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nome` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `senha` text COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`CPF`, `nome`, `email`, `senha`, `tipo`) VALUES
('00000000000', 'tut', 'tut@tut.tut', '$2y$10$cnpAYhOHqvaiS6RiG2VZIuwJMAKBw5mngxLq0uFuNFrZix7HRFbbO', 'adm'),
('00000000002', 'Eduardo Brião', 'a@a.com', '$2y$10$VG4jN2dBS/NdLCPSomTRXOvZzwoGy0paFOO/FsxqRQnr7PHHriehe', 'usuario'),
('10000000000', 'Enzo ', 'enzo@enzo.enzo', '$2y$10$wqwP.4HiQzilR4O.R1UPvuO3o.Slk.Q6GEqYiYby.wxJCryhPcrr6', 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistemas`
--

CREATE TABLE `sistemas` (
  `nome` varchar(255) NOT NULL,
  `ano` int NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cartucho`
--
ALTER TABLE `cartucho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CatalogadoPor` (`usuario`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices para tabela `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartucho`
--
ALTER TABLE `cartucho`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cartucho`
--
ALTER TABLE `cartucho`
  ADD CONSTRAINT `CatalogadoPor` FOREIGN KEY (`usuario`) REFERENCES `login` (`CPF`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
