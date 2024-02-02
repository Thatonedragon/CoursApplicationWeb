-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 02 fév. 2024 à 22:47
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpmariadb`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` char(20) NOT NULL,
  `NOM` char(255) NOT NULL,
  `PRENOM` char(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `auth`
--

INSERT INTO `auth` (`USER_ID`, `LOGIN`, `NOM`, `PRENOM`, `PASSWORD`) VALUES
(19, 'Dylan_looij', 'DYLAN', 'Looij', '$2y$10$PzJquIMU0RssxdU49r0Om.idcjjDiL8TLWrXMo5C2mLWslv/eOyLK');

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `RESERVATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_RESERVATION` varchar(255) NOT NULL,
  `TYPE` char(1) NOT NULL,
  `JOUR_RESERVATION` date NOT NULL,
  `NB_PLACE` int(11) NOT NULL,
  `COMMENTAIRE` varchar(255) DEFAULT NULL,
  `USER_ID` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`RESERVATION_ID`),
  KEY `USER_ID_DETAIL` (`USER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`RESERVATION_ID`, `NOM_RESERVATION`, `TYPE`, `JOUR_RESERVATION`, `NB_PLACE`, `COMMENTAIRE`, `USER_ID`) VALUES
(12, 'Dylan', '0', '2024-05-10', 2, 'Bonjour', 19),
(13, 'Dylan', '0', '2024-05-10', 2, 'Bonjour', 19);

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

DROP TABLE IF EXISTS `jours`;
CREATE TABLE IF NOT EXISTS `jours` (
  `id` int(11) NOT NULL DEFAULT uuid(),
  `jour` char(8) NOT NULL,
  `capacite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`id`, `jour`, `capacite`) VALUES
(1, 'VENDREDI', 10000),
(2, 'SAMEDI', 18000),
(3, 'DIMANCHE', 25000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
