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

-- Dumping structure for table lanchonete2.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nivel_acesso` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.admins: 1 rows
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `id_usuario`, `nivel_acesso`) VALUES
	(1, 2, '1');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.avaliacoes
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `avaliacao` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `datahora` varchar(50) NOT NULL DEFAULT '',
  `estrela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.avaliacoes: 6 rows
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` (`id`, `id_usuario`, `avaliacao`, `status`, `datahora`, `estrela`) VALUES
	(15, 2, 'melhor lanche que já comi.', 'Aprovado', '09/09/2021 21:38', 5),
	(14, 2, 'achei interessante', 'Aprovado', '19/08/2021 14:26', 3),
	(16, 0, 'topzera hein', 'Pendente', '27/09/2021 17:36', 4),
	(17, 2, 'topzera hein', 'Aprovado', '27/09/2021 17:36', 5),
	(18, 2, 'comida boa, porém pessimo atendimento.', 'Aprovado', '28/09/2021 15:19', 3),
	(19, 2, 'aaaaaaaa', 'Pendente', '08/10/2021 22:40', 4);
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.cardapio: ~2 rows (approximately)
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id`, `nome`, `preco`, `imagem`) VALUES
	(1, 'x-tudo', 30, 'View/assets/img/menu/lanche1.jpg'),
	(2, 'x-salada\r\n', 30, NULL);
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.enderecos: ~3 rows (approximately)
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` (`id`, `id_usuario`, `logradouro`, `numero`, `referencia`, `bairro`) VALUES
	(5, 2, 'rua pedro consentini', 145, 'proximo a rayontex', 'verde vale'),
	(6, 2, 'Rua dos Itaiaçus', 145, 'rua do mercado altas horas', 'Nova Jacutinga'),
	(8, 2, 'rua 3', 467, 'atrás do supermercado cubatão', 'cubatão');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.ingredientes
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `retirar` varchar(50) NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.ingredientes: ~4 rows (approximately)
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` (`id`, `nome`, `retirar`) VALUES
	(3, 'pão de Hamburguer', 'nao'),
	(4, 'Carne 180g', 'nao'),
	(6, 'tomate', 'sim');
/*!40000 ALTER TABLE `ingredientes` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.ingredientes_cardapio
CREATE TABLE IF NOT EXISTS `ingredientes_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingrediente` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ingredientes_cardapio_ingredientes` (`id_ingrediente`),
  KEY `FK_ingredientes_cardapio_cardapio` (`id_cardapio`),
  CONSTRAINT `FK_ingredientes_cardapio_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id`),
  CONSTRAINT `FK_ingredientes_cardapio_ingredientes` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.ingredientes_cardapio: ~3 rows (approximately)
/*!40000 ALTER TABLE `ingredientes_cardapio` DISABLE KEYS */;
INSERT INTO `ingredientes_cardapio` (`id`, `id_ingrediente`, `id_cardapio`) VALUES
	(1, 4, 1),
	(2, 4, 2),
	(3, 3, 1),
	(4, 6, 1);
/*!40000 ALTER TABLE `ingredientes_cardapio` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.itens_pedido
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idPedido` (`id_pedido`),
  CONSTRAINT `FK_itens_pedido_pedidos` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.itens_pedido: ~0 rows (approximately)
/*!40000 ALTER TABLE `itens_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_pedido` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.pedidos: ~4 rows (approximately)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`id`, `id_endereco`, `id_usuario`, `total`, `status`, `forma_pagamento`, `obs`, `entrega`) VALUES
	(1, 2, 3, '50', 'Entregue', 'dinheiro', 'retira o tomate', 'entrega'),
	(2, 1, 2, '30', 'Pendente', 'dinheiro', 'tira o tomate', 'retirada'),
	(3, 1, 2, '30', 'Pendente', 'dinheiro', 'aaaaaaaa', 'local'),
	(4, 2, 2, '30', 'Entregue', 'dinheiro', 'aaaaa', 'entrega');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_pessoas` int(11) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Livre',
  `datahora` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.reservas: 10 rows
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `id_usuario`, `numero_pessoas`, `observacao`, `status`, `datahora`) VALUES
	(1, 0, NULL, NULL, 'Livre', NULL),
	(2, NULL, NULL, NULL, 'Livre', NULL),
	(3, NULL, NULL, NULL, 'Livre', NULL),
	(4, NULL, NULL, NULL, 'Livre', NULL),
	(5, NULL, NULL, NULL, 'Livre', NULL),
	(6, NULL, NULL, NULL, 'Livre', NULL),
	(7, NULL, NULL, NULL, 'Livre', NULL),
	(8, NULL, NULL, NULL, 'Livre', NULL),
	(9, NULL, NULL, NULL, 'Livre', NULL),
	(10, NULL, NULL, NULL, 'Livre', NULL);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Dumping structure for table lanchonete2.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table lanchonete2.usuarios: ~3 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
	(2, 'gustavo ornaghi antunes', 'gustavoornaghiantunes@gmail.com', '123', '(35) 98835-0841'),
	(17, 'Adalcio Soares Antunes', 'adalciosoaresantunes@yahoo.com.br', '1234', '35997186186'),
	(18, 'Gislaine Cristina Ornaghi', 'gislainecristinaornaghi@yahoo.com.br', '123', '(35) 98835-0841');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
