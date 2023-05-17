-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 mai 2023 à 14:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `base-de-donne`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `id_serveur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_serveur` (`id_serveur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `role` enum('client','serveur','cuisinier','gerant') NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Structure de la table `assignation_serveur`
--

DROP TABLE IF EXISTS `assignation_serveur`;
CREATE TABLE IF NOT EXISTS `assignation_serveur` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `id_serveur` int NOT NULL,
  `id_secteur` int NOT NULL,
  `hdebut` time DEFAULT NULL,
  `hfin` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

DROP TABLE IF EXISTS `serveur`;
CREATE TABLE IF NOT EXISTS `serveur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `id_personne` (`id_personne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nb_place` int NOT NULL DEFAULT '4',
  `id_secteur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_secteur` (`id_secteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
