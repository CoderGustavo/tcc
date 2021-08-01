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


-- Copiando estrutura do banco de dados para lanchonete
CREATE DATABASE IF NOT EXISTS `lanchonete` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lanchonete`;

-- Copiando estrutura para tabela lanchonete.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`id_categoria`),
  KEY `fkIdx_26` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.cardapio: 8 rows
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id`, `id_categoria`, `nome`, `preco`, `descricao`, `imagem`) VALUES
	(1, 1, 'X - Salada', '20.90\r\n', 'Pão, hamburguer, queijo, tomate, alface, maionese, ketchup', 'assets/img/menu/lanche1.jpg'),
	(2, 1, 'X - Bacon', '23', 'Pão, hamburguer, bacon, alface, tomate, queijo, maionese, ketchup', 'assets/img/menu/lanche2.png'),
	(3, 1, 'X - Burguer', '14', 'Pão, hamburguer, queijo, tomate, ketchup', 'assets/img/menu/lanche3.png'),
	(4, 1, 'X - Frango espcial', '28', 'Pão, hamburguer, queijo, ovo, bacon, tomate, alface, maionese', 'assets/img/menu/lanche4.jpg'),
	(5, 1, 'X - Egg', '18', 'Pão, hamburguer, queijo, ovo, batata palha, presunto, tomate, alface, maionese', 'assets/img/menu/lanche5.jpg'),
	(6, 1, 'X - Calabresa', '20', 'Pão, hamburguer, queijo, calabresa, alface, tomate, maionese', 'assets/img/menu/lanche6.jpg'),
	(7, 1, 'X - Frango', '23', 'Pão, hamburguer, queijo. frango, alface, tomate, cebola, presunto', 'assets/img/menu/lanche7.jpg'),
	(8, 1, 'X- Tudo', '33', 'Pão, hamburguer. quiejo, frango. ovo, bacon, presunto, calabresa, alface, tomate, maionese, ketchup', 'assets/img/menu/lanche8.jpg');
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.categoria: 1 rows
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nome`) VALUES
	(1, 'lanche');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `datahora` varchar(50) NOT NULL DEFAULT '',
  `qtd_estrela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_usuario`),
  KEY `fkIdx_20` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.comentario: 1 rows
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` (`id`, `id_usuario`, `comentario`, `status`, `datahora`, `qtd_estrela`) VALUES
	(26, 1, 'Adoreii ', 'Aprovado', '09/06/2021 11:35', 5);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.delivery
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL,
  `pedido` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `observacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`id_usuario`,`id_forma_pagamento`),
  KEY `fkIdx_23` (`id_usuario`),
  KEY `fkIdx_29` (`id_forma_pagamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.delivery: 0 rows
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.formaspagamento
CREATE TABLE IF NOT EXISTS `formaspagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.formaspagamento: 0 rows
/*!40000 ALTER TABLE `formaspagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `formaspagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `numero_pessoas` varchar(45) NOT NULL,
  `observacao` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`id`,`id_usuario`) USING BTREE,
  KEY `fkIdx_17` (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.reserva: 0 rows
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando estrutura para tabela lanchonete.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `identificacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lanchonete.usuario: 2 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`, `identificacao`) VALUES
	(1, 'Guilherme', 'guilhermeE@gmail.com', '1234', '19 3863 7238', 'Rua 45', '0'),
	(2, 'Pedro', 'gustavo@gmail.com', '1234', '19 3874 3921', 'Rua 3', '1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
