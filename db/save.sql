-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table sfentreprisedemo.doctrine_migration_versions : ~1 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230802084119', '2023-08-03 11:24:10', 98);

-- Listage des données de la table sfentreprisedemo.employe : ~0 rows (environ)
INSERT INTO `employe` (`id`, `entreprise_id`, `nom`, `prenom`, `date_naissance`, `date_embauche`, `ville`) VALUES
	(1, 1, 'MURMANN', 'Mickaël', '1978-08-03 13:29:01', '2010-08-03 13:29:06', 'STRASBOURG'),
	(2, 1, 'MATHIEU', 'Quentin', '1992-08-03 13:29:22', '2019-08-03 13:29:27', 'STRASBOURG'),
	(3, 3, 'DUCOURNAU', 'Charly', '2001-08-28 13:29:39', '2022-02-20 13:29:45', 'STRASBOURG'),
	(4, 3, 'DOE', 'John', '2030-08-03 13:30:07', '2076-08-03 13:30:11', 'LYON');

-- Listage des données de la table sfentreprisedemo.entreprise : ~0 rows (environ)
INSERT INTO `entreprise` (`id`, `raison_sociale`, `date_creation`, `adresse`, `cp`, `ville`) VALUES
	(1, 'ELAN FORMATION', '2023-08-03 13:27:41', '14 rue du Rhône', '67000', 'STRASBOURG'),
	(2, 'COACTIS', '2023-08-03 00:00:00', '11 rue de l\'avenue', '75000', 'PARIS'),
	(3, 'ENTREPRISE', '2023-08-03 13:28:26', '1 rue Isaac Newton', '69000', 'LYON'),
	(4, 'TEST ENTREPRISE', '2018-02-01 00:00:00', '18 rue Newton', '67000', 'STRASBOURG');

-- Listage des données de la table sfentreprisedemo.messenger_messages : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
