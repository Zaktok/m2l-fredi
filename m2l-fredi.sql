-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 mars 2018 à 10:20
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l-fredi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

DROP TABLE IF EXISTS `adherents`;
CREATE TABLE IF NOT EXISTS `adherents` (
  `num_licence` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `num_club` int(255) NOT NULL,
  PRIMARY KEY (`num_licence`),
  KEY `num_club` (`num_club`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`num_licence`, `mail`, `mdp`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `num_club`) VALUES
(1234, 'baba@baba.fr', 'azerty', 'baba', 'elbaba', 'rue baba', '09200', 'ville baba', 0);

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `num_ligue` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `num_ligue` (`num_ligue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`id`, `nom`, `num_ligue`) VALUES
(0, 'le club 0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_frais`
--

DROP TABLE IF EXISTS `ligne_frais`;
CREATE TABLE IF NOT EXISTS `ligne_frais` (
  `num_licence` int(11) NOT NULL,
  `date` date NOT NULL,
  `motif` int(11) NOT NULL,
  `trajet` varchar(255) NOT NULL,
  `km` int(11) NOT NULL,
  `cout_peage` float NOT NULL,
  `cout_repas` float NOT NULL,
  `cout_hebergement` float NOT NULL,
  `km_valide` tinyint(1) NOT NULL,
  `peage_valide` tinyint(1) NOT NULL,
  `repas_valide` tinyint(1) NOT NULL,
  `hebergement_valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`num_licence`,`date`),
  KEY `motif` (`motif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

DROP TABLE IF EXISTS `ligues`;
CREATE TABLE IF NOT EXISTS `ligues` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `sigle` varchar(255) NOT NULL,
  `president` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`id`, `nom`, `sigle`, `president`) VALUES
(0, 'uneLigue', 'ul', 'mr president');

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

DROP TABLE IF EXISTS `motifs`;
CREATE TABLE IF NOT EXISTS `motifs` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
