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

-- A despejar estrutura para tabela db.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `start` date NOT NULL COMMENT 'Dia da marcação.',
  `book_date` datetime DEFAULT current_timestamp() COMMENT 'Data em q foi feita a marcação',
  `payment_date` datetime DEFAULT current_timestamp() COMMENT 'Data em q foi realizado o pagamento.',
  `cancel_date` datetime DEFAULT NULL COMMENT 'Data em q foi cancelado ( se for )',
  `reason` varchar(255) DEFAULT NULL COMMENT 'Motivo do cancelamento',
  `discount` int(11) DEFAULT NULL,
  `number_people` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_tour`,`start`,`id`),
  KEY `FK_marcacao_tour` (`id_tour`),
  CONSTRAINT `FK_marcacao_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_marcacao_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as marcações feitas pelos clientes.';

-- A despejar dados para tabela db.appointment: ~6 rows (aproximadamente)
DELETE FROM `appointment`;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` (`id`, `id_user`, `id_tour`, `start`, `book_date`, `payment_date`, `cancel_date`, `reason`, `discount`, `number_people`) VALUES
	(1, 1, 2, '2023-07-15', '2023-07-14 01:02:40', '2023-07-14 01:02:43', NULL, NULL, NULL, 15),
	(4, 1, 2, '2023-07-20', '2023-07-16 23:38:08', '2023-07-16 23:38:08', NULL, NULL, NULL, 3),
	(0, 1, 3, '2023-07-18', '2023-07-16 22:40:08', '2023-07-16 22:40:09', NULL, NULL, NULL, 3),
	(5, 1, 3, '2023-07-19', '2023-07-17 00:01:19', '2023-07-17 00:01:19', NULL, NULL, NULL, 2),
	(6, 1, 3, '2023-07-26', '2023-07-17 09:00:41', '2023-07-17 09:00:41', NULL, NULL, NULL, 3),
	(2, 2, 2, '2023-07-15', '2023-07-14 04:06:00', '2023-07-14 04:06:02', NULL, NULL, NULL, 15),
	(3, 3, 2, '2023-07-16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-07-17 08:51:01', '          ', NULL, 30);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- A despejar estrutura para tabela db.comment_tour
CREATE TABLE IF NOT EXISTS `comment_tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tour` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post_date` date NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `classification` int(1) NOT NULL,
  PRIMARY KEY (`id_tour`,`id_user`),
  UNIQUE KEY `id` (`id`),
  KEY `FK_comment_tour_user` (`id_user`),
  CONSTRAINT `FK_comment_tour_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_comment_tour_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com comentários feitos por clientes nos tours';

-- A despejar dados para tabela db.comment_tour: ~0 rows (aproximadamente)
DELETE FROM `comment_tour`;
/*!40000 ALTER TABLE `comment_tour` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_tour` ENABLE KEYS */;

-- A despejar estrutura para tabela db.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as perguntas feitas regularmente';

-- A despejar dados para tabela db.faqs: ~0 rows (aproximadamente)
DELETE FROM `faqs`;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- A despejar estrutura para tabela db.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com os géneros dos utilizadores.';

-- A despejar dados para tabela db.gender: ~3 rows (aproximadamente)
DELETE FROM `gender`;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `description`) VALUES
	(1, 'Não definido'),
	(13, 'Feminino'),
	(14, 'Masculino');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- A despejar estrutura para tabela db.language
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as linguagens disponíveis ao utilizador no site.';

-- A despejar dados para tabela db.language: ~0 rows (aproximadamente)
DELETE FROM `language`;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
/*!40000 ALTER TABLE `language` ENABLE KEYS */;

