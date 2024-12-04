-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 déc. 2024 à 15:46
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
(1, 3, 1, 94, 'Villejuif'),
(2, 1, 3, 93, 'Saint-Denis'),
(3, 1, 1, 75.12, 'Paris -12'),
(4, 1, 1, 75.7, 'Paris Defence'),
(5, 3, 4, 69.1, 'Lyon Perrache'),
(6, 3, 4, 69.5, 'Lyon Gare'),
(7, 5, 10, 13.2, 'Nice'),
(8, 2, 3, 31.1, 'Toulouse'),
(9, 4, 9, 59.1, 'Lille');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `FK_64C19AA9BF006E8B` FOREIGN KEY (`siege_id`) REFERENCES `siege` (`id`),
  ADD CONSTRAINT `FK_64C19AA9E82E7EE8` FOREIGN KEY (`directeur_id`) REFERENCES `directeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
