-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2025 às 21:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sejuc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `login`, `senha`) VALUES
(2, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `idade` varchar(3) NOT NULL,
  `genero` varchar(999) NOT NULL,
  `mail` varchar(9999) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `login` varchar(999) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `ocupacao` varchar(999) NOT NULL,
  `interesse` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `idade`, `genero`, `mail`, `celular`, `cep`, `cpf`, `login`, `senha`, `ocupacao`, `interesse`) VALUES
(3, 'dante', '15', 'masculino', 'teste@gmail.com', '888787878', '87083420', '999999', 'teste', 'teste', 'estudando', 'profissionalizantes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionario`
--

CREATE TABLE `questionario` (
  `id` int(11) NOT NULL,
  `cursos` varchar(200) NOT NULL,
  `interesse` varchar(200) NOT NULL,
  `horarios` varchar(200) NOT NULL,
  `esportes` varchar(200) NOT NULL,
  `espaco_esportivo` varchar(200) NOT NULL,
  `conteudo` varchar(200) NOT NULL,
  `musica` varchar(200) NOT NULL,
  `conhece` varchar(200) NOT NULL,
  `informar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questionario`
--

INSERT INTO `questionario` (`id`, `cursos`, `interesse`, `horarios`, `esportes`, `espaco_esportivo`, `conteudo`, `musica`, `conhece`, `informar`) VALUES
(1, 'Mídia e Multimeios', 'sim', 'manha', '', 'gggg', 'filmes', '', 'sim', 'outros'),
(2, 'Mídia e Multimeios,Empreendedorismo', 'sim', 'manha', '', 'gggg', 'filmes', '', 'sim', 'whatsapp'),
(3, 'Marketing,Arte e Cultura', 'sim', 'manha', '', 'gggg', 'filmes', '', 'sim', 'email'),
(4, 'Marketing,Vendas,Agronomia', 'nao', 'noite', '', 'gggg', 'jogos', '', 'sim', 'email'),
(5, 'Arte e Cultura,Empreendedorismo,Agronomia', 'nao', 'tarde', '', 'gggg', 'redes sociais', '', 'sim', 'email'),
(6, 'Mídia e Multimeios,Vendas', 'sim', 'tarde', '', 'gggg', 'series', '', 'sim', 'redes sociais'),
(7, 'Informática,Arte e Cultura,Vendas', 'nao', 'noite', '', 'gggg', 'series', '', 'sim', 'email'),
(8, 'Marketing,Arte e Cultura,Empreendedorismo', 'sim', 'noite', '', 'gggg', 'jogos', '', 'sim', 'escola'),
(9, 'Informática', 'sim', 'manha', '', 'gggg', 'filmes', '', 'sim', 'email'),
(10, 'Marketing,Empreendedorismo,Vendas,Agronomia', 'nao', 'manha', 'futebol,skate,dança', 'gggg', 'redes sociais', 'hiphop,rock,eletromica,outro', 'nao', 'email');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionario_cadastro`
--

CREATE TABLE `questionario_cadastro` (
  `id` int(11) NOT NULL,
  `id_jovem` int(11) NOT NULL,
  `id_respotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questionario_cadastro`
--
ALTER TABLE `questionario_cadastro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `questionario_cadastro`
--
ALTER TABLE `questionario_cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
