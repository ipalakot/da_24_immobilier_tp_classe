-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 déc. 2024 à 15:47
-- Version du serveur : 8.0.31
-- Version de PHP : 8.3.2

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
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66BCF5E72D` (`categorie_id`),
  KEY `IDX_23A0E6619EB6921` (`client_id`),
  KEY `IDX_23A0E66D725330D` (`agence_id`),
  KEY `IDX_23A0E661B65292` (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `client_id`, `agence_id`, `employe_id`, `titre`, `adresse`, `images`, `type`, `surface`, `prix`, `owner`, `description`) VALUES
(1, 3, 1, 1, 1, 'Maison en vente', 'Villejuif', 'Pas d\'image', '5', 90, 500000, 'TesterADm', 'Maison à vendre à ORly sud'),
(2, 2, 2, 2, 1, 'Appartement à vendre', 'Melun', 'Melun', '4', 44, 452000, 'TEstAdm', 'fghdfhfdjf'),
(3, 3, 2, 1, 2, 'Maison à louer', 'Villejuif', 'Maison à louer à Villejuif', '2', 800, 452, 'Maison à vendre à Villejuif', 'Maison à vendre  Vil'),
(4, 2, 2, 2, 2, 'Appartment à louer', 'Louvres', 'Appartment à louer', '1', 44, 452, 'Appartment à louer', 'Appartment à louer'),
(5, 2, 1, 1, 1, 'Maison à vendre', 'Villejuif', 'Sans Ref. ', '4', 75, 890, 'Admin', 'Maison à vendre à Villejuif'),
(6, 2, 1, 1, 1, 'Apprtement à louer', 'Orly', 'Sans ref.', '3', 65, 1200, 'Admin', 'Appartement\r\n3 Chambre\r\nAu bord de la route'),
(7, 2, 1, 8, 2, 'Maison à vendre', 'Toulouse', 'Toulouse', '5', 120, 400000, 'Toulouse', 'Maison à vendre à Toulouse'),
(8, 4, 1, 1, 1, 'Appartement à vendre', 'Massy', 'Massy', '4', 87, 300000, 'fhdfgd', 'Massy'),
(9, 4, 1, 1, 1, 'Appartement à vendre', 'Creteil', 'Creteil', '5', 90, 300000, 'TesterAD', 'Appart à vendre à Creteil'),
(10, 4, 1, 1, 1, 'Appartement à vendre', 'Argentreuil', 'Argentreuil', '4', 80, 15000, 'TesterAD', 'Appart à vendre à Argentreuil'),
(11, 3, 2, 1, 2, 'Maison à louer', 'Montreuil', 'Maison à louer à Montreuil', '4', 80, 1200, 'Maison à louer à Montreuil', 'Maison à louer  Montreuil'),
(12, 2, 2, 2, 2, 'Appartment à louer', 'Chartres', 'Appartment à louer / Chartres', '1', 75, 450, 'Appartment à louer Chartres', 'Appartment à louer Chartres'),
(13, 2, 2, 2, 2, 'Appartment à louer', 'Aulnay', 'Appartment à louer / Aulnay', '1', 75, 450, 'Appartment à louer Aulnay', 'Appartment à louer Aulnay'),
(14, 2, 2, 2, 2, 'Appartment à louer', 'Villejuif', 'Appartment à louer / Villejuif', '1', 75, 450, 'Appartment à louer Villejuif', 'Appartment à louer Villejuif'),
(15, 2, 2, 2, 2, 'Appartment à louer', 'Place d\'Italie', 'Appartment à louer / Place d\'Italie', '1', 75, 450, 'Appartment à louer Place d\'Italie', 'Appartment à louer Place d\'Italie'),
(16, 1, 2, 1, 2, 'Maison à louer', 'Villejuif', 'Maison à louer à Villejuif', '4', 80, 1500, 'Maison à vendre à Villejuif', 'Maison à vendre  Vil'),
(17, 1, 2, 1, 2, 'Maison à louer', 'ORly sud', 'Maison à louer à ORly sud', '5', 121, 452000, 'Maison à vendre à ORly sud', 'Maison à vendre ORly sud'),
(18, 6, 1, 1, 1, 'Terrain à vendre', 'Villejuif', 'Pas d\'image', 'Terrain', 1111, 300000, 'TesterADm', 'Terrain à vendre à ORly sud'),
(19, 5, 1, 7, 1, 'Terrain à Nice', 'Nice', 'Pas d\'image', 'Terrain', 1111, 800000, 'TesterADm', 'Terrain à louer Nice'),
(20, 5, 1, 5, 3, 'Terrain à louer', 'Lyon Perrache', 'Pas d\'image', '1000', 1000, 1000000, 'TesterADm', 'Terrain à louer à Lyon Perrache');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_23A0E661B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `FK_23A0E66BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_23A0E66D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
