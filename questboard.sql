-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/07/2025 às 02:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `questboard`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `idColab` int(11) NOT NULL,
  `nomeColab` varchar(100) NOT NULL,
  `funcaoColab` varchar(50) NOT NULL,
  `senhaColab` varchar(100) NOT NULL,
  `confirmarSenhaColab` varchar(100) NOT NULL,
  `emailColab` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `colaboradores`
--

INSERT INTO `colaboradores` (`idColab`, `nomeColab`, `funcaoColab`, `senhaColab`, `confirmarSenhaColab`, `emailColab`, `status`) VALUES
(1, 'Yuri', 'Administrador', '123', '123', 'yuribrollo97@gmail.com', 'ativo'),
(6, 'João', 'Programador', '456', '456', 'joao@gmail.com', 'ativo'),
(10, 'Maria', 'Artista', '098', '098', 'maria@gmail.com', 'ativo'),
(11, 'Ricardo', 'Game Designer', '852', '852', 'ricardo@gmail.com', 'ativo'),
(12, 'Brabo', 'Programador', '987', '987', 'brabo@gmail.com', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `idTarefa` int(11) NOT NULL,
  `nomeTarefa` varchar(100) NOT NULL,
  `nomeColab` varchar(100) NOT NULL,
  `descTarefa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`idTarefa`, `nomeTarefa`, `nomeColab`, `descTarefa`) VALUES
(2, 'Programar Inimigo', 'Brabo', 'Fase 4'),
(3, 'Criar Level Design', 'Yuri', 'Fase 6'),
(4, 'Criar Personagem', 'Ricardo', 'Escrever história completa'),
(5, 'Programar pulo', 'Maria', 'programar pulo com unity6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`idColab`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`idTarefa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `idColab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `idTarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
