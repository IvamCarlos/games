-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Dez-2018 às 03:17
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_games_finished`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_games`
--

CREATE TABLE `tbl_games` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `plataforma_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `tbl_generos`
--

CREATE TABLE `tbl_generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_generos`
--

INSERT INTO `tbl_generos` (`id`, `genero`) VALUES
(1, 'Ação/Aventura'),
(2, 'RPG'),
(3, 'Esporte'),
(4, 'Corrida'),
(5, 'Plataforma'),
(6, 'Luta'),
(7, 'Tiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_plataformas`
--

CREATE TABLE `tbl_plataformas` (
  `id` int(11) NOT NULL,
  `plataforma` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_plataformas`
--

INSERT INTO `tbl_plataformas` (`id`, `plataforma`) VALUES
(1, 'NES/Famicom'),
(2, 'Game Boy Color'),
(3, 'Mega Drive/Genesis'),
(4, 'Super Nintendo/Super Famicom'),
(5, 'Game Boy Advance'),
(6, 'Playstation'),
(7, 'Nintendo 64'),
(8, 'Playstation 2'),
(9, 'Nintendo GameCube'),
(10, 'Nintendo DS'),
(11, 'PSP'),
(12, 'XBOX 360'),
(13, 'Playstation 3'),
(14, 'Nintendo Wii'),
(15, 'Nintendo 3DS'),
(16, 'PC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'email@email.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_games`
--
ALTER TABLE `tbl_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_generos`
--
ALTER TABLE `tbl_generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plataformas`
--
ALTER TABLE `tbl_plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_games`
--
ALTER TABLE `tbl_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_generos`
--
ALTER TABLE `tbl_generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_plataformas`
--
ALTER TABLE `tbl_plataformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