-- A despejar estrutura para tabela db.nav_content
CREATE TABLE IF NOT EXISTS `nav_content` (
  `id` int(11) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `visible` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela que respresenta os conteudos da navbar no site.';

-- A despejar dados para tabela db.nav_content: ~0 rows (aproximadamente)
DELETE FROM `nav_content`;
/*!40000 ALTER TABLE `nav_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `nav_content` ENABLE KEYS */;

-- A despejar estrutura para tabela db.permission
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as permissões das roles.';

-- A despejar dados para tabela db.permission: ~5 rows (aproximadamente)
DELETE FROM `permission`;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`id`, `tag`, `description`) VALUES
	(1, 'BACKOFFICE_ACCESS', 'Acesso ao backoffice'),
	(2, 'USER_TABLE_ACCESS', 'Acesso à tabela utilizador'),
	(3, 'USER_INSERT', 'Permite ao utilizador inserir outro utilizador'),
	(4, 'USER_UPDATE', 'Permite ao utilizador editar outro utilizador'),
	(5, 'USER_DELETE', 'Permite ao utilizador apagar outro utilizador');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- A despejar estrutura para tabela db.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as roles disponíveis ao utilizador.';

-- A despejar dados para tabela db.role: ~2 rows (aproximadamente)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`) VALUES
	(1, 'Utilizador'),
	(10, 'Administrador');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- A despejar estrutura para tabela db.role_permission
CREATE TABLE IF NOT EXISTS `role_permission` (
  `role` int(1) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`role`,`permission`),
  KEY `FK_role_permission_permission` (`permission`),
  CONSTRAINT `FK_role_permission_permission` FOREIGN KEY (`permission`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_role_permission_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela que indica as permissões que cada role tem atribuida.';

-- A despejar dados para tabela db.role_permission: ~5 rows (aproximadamente)
DELETE FROM `role_permission`;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
INSERT INTO `role_permission` (`role`, `permission`) VALUES
	(10, 1),
	(10, 2),
	(10, 3),
	(10, 4),
	(10, 5);
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;

-- A despejar estrutura para tabela db.social_media
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `icon_class` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as redes sociais no footer do site.';

-- A despejar dados para tabela db.social_media: ~2 rows (aproximadamente)
DELETE FROM `social_media`;
/*!40000 ALTER TABLE `social_media` DISABLE KEYS */;
INSERT INTO `social_media` (`id`, `category`, `value`, `icon_class`) VALUES
	(1, 'Facebook', 'https://www.facebook.com/profile.php?id=100092558509457', 'social-platform-icon fa fa-facebook-square'),
	(2, 'Instagram', 'https://www.instagram.com/adayindouro/', 'social-platform-icon fa fa-instagram');
/*!40000 ALTER TABLE `social_media` ENABLE KEYS */;

-- A despejar estrutura para tabela db.tour
CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price_unit` int(11) DEFAULT NULL,
  `ending` time DEFAULT NULL,
  `tour_limit` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com as várias experiências disponíveis.';

-- A despejar dados para tabela db.tour: ~3 rows (aproximadamente)
DELETE FROM `tour`;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
INSERT INTO `tour` (`id`, `name`, `price_unit`, `ending`, `tour_limit`, `description`, `image`) VALUES
	(1, 'Airbnb 2019 Douro Most Unique Access Experience', 145, '17:30:00', 35, '  Embarque numa experiência exclusiva e autêntica no Vale do Douro. Desfrute de 11 degustações de vinhos, passeios de barco privativos, visitas a duas vinícolas e um almoço requintado preparado por um renomado chef. Mergulhe na rica cultura da região, conecte-se com os locais carismáticos e aprenda sobre os vinhos de mesa e o famoso vinho do Porto de uma forma divertida e envolvente.  ', 'tour1.png'),
	(2, 'Eleven Wine Tastings, Wineries, Farm to Table Chef, Garden Lunch', 115, '16:45:00', 30, '\r\nExperimente o Vale do Douro como nunca antes. Desfrute de 11 degustações de vinhos, visitas exclusivas a duas vinícolas com apresentações do enólogo, almoço do chef, passeios de barco privativos e autênticos encontros locais. Sem estresse, 100% de satisfação garantida. Descubra os tesouros escondidos da região e crie memórias inesquecíveis nesta excecional experiência vínica.', 'tour2.png'),
	(3, 'Douro Valley in a convertible Mercedes', 160, '17:00:00', 3, 'Experimente a derradeira aventura no Vale do Douro num luxuoso Mercedes E-Class descapotável. Delicie-se com os melhores vinhos, gastronomia e serviço profissional de foto/vídeo. Navegue ao longo do rio, saboreie vinhos do Porto e iguarias locais, visite duas quintas vinícolas locais e saboreie o almoço de um chef do Douro. Opte pela autenticidade e crie memórias inesquecíveis no Douro.', 'tour3.png');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com o body dos tours no site.';

