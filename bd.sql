-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lanchonete2
CREATE DATABASE IF NOT EXISTS `lanchonete2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lanchonete2`;

-- Dumping structure for table lanchonete2.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `niveis_acesso` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.admin: 1 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `id_usuario`, `niveis_acesso`) VALUES
	(1, 2, '1');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.avaliacao
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `datahora` varchar(50) NOT NULL DEFAULT '',
  `estrela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.avaliacao: 2 rows
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
INSERT INTO `avaliacao` (`id`, `id_usuario`, `comentario`, `status`, `datahora`, `estrela`) VALUES
	(15, 2, 'melhor lanche que já comi.', 'Aprovado', '09/09/2021 21:38', 5),
	(14, 2, 'achei interessante', 'Aprovado', '19/08/2021 14:26', 3);
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.cardapio: 2 rows
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id`, `nome`, `preco`, `imagem`) VALUES
	(1, 'x-tudo', 30, NULL),
	(2, 'x-salada\r\n', 30, NULL);
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.endereco: 1 rows
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`id`, `id_Usuario`, `logradouro`, `numero`, `complemento`, `bairro`) VALUES
	(1, 2, 'rua pedro consentini', 145, 'casa', 'verde vale');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.ingrediente_cardapio
CREATE TABLE IF NOT EXISTS `ingrediente_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cardapio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_cardapio_id` (`cardapio_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.ingrediente_cardapio: ~2 rows (approximately)
/*!40000 ALTER TABLE `ingrediente_cardapio` DISABLE KEYS */;
INSERT INTO `ingrediente_cardapio` (`id`, `nome`, `cardapio_id`) VALUES
	(3, 'pão de Hamburguer ', 1),
	(4, 'Carne 180g', 1),
	(5, 'pão de Hamburguer ', 2);
/*!40000 ALTER TABLE `ingrediente_cardapio` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.itens_pedido
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idPedido` (`id_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.itens_pedido: 0 rows
/*!40000 ALTER TABLE `itens_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_pedido` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_endereco` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `forma_pagamento` varchar(50) NOT NULL DEFAULT '',
  `obs` varchar(255) NOT NULL,
  `entrega` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`),
  KEY `id_endereco` (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.pedido: 4 rows
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id`, `id_endereco`, `id_usuario`, `total`, `status`, `forma_pagamento`, `obs`, `entrega`) VALUES
	(1, 1, 3, '50', 'Entregue', 'dinheiro', 'retira o tomate', 'sim'),
	(2, 1, 0, '30', 'Pendente', 'dinheiro', 'tira o tomate', ''),
	(3, 1, 0, '30', 'Pendente', 'dinheiro', 'aaaaaaaa', ''),
	(4, 1, 2, '30', 'Entregue', 'dinheiro', 'aaaaa', 'sim');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `numero_pessoas` int(11) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `datahora` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.reserva: 1 rows
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `id_usuario`, `numero_pessoas`, `observacao`, `status`, `datahora`) VALUES
	(7, 2, 8, 'n gostei de vcs', 'Aprovado', '09-09-2021 15:30');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.usuario: 1 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
	(2, 'gustavo ornaghi antunes', 'gustavoornaghiantunes@gmail.com', '123', '(35) 98835-0841');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
