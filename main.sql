-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
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
CREATE DATABASE IF NOT EXISTS `db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db`;

-- A despejar estrutura para tabela db.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `nacionality` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `profile_image` int(24) DEFAULT NULL,
  `verified` int(1) DEFAULT NULL,
  `display_language` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela com os vários clientes.';

-- A despejar dados para tabela db.client: ~0 rows (aproximadamente)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- A despejar estrutura para tabela db.login
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL COMMENT 'Encriptação SHA1',
  `role` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela com os vários logins de clientes.';

-- A despejar dados para tabela db.login: ~0 rows (aproximadamente)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

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
  CONSTRAINT `FK_marcacao_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_marcacao_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela com as marcações feitas pelos clientes.';

-- A despejar dados para tabela db.marcacao: ~0 rows (aproximadamente)
DELETE FROM `marcacao`;
/*!40000 ALTER TABLE `marcacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcacao` ENABLE KEYS */;

-- A despejar estrutura para tabela db.permission
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela db.permission: ~0 rows (aproximadamente)
DELETE FROM `permission`;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- A despejar estrutura para tabela db.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `role` varchar(2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela db.roles: ~0 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- A despejar estrutura para tabela db.role_permission
CREATE TABLE IF NOT EXISTS `role_permission` (
  `role` varchar(2) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`role`,`permission`) USING BTREE,
  KEY `FK__permissoes` (`permission`) USING BTREE,
  CONSTRAINT `FK_role_permissao_roles` FOREIGN KEY (`role`) REFERENCES `roles` (`role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_role_permission_permission` FOREIGN KEY (`permission`) REFERENCES `permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela db.role_permission: ~0 rows (aproximadamente)
DELETE FROM `role_permission`;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;

-- A despejar estrutura para tabela db.tour
CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price_unit` int(11) DEFAULT NULL,
  `ending` time DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela com as várias experiências disponíveis.';

-- A despejar dados para tabela db.tour: ~2 rows (aproximadamente)
DELETE FROM `tour`;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
INSERT INTO `tour` (`id`, `name`, `price_unit`, `ending`, `limit`, `description`) VALUES
	(11, 'a', 11, '16:27:00', 21, '11111'),
	(12, 'b', 11, '16:28:00', 11, '1adaw');
/*!40000 ALTER TABLE `tour` ENABLE KEYS */;

-- A despejar estrutura para tabela db.tour_body
CREATE TABLE IF NOT EXISTS `tour_body` (
  `id` int(11) NOT NULL,
  `edited_at` datetime DEFAULT current_timestamp(),
  `content` longtext DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `subtitle` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_tour_body_tour` FOREIGN KEY (`id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela db.tour_body: ~0 rows (aproximadamente)
DELETE FROM `tour_body`;
/*!40000 ALTER TABLE `tour_body` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour_body` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