-- A despejar dados para tabela db.tour_body: ~2 rows (aproximadamente)
DELETE FROM `tour_body`;
/*!40000 ALTER TABLE `tour_body` DISABLE KEYS */;
INSERT INTO `tour_body` (`id`, `edited_at`, `content`, `title`, `subtitle`) VALUES
	(1, '2023-07-12 21:42:50', 'O Airbnb concedeu este passeio em 2019 como a EXPERIÊNCIA DE ACESSO MAIS EXCLUSIVA ao Douro, com base na escolha dos consumidores de autenticidade, história e feedback dos melhores clientes.\r\nEstamos muito felizes com o retorno dos nossos hóspedes sobre o nosso compromisso e paixão pelo Vale do Douro\r\n<br><br>\r\nEsta experiência tem 11 degustações de vinhos, 2 vinícolas, visita exclusiva com o vinicultor, almoço de chef exclusivo, barcos privados, O QUE MAIS?!!\r\n<br><br>\r\nVamos visitar o Douro menos turístico, para nós o que importa é o povo carismático que você vai conhecer ao longo de toda a experiência. Pessoas autênticas, com muito conhecimento, mas com muito caráter e personalidade.\r\n<br><br>\r\nEsqueça as maiores marcas comerciais, não é para nós...\r\n<br><br>\r\nComigo você vai aprender toda a história do vinho, mas de uma forma divertida não chata, vamos falar sobre vinhos de mesa que bebemos todos os dias, mas também o famoso vinho do Porto\r\n<br><br>\r\nComeçamos com um cruzeiro de barco privado, onde vamos provar iguarias do Douro com bebidas e conhecer os piratas loucos:) para nos contar e explicar todas as histórias autênticas do Vale do Douro\r\n<br><br>\r\nEm seguida, teremos uma visita exclusiva com o enólogo em um pequeno produtor e nos prepararemos para algumas surpresas que você vai adorar... também temos vinhos aqui, é claro\r\n<br><br>\r\nAlmoço em um evento exclusivo da mais alta qualidade com uma degustação de chef de comida do Douro combinada com os vinhos do chef e algumas apresentações mais especiais e únicas dos costumes locais e da cultura vinícola.', '', 'Acesso privilegiado ao Vale do Douro (experiência premiada)'),
	(2, '2023-07-12 21:42:56', '11 Degustações de vinhos, 2 vinícolas, visita exclusiva com o vinicultor, Almoço do Chef no jardim, Barcos Privados, O QUE MAIS?!!\r\n<br><br>\r\nVisitaremos o Vale do Douro como se fosse com um amigo, um dia inesquecível/relaxante, uma experiência inesquecível.\r\nComigo, tudo é feito ao seu próprio ritmo, sem limites de tempo, sem prazos para nada.\r\n<br><br>\r\nNossa palavra-chave e o lema desta experiência são:\r\nSem ESTRESSE, 100% de satisfação garantida\r\n<br><br>\r\nVamos ver o Douro turístico que 99% das pessoas veem, mas quero que vocês sejam os 1% dos turistas que verão o Douro que mais ninguém vê.\r\nVou mostrar-lhe as estradas mais bonitas do Douro menos turístico e os lugares mais autênticos, da população local com seus costumes e suas comidas e vinhos.\r\n<br><br>\r\nTeremos uma visita exclusiva com o enólogo, aprenderemos a cultura vinícola de uma forma divertida, não chata como nas principais marcas comerciais, que você pode ver na cidade do Porto nas adegas.\r\nMostraremos algo diferente, prepare-se para se surpreender.\r\n<br><br>\r\nCruzeiro pelo rio em um barco privado com lanches e bebidas, um dos melhores cruzeiros fluviais da sua vida.\r\n<br><br>\r\nAlmoço do chef com degustação de autêntica comida do Douro combinada com os vinhos do chef, temos várias surpresas que você vai adorar.\r\nUm evento exclusivo da mais alta qualidade, como todos os nossos eventos, apenas para os nossos hóspedes.\r\n<br><br>\r\nVocê nunca vai esquecer essa experiência vinícola...', '', 'Onze vinhos, barco privado e almoço orgânico'),
	(3, '2023-07-12 21:43:00', 'Esqueça os passeios normais ao Vale do Douro feitos em carrinhas, temos ao seu dispor uma luxuosa Mercedes descapotável Classe E.\r\n<br><br>\r\nEste programa é o melhor de 3 experiências juntas em uma:\r\n\r\n- Melhor passeio em um Mercedes Classe E conversível.\r\n- Melhores vinhos e experiência gastronômica\r\n- O melhor serviço de foto e vídeo PRO para você se lembrar mais tarde em casa.\r\n<br><br>\r\nA minha experiência, que não chamo de tour, só tem eventos privados para os meus convidados, sem se misturar com pessoas de outros tours como fazem outras operadoras, nos barcos, adegas e almoços ...\r\n<br><br>\r\nEste não é um passeio, é um dia diferente e memorável com um amigo que irá mostrar-lhe as vistas deslumbrantes do Vale do Douro, ao volante de um Mercedes descapotável.\r\n<br><br>\r\nNo cruzeiro fluvial a bordo veremos paisagens deslumbrantes e conheceremos a história do Vale do Douro com guias privados ... degustaremos diversos vinhos do Porto juntamente com comidas locais feitas pela população local.\r\n<br><br>\r\nEm seguida iremos visitar a quinta mais antiga do Douro Est.1638 onde teremos uma prova de vinhos comentada exclusiva e teremos contacto direto com as vinhas onde poderá degustar as uvas se desejar.\r\n<br><br>\r\nPara fechar com chave de ouro, iremos visitar a aldeia vinícola mais antiga do douro e almoçar no FARM2TABLE Chef onde iremos provar comidas locais incríveis e 4 vinhos de mesa, incluindo vinhos premiados mundialmente\r\n<br><br>\r\nEsqueça os chefs Michelin, opte pela autenticidade do Douro.', '', 'Vale do Douro em um Mercedes conversível');
