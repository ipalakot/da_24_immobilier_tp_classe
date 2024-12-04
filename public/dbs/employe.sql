-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 déc. 2024 à 15:48
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `agence_id`, `directeur_id`, `nom`, `prenom`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Claire', 'Bertin', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(2, 3, 1, 'Tim', 'Alios', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(3, 4, 1, 'Alior', 'trust', '2024-10-10 11:59:00', '2024-11-06 11:59:00'),
(4, 6, 3, 'Employee', 'Employee', '2024-11-15 12:09:00', '2024-12-02 12:09:00'),
(5, 1, 1, 'Marone', 'Sylvie', '2024-10-08 12:12:00', '2024-12-02 12:12:00'),
(6, 5, 3, 'Leblanc', 'Emmanuel', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(7, 7, 5, 'Delmas', 'Gérard', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(8, 8, 2, 'Renaud 	', 'Gérard', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(9, 8, 2, 'Charpentier 	', 'Grégoire', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(10, 8, 2, 'Bonneau 	', 'Gilbert', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(11, 6, 3, 'Pruvost', 'Thibault', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(12, 5, 3, 'Camus', 'Édith', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(13, 5, 3, 'Gautier', 'Monique', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(14, 7, 5, 'Briand 	', 'Margot', '2024-12-01 05:41:00', '2024-12-02 05:41:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_F804D3B9D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`),
  ADD CONSTRAINT `FK_F804D3B9E82E7EE8` FOREIGN KEY (`directeur_id`) REFERENCES `directeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
