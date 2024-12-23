-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 déc. 2024 à 20:49
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agenceimmo5`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `directeur_id` int NOT NULL,
  `siege_id` int NOT NULL,
  `numero_agence` double NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19AA9E82E7EE8` (`directeur_id`),
  KEY `IDX_64C19AA9BF006E8B` (`siege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `directeur_id`, `siege_id`, `numero_agence`, `adresse`) VALUES
(1, 1, 1, 75, 'Paris'),
(2, 1, 3, 75, 'Paris'),
(3, 1, 1, 75.12, 'Paris -12'),
(4, 1, 1, 75.7, 'Paris Defence'),
(5, 3, 4, 69.1, 'Lyon Perrache'),
(6, 3, 4, 69.5, 'Lyon Gare'),
(7, 5, 10, 13.2, 'Nice'),
(8, 2, 3, 31.1, 'Toulouse'),
(9, 4, 9, 59.1, 'Lille');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorie_id` int NOT NULL,
  `client_id` int NOT NULL,
  `agence_id` int NOT NULL,
  `employe_id` int NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` double NOT NULL,
  `prix` int NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66BCF5E72D` (`categorie_id`),
  KEY `IDX_23A0E6619EB6921` (`client_id`),
  KEY `IDX_23A0E66D725330D` (`agence_id`),
  KEY `IDX_23A0E661B65292` (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `client_id`, `agence_id`, `employe_id`, `titre`, `adresse`, `images`, `type`, `surface`, `prix`, `owner`, `description`, `image_name`, `updated_at`) VALUES
(1, 3, 11, 9, 9, 'Maison à vendre', 'Lille', 'Pas d\'image', 'F1', 90, 500000, 'TesterADm', 'Maison à vendre à Lille', '0-6761d0bb8286a220525162.jpg', '2024-12-17 19:27:55'),
(2, 2, 6, 6, 4, 'Appartement à vendre', 'Lyon Gare', 'NA', 'F1', 44, 452000, 'Cohen	Rémy', 'fghdfhfdjf', '1-6761db0a0a820108573543.jpg', '2024-12-17 20:11:54'),
(3, 3, 13, 6, 4, 'Maison à louer', 'Lyon', 'Maison à louer à Lyon', 'F1', 800, 452, 'Denis Agathe', 'Maison à louer Lyon', '10-6761db370209e663433241.jpg', '2024-12-17 20:12:39'),
(4, 2, 13, 5, 5, 'Appartment à louer', 'Lyon Perrache', 'Appartment à louer', 'F1', 44, 452, 'Lesage	Édouard', 'Appartment à louer', 'a-6761dbca6534b367611373.jpg', '2024-12-17 20:15:06'),
(5, 2, 9, 9, 9, 'Maison à vendre', 'Lille', 'Sans Ref.', 'F1', 75, 890, 'Admin', 'Maison à vendre à Lille', '7-6761dbf6dd06f979847274.jpg', '2024-12-17 20:15:50'),
(6, 2, 14, 8, 8, 'Apprtement à louer', 'Toulouse', 'Sans ref.', 'F4', 65, 1200, 'Simon	Gilles', 'Appartement\r\n3 Chambre\r\nAu bord de la route', 'm1-6761dc179b575629020316.jpg', '2024-12-17 20:16:23'),
(7, 2, 15, 8, 8, 'Maison à vendre', 'Toulouse', 'Toulouse', 'F1', 120, 400000, 'Toulouse', 'Maison à vendre à Toulouse', '0-6761dd5565dda923465105.jpg', '2024-12-17 20:21:41'),
(8, 4, 15, 8, 7, 'Appartement à vendre', 'Toulouse', 'na', 'F4', 87, 300000, 'Simon	Gilles', 'Toulouse', '1-6761dd65cb610957632875.jpg', '2024-12-17 20:21:57'),
(9, 4, 1, 7, 7, 'Appartement à vendre', 'Nice', 'na', 'F4', 90, 300000, 'TesterAD', 'Appart à vendre à Nice', 'a2-6761dd9dd532c400163656.jpg', '2024-12-17 20:22:53'),
(10, 4, 1, 1, 1, 'Appartement à vendre', 'Argentreuil', 'Argentreuil', 'F1', 80, 15000, 'TesterAD', 'Appart à vendre à Argentreuil', 'a2-6761ddad2f70c192712414.jpg', '2024-12-17 20:23:09'),
(11, 3, 2, 1, 2, 'Maison à louer', 'Montreuil', 'Maison à louer à Montreuil', 'F1', 80, 1200, 'Maison à louer à Montreuil', 'Maison à louer  Montreuil', '3-6761ddbe557e7913873238.jpg', '2024-12-17 20:23:26'),
(12, 2, 2, 2, 2, 'Appartment à louer', 'Chartres', 'Appartment à louer / Chartres', 'F1', 75, 450, 'Appartment à louer Chartres', 'Appartment à louer Chartres', 'a-6761dde18d64d319865801.jpg', '2024-12-17 20:24:01'),
(13, 2, 2, 7, 7, 'Appartment à louer', 'Nice', 'na', 'F1', 75, 450, 'Charpentier	Grégoire', 'Appartment à louer Nice', '5-6761de03aadcb988004455.jpg', '2024-12-17 20:24:35'),
(14, 2, 2, 2, 2, 'Appartment à louer', 'Villejuif', 'Appartment à louer / Villejuif', 'F1', 75, 450, 'Appartment à louer Villejuif', 'Appartment à louer Villejuif', '5-6761de205578e338090862.jpg', '2024-12-17 20:25:04'),
(15, 2, 2, 2, 2, 'Appartment à louer', 'Place d\'Italie', 'Appartment à louer / Place d\'Italie', 'F1', 75, 450, 'Appartment à louer Place d\'Italie', 'Appartment à louer Place d\'Italie', 'a-6761de3bae0c8436734624.jpg', '2024-12-17 20:25:31'),
(16, 1, 2, 7, 7, 'Maison à louer', 'Nice', 'Maison à louer à Villejuif', 'F4', 80, 1500, 'Charpentier	Grégoire', 'Maison à vendre  Nice', '6-6761dc8c69932843165321.jpg', '2024-12-17 20:18:20'),
(17, 1, 2, 2, 3, 'Maison à louer', 'ORly sud', 'Maison à louer à ORly sud', 'F1', 121, 452000, 'Maison à vendre à ORly sud', 'Maison à vendre ORly sud', '13-6761dcacc90be822320204.jpg', '2024-12-17 20:18:52'),
(18, 6, 1, 1, 2, 'Terrain à vendre', 'Villejuif', 'Pas d\'image', 'F1', 1111, 300000, 'TesterADm', 'Terrain à vendre à ORly sud', 'a-6761de5ab4ff5187396572.jpg', '2024-12-17 20:26:02'),
(19, 5, 1, 1, 1, 'Terrain à louer', 'Accueil', 'Pas d\'image', 'F1', 1111, 800000, 'TesterADm', 'Terrain à louerà Accueil', '3-6761de6f70edf143343974.jpg', '2024-12-17 20:26:23'),
(20, 5, 1, 5, 5, 'Terrain à louer', 'Lyon Perrache', 'Pas d\'image', 'F1', 1000, 1000000, 'TesterADm', 'Terrain à louer à Lyon Perrache', '3-6761de879d3a4646385404.jpg', '2024-12-17 20:26:47'),
(21, 4, 1, 3, 3, 'Appartement à vendre', 'Paris Defence', 'na', 'F4', 75, 444440, 'Charpentier	Grégoire', 'Paris Defence', '1-6761dea715449327283345.jpg', '2024-12-17 20:27:19'),
(22, 1, 1, 4, 6, 'Maison à louer', 'Melun', 'na', 'F3', 60, 11222, '4444', 'Maison à louer Melun', '1-6761dccf2434d078156666.jpg', '2024-12-17 20:19:27'),
(23, 3, 1, 4, 6, 'Maison à vendre', 'Sault', 'na', 'F4', 44, 44444, '4444', 'cwcxwcc', '4-6761dec6dce9b384168858.jpg', '2024-12-17 20:27:50'),
(24, 1, 3, 1, 2, 'Maison à louer', 'Paris', 'na', 'F4', 75, 11222, '4444', 'sgfsg', '12-6761dd0e58186529498877.jpg', '2024-12-17 20:20:30'),
(25, 2, 2, 1, 1, 'Apprtement à louer', 'Paris', 'na', 'F2', 44, 44444, '4444', 'Apprtement à louer', '4-6761dee2a1e08681276608.jpg', '2024-12-17 20:28:18'),
(26, 2, 2, 1, 1, 'Apprtement à louer', 'Paris', 'na', 'F3', 89, 11222, '4444', 'Apprtement à louer Paris', '0-6761defac4905758757068.jpg', '2024-12-17 20:28:42'),
(27, 2, 12, 9, 9, 'Appartement à louer', 'Lille', 'vbnvbvn', 'F1', 4444, 11222, '4444', 'Appartement à louer / Lielle', '3-6761dd812eba9653345812.jpg', '2024-12-17 20:22:25'),
(28, 1, 4, 7, 7, 'Maison a louer', 'Nice', 'Sans ref', 'F1', 54, 11111, 'Bonneau	Gilbert', 'gdgdsh', 'b-6761dd23b72ad061751046.jpg', '2024-12-17 20:20:51'),
(29, 1, 14, 8, 8, 'Maison à louer', 'Toulouse', 'na', 'F1', 80, 11222, 'Auger	Lucas', 'sss', '6-6761dcfa7f48a784846639.jpg', '2024-12-17 20:20:10'),
(30, 1, 8, 8, 8, 'Maison à louer', 'Toulouse', 'na', 'F1', 105, 11222, 'Denis	Agathe', 'Maison à louer', '5-6761dce6a3a33849696780.jpg', '2024-12-17 20:19:50');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`, `description`) VALUES
(1, 'location-Maison', 'location-Maison'),
(2, 'location-Appart', 'location-Appart.'),
(3, 'Vente-Maison', 'Vente-Maison'),
(4, 'Vente-Appart.', 'Vente-Appartement'),
(5, 'Location-Terrain', 'Location-Terrain'),
(6, 'Vente-Terrain', 'Vente-Terrain');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_clt`
--

DROP TABLE IF EXISTS `categorie_clt`;
CREATE TABLE IF NOT EXISTS `categorie_clt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employe_id` int DEFAULT NULL,
  `agence_id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` datetime NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_clt_id` int DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_C74404551B65292` (`employe_id`),
  KEY `IDX_C7440455D725330D` (`agence_id`),
  KEY `IDX_C7440455981BC7CB` (`categorie_clt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `employe_id`, `agence_id`, `nom`, `prenom`, `adresse`, `type`, `date_naissance`, `email`, `categorie_clt_id`, `image_name`, `updated_at`) VALUES
(1, 1, 1, 'Blanc	', 'Thibault', 'Paris', 'Proprio', '2024-12-01 06:30:00', 'bthibt@gmail.com', NULL, NULL, NULL),
(2, 3, 2, 'gip-com', 'admin', '3 rue François Girardon, Résidence de L’Yvette', 'Locataire', '2024-12-01 06:39:00', 'admin@gip-com.com', NULL, NULL, NULL),
(3, 2, 3, 'Petitjean', 'Arthur', 'PAris', 'Proprietaire', '2024-12-01 06:30:00', 'petitjean@gmail.com', NULL, NULL, NULL),
(4, 3, 4, 'Courtois	', 'François', 'Paris', 'Proprio', '2024-12-01 06:30:00', 'bthibt@gmail.com', NULL, NULL, NULL),
(5, 3, 4, 'Delahaye	', 'Aurélie', 'Paris', 'Proprio', '2024-12-01 06:30:00', 'bthibt@gmail.com', NULL, NULL, NULL),
(6, 4, 6, 'Seguin	', 'Gérard', 'Lyon', 'Proprio', '2024-12-01 06:30:00', 'seguin@gmail.com', NULL, NULL, NULL),
(7, 7, 7, 'Caron', 'Agathe', 'Nice', 'Proprio', '2024-12-01 06:30:00', 'caron@gmail.com', NULL, NULL, NULL),
(8, 8, 8, 'Delmas	', 'Gérard', 'Toulouse', 'Proprio', '2024-12-01 06:30:00', 'runet@gmail.com', NULL, NULL, NULL),
(9, 9, 1, 'Garnier	', 'Andrée', 'Paris', 'Proprio', '2024-12-01 06:30:00', 'runet@gmail.com', NULL, NULL, NULL),
(10, 9, 9, 'Renaud	', 'Gérard', 'Paris', 'Proprio', '2024-12-01 06:30:00', 'enaud@gmail.com', NULL, NULL, NULL),
(11, 9, 1, 'Garnier	', 'Andrée', 'Lille', 'Proprio', '2024-12-01 06:30:00', 'garnier@gmail.com', NULL, NULL, NULL),
(12, 9, 1, 'Marin	', 'Franck', 'Lille', 'Proprio', '2024-12-01 06:30:00', 'Marin@gmail.com', NULL, NULL, NULL),
(13, 4, 6, 'Benoit	', 'Paul', 'Lyon', 'Proprio', '2024-12-01 06:30:00', 'paub@gmail.com', NULL, NULL, NULL),
(14, 8, 8, 'Peltier	', 'Roland', 'Toulouse', 'Proprio', '2024-12-01 06:30:00', 'roland@gmail.com', NULL, NULL, NULL),
(15, 8, 8, 'Michel	', 'Robert', 'Toulouse', 'Proprio', '2024-12-01 06:30:00', 'rbert@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

DROP TABLE IF EXISTS `directeur`;
CREATE TABLE IF NOT EXISTS `directeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenus` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`id`, `nom`, `prenom`, `revenus`) VALUES
(1, 'Direction-Fr-Paris', 'Direction', 10000),
(2, 'Direction-Fr-Toulouse', 'Direction', 11111111),
(3, 'Direction-Fr-Lyon', 'Direction', 4545454),
(4, 'Direction-Fr-Lille', 'Director', 1111111),
(5, 'Direction-Fr-Nice', 'Direction', 13211321);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agence_id` int DEFAULT NULL,
  `directeur_id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_F804D3B9D725330D` (`agence_id`),
  KEY `IDX_F804D3B9E82E7EE8` (`directeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `agence_id`, `directeur_id`, `nom`, `prenom`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Claire', 'Bertin', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(2, 2, 1, 'Tim', 'Alios', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(3, 3, 1, 'Alior', 'trust', '2024-10-10 11:59:00', '2024-11-06 11:59:00'),
(4, 6, 3, 'Employee', 'Employee', '2024-11-15 12:09:00', '2024-12-02 12:09:00'),
(5, 5, 3, 'Marone', 'Sylvie', '2024-10-08 12:12:00', '2024-12-02 12:12:00'),
(6, 4, 1, 'Laine', 'Hugues', '2024-10-10 11:59:00', '2024-11-06 11:59:00'),
(7, 7, 5, 'Guibert	', 'Thomas', '2024-10-10 11:59:00', '2024-11-06 11:59:00'),
(8, 8, 2, 'Lemoine	', 'Josette', '2024-10-10 11:59:00', '2024-11-06 11:59:00'),
(9, 9, 4, 'Brunel	', 'Tristan', '2024-10-10 11:59:00', '2024-11-06 11:59:00');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `siege`
--

DROP TABLE IF EXISTS `siege`;
CREATE TABLE IF NOT EXISTS `siege` (
  `id` int NOT NULL AUTO_INCREMENT,
  `directeur_id` int DEFAULT NULL,
  `capital` double NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6706B4F7E82E7EE8` (`directeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `siege`
--

INSERT INTO `siege` (`id`, `directeur_id`, `capital`, `nom`, `adresse`) VALUES
(1, 1, 11221211, 'Siege-Fr-Paris', 'Paris'),
(3, 2, 1122121, 'Siege-FR-Toulouse', 'Toulouse'),
(4, 3, 121211, 'Siege-Fr-Lyon', 'Lyon'),
(9, 4, 212121, 'Siege-Fr-Lille', 'Lille'),
(10, 5, 12121, 'Siege-FR-Nice', 'Nice');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenoms`, `adresse`, `email`, `login`, `password`, `phone`, `age`) VALUES
(3, 'Leblanc', 'Emmanuel', '922, rue Pauline Peltier', 'fLeRoux@orange.fr', 'Innonquiapossimusaperiam.', 'Accusamusmollitianatuseosverodolorequisuscipitcum.', 316931195, 29),
(4, 'Courtois', 'François', '51, rue de Girard', 'Madeleine.Menard@gmail.com', 'Commodilaborequisedeadeseruntcumquedolores.', 'Autessesunteiusautaut.', 708530497, 19),
(5, 'Cohen', 'Rémy', '748, chemin de Lesage', 'Charlotte92@wanadoo.fr', 'Nameligendiofficiaporro.', 'Autemutdictaeaquevoluptascorrupti.', 1772778775, 59),
(6, 'Guichard', 'Céline', '18, chemin Gilbert', 'cDelannoy@Barbe.fr', 'Auteminrepellendusquosquoadipisciet.', 'Omnisrerumnihilinventoreautducimus.', 1170550650, 58),
(7, 'Delahaye', 'Aurélie', 'chemin Corinne Cohen', 'Lemaitre.Joseph@DosSantos.fr', 'Omnisaliquamdolorumdelectusnobis.', 'Repudiandaequosmollitiaeummollitiaillumperspiciatisofficia.', 1322469481, 100),
(8, 'Denis', 'Agathe', '64, place Michelle Chartier', 'Elodie.Blanchet@laposte.net', 'Sintessedoloremiddolorematquaeratdeserunt.', 'Mollitiaullameligendiesseofficiarepellat.', 889294610, 81),
(9, 'Brunel', 'Tristan', '37, place Diaz', 'zNeveu@Faivre.org', 'Molestiaeerroritaquedelenitietlaboriosam.', 'Sitmagnietassumendavoluptatemetsimiliquemagnam.', 285159338, 32),
(10, 'Caron', 'Agathe', '95, impasse de Le Goff', 'Alexandrie37@free.fr', 'Sedautemquodquiaexercitationemquisquampossimusculpaautem.', 'Minimalaboriosamquassimiliqueexercitationemetex.', 766613259, 12),
(11, 'Garcia', 'Marc', '4, chemin de Guilbert', 'Matthieu.Dijoux@Rousset.com', 'Oditvoluptastemporibusinventoreestexitaqueeum.', 'Rerumuterrorofficiamaximesedvitae.', 869187193, 52),
(12, 'Dos Santos', 'Audrey', 'avenue Richard', 'lReynaud@voila.fr', 'Nonevenietincidunttemporetotamdignissimos.', 'Quisdelenitiomnissaepequodmolestiaeat.', 220858841, 78),
(13, 'Brunet', 'Théodore', '89, boulevard Adrien Mahe', 'bPerret@sfr.fr', 'Quisquamdoloremquealiasullamnihil.', 'Velitutlaudantiumabsimiliqueconsecteturexcepturi.', 1235931094, 85),
(14, 'Allain', 'David', '77, chemin de Herve', 'qBodin@Camus.com', 'Exomnissaeperepudiandaequia.', 'Rerumvoluptassuntisteconsectetursitminusnamqui.', 934270155, 50),
(15, 'Lesage', 'Édouard', '64, impasse Juliette Lacroix', 'nLefebvre@Brunel.fr', 'Enimuteaqueiustonisierrorut.', 'Atqueaccusantiumbeataeducimusimpeditestcupiditateetquasi.', 1103019593, 66),
(16, 'Garnier', 'Andrée', '455, place Thibault', 'Remy23@wanadoo.fr', 'Modidoloresbeataeiureinventoredictaeumquos.', 'Delenitiinventorenullarerumvoluptas.', 336831867, 17),
(17, 'Lopez', 'Lucas', '24, rue Nathalie Rousseau', 'Denis.Ines@Collin.com', 'Nonautquosenimnatusautautnihiliure.', 'Saepereprehenderitteneturquibusdametcorruptirecusandaeomnis.', 441057136, 80),
(18, 'Robin', 'David', '794, rue Michel', 'hLeclerc@Lagarde.org', 'Perspiciatisanemodoloriusto.', 'Saepesolutaquinumquamperferendis.', 1100955200, 45),
(19, 'Gilbert', 'Augustin', '77, place Lefevre', 'Bernard54@tiscali.fr', 'Maioresfugiatsuntinillumvero.', 'Eosvelmagnidoloremenim.', 852647927, 51),
(20, 'Labbe', 'Françoise', '9, rue Grondin', 'Nicolas.Berthelot@Maillard.com', 'Quibusdamfacilisquaeratenimnostrumetenimautemtempore.', 'Reprehenderiteatenetursaepedelectusid.', 1375119796, 29),
(21, 'Renaud', 'Gérard', '8, impasse Denise Lebon', 'Elise62@Lefebvre.fr', 'Quasinisiametatutitaqueautemenim.', 'Solutaperferendisutquisquam.', 1070530029, 47),
(22, 'Andre', 'Christophe', '740, chemin de Dumont', 'Rene86@club-internet.fr', 'Solutaiddoloreevenietomnisfugiat.', 'Voluptasdelenitisuscipitvoluptatemomnis.', 1367196000, 36),
(23, 'Auger', 'Lucas', '28, impasse de Valette', 'pJoly@tiscali.fr', 'Autemprovidentautipsaculpadignissimosrerum.', 'Voluptateoccaecatiatofficiaomnis.', 2086511925, 60),
(24, 'Leduc', 'Denise', '2, chemin Langlois', 'Richard.Meyer@Dubois.com', 'Autaliquidadipiscidignissimosfacilisvitae.', 'Beataeiureoptiosedquasiliberoquiaconsequatur.', 1495011053, 46),
(25, 'Charpentier', 'Grégoire', '820, avenue Lacombe', 'Garcia.Anastasie@Lacombe.com', 'Quiquocorporisquasisitquiaut.', 'Ineaqueblanditiisodioculpanumquamprovident.', 208015188, 40),
(26, 'Simon', 'Gilles', 'chemin Bouchet', 'Astrid.Pons@Adam.net', 'Nostrumrepellendusestpraesentiumenimipsadolorem.', 'Corporissimiliquedoloremofficiisvoluptatumetaut.', 770406512, 41),
(27, 'Bonneau', 'Gilbert', '50, place Geneviève Francois', 'Pichon.Antoinette@wanadoo.fr', 'Voluptasestpossimusquidemnumquametsitoccaecatitempore.', 'Estminuserrorhicevenietestliberoeius.', 1758868065, 81),
(28, 'Allain', 'Élise', 'chemin Fernandez', 'nClement@Roche.com', 'Impeditvoluptatesomnisnecessitatibus.', 'Deseruntveniamutinventorequiquiscupiditate.', 180062599, 55),
(29, 'Noel', 'Joseph', '50, rue Leblanc', 'Adrien36@sfr.fr', 'Modicumrerumnequequiaid.', 'Atquefacereporrolaborereiciendisnonblanditiisnumquam.', 2013655251, 46),
(30, 'Camus', 'Édith', '69, place Jacques', 'Michelle.Brun@Bonnet.net', 'Etminimasitsimiliquequianulla.', 'Similiquevoluptatesomniseumipsanecessitatibusautexcepturi.', 1082372500, 70),
(31, 'Pruvost', 'Thibault', '90, impasse Benard', 'Noemi.Guilbert@Faure.com', 'Afugitdolorumveniamassumendaquosasperiores.', 'Solutafaceremolestiaevoluptatibusmollitia.', 1067114077, 51),
(32, 'Chauvet', 'Gilbert', 'rue Benoit', 'Ines39@Ferrand.fr', 'Quisquamperferendiseaautetmaximequiaccusantiumsit.', 'Liberoatquisexercitationemidillumetquaerat.', 431788103, 31),
(33, 'Gautier', 'Monique', '704, rue de Guillet', 'qBarre@noos.fr', 'Maximequisquamquosveltemporeperspiciatis.', 'Animiteneturperspiciatisevenietutmolestiasomnis.', 1885941177, 29),
(34, 'Gallet', 'Susanne', 'impasse Fouquet', 'Adrien.Bailly@Dumont.org', 'Distinctiononcumquevoluptasidvitaenonconsequatur.', 'Eiusvelquiipsa.', 489324509, 42),
(35, 'Bertrand', 'Julien', '90, rue Arthur Gosselin', 'gAllard@sfr.fr', 'Quiaillumquaequamitaqueaut.', 'Adquiaquodetdoloressimilique.', 445345878, 79),
(36, 'Rodriguez', 'Théodore', '73, boulevard Launay', 'Michelle77@tele2.fr', 'Rerumestinciduntdoloresreprehenderit.', 'Sitsapienteillumoptioeumillumvoluptatem.', 1351358909, 79),
(37, 'Leclercq', 'Luce', '458, chemin Petitjean', 'Christiane.Moulin@Gros.com', 'Sapienteillumautfugiatofficiisassumenda.', 'Laboreautpraesentiumisteetquiadoloremque.', 3634767, 17),
(38, 'Pages', 'Joséphine', '56, rue de Guillaume', 'rFrancois@free.fr', 'Officiaeiusnemovoluptatemquas.', 'Involuptaseumdoloremperferendisetdebitis.', 1049885711, 38),
(39, 'Loiseau', 'Stéphanie', '51, place Marty', 'Emilie.Leclerc@yahoo.fr', 'Ettotamautemharumculpadoloraliquamea.', 'Eumetoccaecativelperferendis.', 1132841456, 57),
(40, 'Peltier', 'Roland', '46, rue Laurent Leclercq', 'Victoire.Andre@Gilles.net', 'Etutvoluptatumconsequatur.', 'Enimametvoluptaseiusquibusdamcupiditatecupiditate.', 1202550407, 87),
(41, 'Delmas', 'Gérard', 'rue de Barbier', 'Guerin.Timothee@Vallet.org', 'Adconsequaturnihilaliquameiuslaudantiumetadipisci.', 'Utnequeautemoccaecaticum.', 1354622838, 51),
(42, 'Michel', 'Robert', '31, rue Océane Guillet', 'Gallet.Virginie@Barbier.fr', 'Quosuntexblanditiis.', 'Dignissimospariaturinnullaaperiammaiores.', 417710579, 61),
(43, 'Joseph', 'Éric', 'place Susanne Leger', 'eGeorges@noos.fr', 'Laborequiautemreiciendisquisquamnullaesse.', 'Aspernaturdelectusinvoluptasetenimperferendiset.', 1756676885, 51),
(44, 'Briand', 'Margot', '41, boulevard Gillet', 'fGeorges@Seguin.com', 'Laboriosamnamnostrumatque.', 'Consequaturliberoaperiamcorruptiimpeditrerum.', 562847607, 24),
(45, 'Roy', 'Maurice', 'impasse de Martin', 'Antoine.Louise@club-internet.fr', 'Enimminimaaliquamquiveritatisrerumeum.', 'Corporisautatrepellendusillum.', 533768756, 73),
(46, 'Vallee', 'Benjamin', '16, impasse de Millet', 'Celine.Benard@Bonnet.fr', 'Doloresreprehenderitassumendadeseruntdoloremquerepellat.', 'Sedoccaecatiquasinventoreisteconsequaturenimfugadolores.', 2045527462, 59),
(47, 'Robert', 'Claire', '29, place de Hardy', 'iHamon@laposte.net', 'Nobissedmagninesciuntmagnam.', 'Maximeoccaecatialiquidiuremaiorescorruptiillofacilis.', 206533249, 94),
(48, 'Guibert', 'Thomas', '64, impasse Émile Fernandez', 'nChauvet@laposte.net', 'Consequaturassumendaperspiciatisdoloremseddolores.', 'Suntofficiaetvelsunt.', 295225871, 24),
(49, 'Weber', 'Aurore', '323, rue Patrick Ramos', 'Jacques00@voila.fr', 'Atnulladoloribusdeserunt.', 'Sintrepellatatullamestliberoeased.', 1364118434, 78),
(50, 'Rossi', 'Lucie', '75, avenue Frédérique Francois', 'Astrid79@Menard.fr', 'Omnisalaboriosamvelitsapiente.', 'Laboreutsolutaexsimiliqueatqueetdolor.', 1902774648, 87),
(51, 'Seguin', 'Gérard', '80, place Jérôme Dubois', 'zMace@ifrance.com', 'Etharumquidemofficiisteneturlaudantiummolestiasatque.', 'Sedautconsequaturdeseruntquiamolestiaeaut.', 2114393165, 37),
(52, 'Coulon', 'Margaux', '419, rue Costa', 'Merle.Colette@Fabre.com', 'Quosillosintquasiquia.', 'Laboreaccusamuseligendivoluptasculpa.', 1534257973, 45),
(53, 'Laine', 'Hugues', '24, place de Maury', 'fAubry@hotmail.fr', 'Adipisciconsequatursinteoslaborumrecusandaeab.', 'Aliasquisestquiseaculpaducimussolutaquos.', 52515077, 31),
(54, 'Lefort', 'Eugène', '38, avenue David', 'DaSilva.Josette@laposte.net', 'Dolorequamquiadolorsuscipitrem.', 'Estdebitiscommodiipsamquiaautem.', 2009167864, 53),
(55, 'Maurice', 'Robert', '455, rue Allard', 'Luc.DeOliveira@noos.fr', 'Veroearumfugiatpraesentiumnatusquamet.', 'Quiquouttotamquiaquibusdama.', 1487009253, 56),
(56, 'Rousseau', 'Henri', 'chemin de Bonnet', 'oReynaud@dbmail.com', 'Idculpaestilloquosperferendisblanditiisest.', 'Estsequiestculpasaepequasi.', 414175480, 84),
(57, 'Legendre', 'Thierry', '13, impasse Auger', 'Manon91@hotmail.fr', 'Omnisautemveritatisautdoloribusautem.', 'Vitaedistinctiodoloremdelenitieligendiquiprovidentnulla.', 374783264, 100),
(58, 'Raynaud', 'Laetitia', '5, rue Fischer', 'Claire97@Fischer.net', 'Reiciendisremevenietitaqueid.', 'Commodienimacorruptirerumiustoenimautem.', 1680508772, 32),
(59, 'Pinto', 'Marcel', '96, place de Dumas', 'Alexandrie68@free.fr', 'Voluptatemexpeditaculpapraesentiumeumveniamexercitationem.', 'Oditexpeditaseddolordolorem.', 584126618, 34),
(60, 'Bernard', 'Sébastien', '76, rue Lesage', 'Stephanie.Didier@voila.fr', 'Repudiandaeconsequunturinciduntexpeditaporroinlaboriosamconsequatur.', 'Quorepellenduserrorremautemmolestiasculpadebitis.', 661420190, 63),
(61, 'Lecomte', 'Théophile', '510, rue Simon', 'Ollivier.Louise@gmail.com', 'Molestiaeadipiscisintquiaetevenietquia.', 'Magnamnatusdictaexdelectus.', 1088519653, 55),
(62, 'Alexandre', 'Aurélie', '42, place de Pineau', 'bImbert@club-internet.fr', 'Odioistedoloremdoloremaliquidisteharumculpa.', 'Voluptaspariatureaqueducimustemporaatquas.', 1932227814, 79),
(63, 'Rocher', 'Édouard', '56, avenue Lucy Le Gall', 'lFontaine@Berthelot.com', 'Doloribusetoccaecatiquodeaquenemoofficiis.', 'Estvoluptatemetenimsedauttempore.', 1800910132, 11),
(64, 'Carpentier', 'Gabriel', '773, avenue de Roux', 'Sylvie16@Becker.net', 'Eiusutadipisciametpraesentiummolestiaesintrerum.', 'Doloremrerumpraesentiumipsam.', 148750480, 41),
(65, 'Lelievre', 'Suzanne', '665, impasse Augustin Guilbert', 'Thierry26@tiscali.fr', 'Accusamusaccusamusrepellatmodivoluptate.', 'Sitnihilveroistenamcommodiestdoloribus.', 1440814071, 97),
(66, 'Leroux', 'Rémy', '25, avenue Claire Peltier', 'Navarro.Brigitte@Simon.org', 'Nostrumeaquenemoetet.', 'Modiipsumperspiciatisest.', 2078025496, 87),
(67, 'Dos Santos', 'Rémy', '81, rue Maryse Vincent', 'Guillou.Vincent@voila.fr', 'Suntpariaturdelenitivelaut.', 'Inutinaut.', 765524277, 92),
(68, 'Lenoir', 'Alexandre', '7, rue Antoine Julien', 'Adele74@club-internet.fr', 'Harumaliquamaccusamusquisintatqueut.', 'Eosetnemoreiciendisperspiciatisetvelaut.', 289967059, 23),
(69, 'Lambert', 'Antoinette', '8, chemin de Martins', 'Jean.Cousin@hotmail.fr', 'Doloreosreprehenderiteosinsedquo.', 'Eumrecusandaealiasfugitporroquia.', 1827001175, 39),
(70, 'Adam', 'Isaac', '31, rue Gautier', 'Luce84@tele2.fr', 'Etoccaecatiquiaimpeditaut.', 'Suscipiterrorplaceatfugiateius.', 1999736015, 20),
(71, 'Alexandre', 'Arthur', '12, avenue Charlotte Clement', 'kLaunay@club-internet.fr', 'Dictadoloresoccaecatiab.', 'Quibusdamquibusdamutratione.', 318436323, 69),
(72, 'Thibault', 'Margaux', 'rue Alexandria Carlier', 'Barthelemy.Gilles@Imbert.fr', 'Sintmagnamautmagnamatque.', 'Rerummodiutminimamaxime.', 679349049, 97),
(73, 'Devaux', 'Théophile', '33, boulevard Clémence Salmon', 'qFleury@Adam.org', 'Blanditiisutestcumea.', 'Voluptatemipsatemporibussitmolestiaecorruptiplaceat.', 514949166, 71),
(74, 'Pichon', 'Martine', '28, rue Luce Guichard', 'Schneider.Margaux@Lebon.fr', 'Quipraesentiumaperiamdelenitipraesentiumdoloredoloresillum.', 'Faceresedexpeditaeosdelectusaut.', 1772598, 33),
(75, 'Seguin', 'Anne', '742, boulevard Claude Legros', 'Alexandre.Rolland@tele2.fr', 'Necessitatibusvoluptatemnisivoluptatestemporedelenitirerumofficia.', 'Fugitomnisquosediurealiquamet.', 2023732820, 70),
(76, 'Regnier', 'Sabine', 'boulevard Masse', 'cMarques@orange.fr', 'Quasdoloretsed.', 'Nonmolestiasauteaquenonducimusofficiadictaconsequatur.', 493701504, 24),
(77, 'Guillon', 'Matthieu', '2, impasse David Leroy', 'LeRoux.Christophe@voila.fr', 'Debitisnonmolestiastemporibus.', 'Omnisoditetmodimolestiae.', 1935017879, 23),
(78, 'Delahaye', 'Adélaïde', '463, impasse Gonzalez', 'Benjamin.Lacombe@Moulin.fr', 'Distinctioutrepellatquiaspernaturetvoluptasfuga.', 'Aspernaturvoluptatemcorporisetutquiaharum.', 1533152141, 46),
(79, 'Duval', 'Édith', '9, boulevard Boulanger', 'sMahe@Lacombe.fr', 'Eiusfugiatetet.', 'Autsitaspernaturet.', 359869212, 23),
(80, 'Dumas', 'Jacques', '384, avenue Célina Lopes', 'pPrevost@Berger.fr', 'Etetquidemquieiusodio.', 'Evenietvoluptatemeligendiconsequaturcommodiautetlibero.', 355376162, 70),
(81, 'Nguyen', 'Maggie', '80, rue de Gilles', 'Camille15@dbmail.com', 'Facilisnostrumrepudiandaeutmaximeomnis.', 'Etearumullamutdolor.', 1370319380, 56),
(82, 'Dupuis', 'Margot', '4, place de Loiseau', 'cCoste@ifrance.com', 'Autofficianequesintcumcupiditateeligendiquod.', 'Nihilculpaducimusofficiaatquoetsunt.', 742452052, 96),
(83, 'Lefevre', 'Denis', '2, rue Sanchez', 'Delahaye.Christelle@Carlier.com', 'Quisquambeataefugitenimnisicorruptieadolore.', 'Facerelaborerationeenimsuscipit.', 58047454, 34),
(84, 'Foucher', 'Gilles', '83, place de Bouvet', 'Ollivier.Eric@Barre.net', 'Oditevenietaccusantiumreiciendismolestiasenim.', 'Etminimainciduntrerumnumquam.', 990146106, 92),
(85, 'Boulanger', 'Céline', '554, boulevard Legros', 'Navarro.Alexandre@live.com', 'Delenitiautemveritatisitaquebeatae.', 'Porronesciuntmollitianatus.', 614129513, 49),
(86, 'Martin', 'Christophe', 'impasse Charlotte Valentin', 'iLegros@noos.fr', 'Etcorruptiullamdoloremquodquibusdamaut.', 'Fugitfacilisveritatiseumnamomnisfuga.', 1973035033, 35),
(87, 'Guyot', 'Jean', '974, place Allard', 'Claudine.Teixeira@noos.fr', 'Atqueenimeumconsequunturessemaiorespossimusillum.', 'Voluptaseaquesitabveritatisutautem.', 1957673385, 23),
(88, 'Millet', 'Capucine', '69, rue Vincent Hardy', 'Margot39@Roche.fr', 'Temporedoloreetquovelveroprovidentullam.', 'Cumquerepellendusvelutcumquearchitecto.', 1076856901, 70),
(89, 'Herve', 'Diane', '65, rue de Lacroix', 'sFernandes@bouygtel.fr', 'Teneturutmolestiasquibusdamquidem.', 'Sapientesequiliberoquiautemquia.', 1246146034, 15),
(90, 'Fischer', 'Louis', '9, boulevard de Leconte', 'Boutin.Eric@dbmail.com', 'Minusnonvoluptatesaipsameum.', 'Easuscipitautenimvelitaperiamdeseruntmollitia.', 1971178486, 76),
(91, 'Guillot', 'Lorraine', '4, impasse Agnès Mary', 'Gilbert.Thierry@Boucher.com', 'Nihilcorruptidictalaudantiumfacereeum.', 'Estestconsequaturremperspiciatismollitianumquam.', 805011097, 44),
(92, 'Moreno', 'Thibault', '4, rue de Marques', 'Philippine.Picard@noos.fr', 'Eligendiametestdoloribusvitaeearumdelectuscorporisquis.', 'Inciduntetipsaestatenimdelectus.', 2066328198, 75),
(93, 'Benoit', 'Paul', '4, rue Dominique Lacombe', 'aLoiseau@yahoo.fr', 'Eosnesciuntetiurecommodiveldolorum.', 'Solutasapientenullaaliquamrepellatporroipsam.', 276781273, 19),
(94, 'Lemoine', 'Josette', '47, avenue Thérèse Weber', 'Margot11@noos.fr', 'Velestexveritatisnullanamcorporiseaquenobis.', 'Omnisautrerumsuntexcepturiaut.', 952811693, 79),
(95, 'Arnaud', 'Luc', '3, place de Denis', 'mLambert@hotmail.fr', 'Pariaturmolestiasexinaperiamnemodoloribusexpedita.', 'Idquinemorepudiandaemolestiaefugiatlaboriosam.', 381787261, 92),
(96, 'Perrot', 'Gabrielle', 'impasse Meyer', 'Vasseur.Thibault@Pons.com', 'Etexcepturinesciuntenimaut.', 'Dolorumdelenitifugalaudantiumdeseruntadipisciaperiamipsa.', 186432925, 33),
(97, 'Leger', 'Danielle', '46, place de Imbert', 'Helene01@ifrance.com', 'Delenitiutbeataeexcepturiasuntsit.', 'Quiaomnisvitaebeatae.', 535512377, 84),
(98, 'Gauthier', 'Guy', '11, rue Duval', 'mMartineau@laposte.net', 'Ipsaidexmaxime.', 'Etisteinenimautmolestiae.', 855186273, 49),
(99, 'Blanc', 'Thibault', 'rue Arnaud', 'Gerard46@Meunier.net', 'Temporibusmolestiaerepellendusvelitvelitlaboreaperiamenimvoluptatem.', 'Voluptatumetinciduntdoloreminventorecumquetotameius.', 233820643, 93),
(100, 'Marin', 'Franck', '722, rue Raymond Fabre', 'rFaivre@Germain.fr', 'Porrodistinctioestsedreprehenderitetsintquasplaceat.', 'Vitaefacilisquamquastemporedeseruntullamcorporis.', 1115320156, 25),
(101, 'Guillou', 'Monique', 'impasse Boulanger', 'zBodin@ifrance.com', 'Beataecorporisvoluptatemvoluptatemmolestiae.', 'Itaquedoloremsuntquitotamvoluptatesfugaiure.', 1215976020, 27),
(102, 'Petitjean', 'Arthur', '478, place de Gomes', 'Jacqueline80@yahoo.fr', 'Occaecatietveritatisrepellatoccaecati.', 'Quasifacereeumautemvoluptas.', 1666056659, 62);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `FK_64C19AA9BF006E8B` FOREIGN KEY (`siege_id`) REFERENCES `siege` (`id`),
  ADD CONSTRAINT `FK_64C19AA9E82E7EE8` FOREIGN KEY (`directeur_id`) REFERENCES `directeur` (`id`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_23A0E661B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `FK_23A0E66BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_23A0E66D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404551B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `FK_C7440455981BC7CB` FOREIGN KEY (`categorie_clt_id`) REFERENCES `categorie_clt` (`id`),
  ADD CONSTRAINT `FK_C7440455D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_F804D3B9D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`),
  ADD CONSTRAINT `FK_F804D3B9E82E7EE8` FOREIGN KEY (`directeur_id`) REFERENCES `directeur` (`id`);

--
-- Contraintes pour la table `siege`
--
ALTER TABLE `siege`
  ADD CONSTRAINT `FK_6706B4F7E82E7EE8` FOREIGN KEY (`directeur_id`) REFERENCES `directeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
