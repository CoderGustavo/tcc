-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para lanchonete2
CREATE DATABASE IF NOT EXISTS `lanchonete2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lanchonete2`;

-- Copiando estrutura para tabela lanchonete2.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `niveis_acesso` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.admin: 0 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `preco` int(11) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idCategoria` (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.cardapio: 0 rows
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.categoria: 0 rows
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `datahora` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK1_idUsuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.comentario: 0 rows
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_Usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.endereco: 0 rows
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.itens_pedido
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int(11) NOT NULL,
  `id_cardapio` int(11) DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idCardapio` (`id_cardapio`),
  KEY `FK_idPedido` (`id_pedido`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.itens_pedido: 0 rows
/*!40000 ALTER TABLE `itens_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `total` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `forma_pagamento` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.pedido: 0 rows
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `numero_pessoas` int(11) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `datahora` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.reserva: 0 rows
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete2.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete2.usuario: 0 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
