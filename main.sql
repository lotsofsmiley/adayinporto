-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.21-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para db
CREATE DATABASE IF NOT EXISTS `db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db`;

-- A despejar estrutura para tabela db.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telemovel` int(11) DEFAULT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `cod_postal` int(11) DEFAULT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `FK_cliente_cod_postal` (`cod_postal`),
  KEY `FK_cliente_login` (`login`),
  CONSTRAINT `FK_cliente_cod_postal` FOREIGN KEY (`cod_postal`) REFERENCES `cod_postal` (`cod_postal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cliente_login` FOREIGN KEY (`login`) REFERENCES `login` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com os vários clientes.';

-- Exportação de dados não seleccionada.

-- A despejar estrutura para tabela db.cod_postal
CREATE TABLE IF NOT EXISTS `cod_postal` (
  `cod_postal` int(11) NOT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_postal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com os diferentes códigos postais.';

-- Exportação de dados não seleccionada.

-- A despejar estrutura para tabela db.login
CREATE TABLE IF NOT EXISTS `login` (
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL COMMENT 'Encriptação SHA1',
  `role` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com os vários logins de clientes.';

-- Exportação de dados não seleccionada.

-- A despejar estrutura para tabela db.marcacao
CREATE TABLE IF NOT EXISTS `marcacao` (
  `id_cliente` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime DEFAULT NULL,
  `data_marc` datetime DEFAULT NULL COMMENT 'Data em q foi feita a marcação',
  `data_pag` datetime DEFAULT NULL COMMENT 'Data em q foi realizado o pagamento.',
  `data_cancel` datetime DEFAULT NULL COMMENT 'Data em q foi cancelado ( se for )',
  `motivo` varchar(255) DEFAULT NULL COMMENT 'Motivo do cancelamento',
  `desconto` int(11) DEFAULT NULL,
  `n_pessoas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`id_tour`,`data_inicio`),
  KEY `FK_marcacao_tour` (`id_tour`),
  CONSTRAINT `FK_marcacao_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_marcacao_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as marcações feitas pelos clientes.';

-- Exportação de dados não seleccionada.

-- A despejar estrutura para tabela db.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `role` varchar(1) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados não seleccionada.

-- A despejar estrutura para tabela db.tour
CREATE TABLE IF NOT EXISTS `tour` (
  `id_tour` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `preco_unit` int(11) DEFAULT NULL,
  `fim_previsto` time DEFAULT NULL,
  `lim_pessoas` int(11) DEFAULT NULL,
  `descricao` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id_tour`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as várias experiências disponíveis.';

-- Exportação de dados não seleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
