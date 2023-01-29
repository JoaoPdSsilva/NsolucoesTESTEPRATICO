-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jan-2023 às 18:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbtestepratico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `Nome_Completo` varchar(50) NOT NULL,
  `CEP` bigint(8) NOT NULL,
  `Enderec` varchar(50) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `Bairro` varchar(50) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Email_User` varchar(50) NOT NULL,
  `CPF_User` bigint(11) NOT NULL,
  `Tel_User` varchar(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `status_user` varchar(10) NOT NULL DEFAULT 'Ativo',
  `id` int(11) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Nome_Completo`, `CEP`, `Enderec`, `Numero`, `Complemento`, `Bairro`, `Cidade`, `Estado`, `Email_User`, `CPF_User`, `Tel_User`, `usuario`, `status_user`, `id`, `senha`) VALUES
('adm', 13097144870, 'casa dos bobo', 12, '', 'primavera', 'lins', 'São Paulo', 'adm@123aa.com', 47538083863, '12345678', 'jaopedro', 'Ativo', 23, '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
