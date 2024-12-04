-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 02 déc. 2024 à 09:41
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
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19AA9E82E7EE8` (`directeur_id`),
  KEY `IDX_64C19AA9BF006E8B` (`siege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `directeur_id`, `siege_id`, `numero_agence`, `adresse`) VALUES
(1, 3, 1, 122122121, 'Paris'),
(2, 3, 3, 121211221, 'Paris');

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
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` double NOT NULL,
  `prix` int NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66BCF5E72D` (`categorie_id`),
  KEY `IDX_23A0E6619EB6921` (`client_id`),
  KEY `IDX_23A0E66D725330D` (`agence_id`),
  KEY `IDX_23A0E661B65292` (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `client_id`, `agence_id`, `employe_id`, `titre`, `adresse`, `images`, `type`, `surface`, `prix`, `owner`, `description`) VALUES
(1, 2, 1, 1, 1, 'Maison à vendre à Villejuif', 'Villejuif', 'sfffsgs', 'f1', 1111, 0, 'fgfg', 'Maison à vendre à Villejuif'),
(2, 2, 2, 2, 1, 'Appartement à vendre / Melun', 'Melun', 'Melun', '54', 44, 452, 'fhdfgd', 'fghdfhfdjf'),
(3, 3, 2, 1, 2, 'Maison à louer à Villejuif', 'Maison à louer à Villejuif', 'Maison à louer à Villejuif', '11', 441, 452, 'Maison à vendre à Villejuif', 'Maison à vendre  Vil'),
(4, 2, 2, 2, 2, 'Appartment à louer', 'Louvres', 'Appartment à louer', '1', 44, 452, 'Appartment à louer', 'Appartment à louer'),
(5, 2, 1, 1, 1, 'Maison à vendre à Villejuif', 'Villejuif', 'sfffsgs', 'f1', 1111, 0, 'fgfg', 'Maison à vendre à Villejuif'),
(6, 2, 1, 1, 1, 'Maison à vendre à Orly', 'Orly', 'sfffsgs', 'f1', 1111, 0, 'fgfg', 'Maison à vendre à Orly');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`, `description`) VALUES
(1, 'location-Maison', 'location-Maison'),
(2, 'location-Appartement', 'location-Appartement'),
(3, 'Vente-Maison', 'Vente-Maison'),
(4, 'Vente-Appartement', 'Vente-Appartement');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employe_id` int DEFAULT NULL,
  `agence_id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C74404551B65292` (`employe_id`),
  KEY `IDX_C7440455D725330D` (`agence_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `employe_id`, `agence_id`, `nom`, `prenom`, `adresse`, `type`, `photo`, `date_naissance`, `email`) VALUES
(1, 1, 1, 'Izor', 'Izor', 'Izor', 'Locataire', 'dfsfs', '2024-12-01 06:30:00', 'ipalakot@gmail.com'),
(2, 1, 1, 'gip-com', 'admin', '3 rue François Girardon, Résidence de L’Yvette', 'Locataire', 'dfsfs', '2024-12-01 06:39:00', 'admin@gip-com.com');

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

DROP TABLE IF EXISTS `directeur`;
CREATE TABLE IF NOT EXISTS `directeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenus` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`id`, `nom`, `prenom`, `revenus`) VALUES
(1, 'Caillet', 'Anthy', 10000),
(2, 'Palakot', 'Georges', 11111111),
(3, 'Juke', 'Bell', 4545454);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agence_id` int DEFAULT NULL,
  `directeur_id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_F804D3B9D725330D` (`agence_id`),
  KEY `IDX_F804D3B9E82E7EE8` (`directeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `agence_id`, `directeur_id`, `nom`, `prenom`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Tim', 'Bertin', '2024-12-01 05:41:00', '2024-12-02 05:41:00'),
(2, 1, 1, 'Tim', 'Bertin', '2024-12-01 05:41:00', '2024-12-02 05:41:00');

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
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6706B4F7E82E7EE8` (`directeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `siege`
--

INSERT INTO `siege` (`id`, `directeur_id`, `capital`, `nom`, `adresse`) VALUES
(1, 1, 11221211, 'Agence Paris', 'Paris'),
(3, 2, 1122121, 'Toulouse Agence', 'Toulouse'),
(4, 3, 121211, 'Lyon Agence', 'Lyon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
