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


CREATE DATABASE IF NOT EXISTS `veloxs73_tcc`;
USE `veloxs73_tcc`;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nivel_acesso` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`),
  CONSTRAINT `FK_admins_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `avaliacao` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `datahora` varchar(50) NOT NULL DEFAULT '',
  `estrela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_idUsuario` (`id_usuario`),
  CONSTRAINT `FK_avaliacoes_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `categorias_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `imagem` varchar(100) NOT NULL,
  `qtd_vendido` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cardapio_categorias_cardapio` (`id_categoria`),
  CONSTRAINT `FK_cardapio_categorias_cardapio` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_cardapio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `FK_enderecos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `retirar` varchar(50) NOT NULL DEFAULT 'nao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ingredientes_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingrediente` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ingredientes_cardapio_ingredientes` (`id_ingrediente`),
  KEY `FK_ingredientes_cardapio_cardapio` (`id_cardapio`),
  CONSTRAINT `FK_ingredientes_cardapio_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id`),
  CONSTRAINT `FK_ingredientes_cardapio_ingredientes` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `itens_mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `obs` varchar(255) DEFAULT '',
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_itens_mesa_cardapio` (`id_cardapio`),
  CONSTRAINT `FK_itens_mesa_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_cardapio` int(11) NOT NULL,
  `obs` varchar(255) DEFAULT '',
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idPedido` (`id_pedido`),
  KEY `FK_itens_pedido_cardapio` (`id_cardapio`),
  CONSTRAINT `FK_itens_pedido_cardapio` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `total` varchar(50) DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `forma_pagamento` varchar(50) DEFAULT '',
  `entrega` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`),
  KEY `id_endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `numero_pessoas` int(11) NOT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Livre',
  `datahora` varchar(50) NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_idUsuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