/*!40000 ALTER TABLE `tour_body` ENABLE KEYS */;

-- A despejar estrutura para tabela db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `nacionality` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `profile_image` varchar(100) DEFAULT NULL,
  `verified` int(1) DEFAULT NULL,
  `display_language` int(3) DEFAULT 1,
  `gender` int(1) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  KEY `FK_user_sex` (`gender`) USING BTREE,
  KEY `FK_user_role` (`role`),
  CONSTRAINT `FK_user_gender` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela com os vários utilizadores.';

-- A despejar dados para tabela db.user: ~6 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `phone_number`, `nacionality`, `birthdate`, `creation_date`, `profile_image`, `verified`, `display_language`, `gender`, `role`, `password`) VALUES
	(1, 'Filipe Guimarães', 'manolipas@hotmail.com', '916543260', 'Português', '2000-10-27', '2023-07-14 00:38:23', NULL, 1, 1, 14, 10, 'c510cd8607f92e1e09fd0b0d0d035c16d2428fa4'),
	(2, 'João Maria', 'joaomaria@hotmail.com', '911114534', 'Português', '2017-07-15', '2023-07-14 04:05:36', NULL, 1, 1, 14, 1, '8cb2237d0679ca88db6464eac60da96345513964'),
	(3, 'Miguel Faria', 'faria@yahoo.pt', '918734741', 'Jordanês', '2007-02-06', '2023-07-14 04:24:23', NULL, 1, 1, 13, 1, '8cb2237d0679ca88db6464eac60da96345513964'),
	(15, 'João Miguel', 'manolipas69@gmail.com', '917264121', 'Macau', '2004-07-21', '2023-07-17 04:46:31', NULL, 0, 1, 14, 1, 'c510cd8607f92e1e09fd0b0d0d035c16d2428fa4'),
	(27, 'Teresa', 'tmbfsg@hotmail.com', '938458381', 'Português', '2023-07-03', '2023-07-17 05:44:31', 'O-Dazai-de-Bungou-Stray-Dogs-foi-inspirado-no-No.jpg', 1, 1, 13, 10, 'c510cd8607f92e1e09fd0b0d0d035c16d2428fa4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
