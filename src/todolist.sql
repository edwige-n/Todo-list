-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 mai 2022 à 17:54
-- Version du serveur : 5.7.26
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribue`
--

DROP TABLE IF EXISTS `attribue`;
CREATE TABLE IF NOT EXISTS `attribue` (
  `idTaches` int(11) NOT NULL,
  `idPersonne` int(11) NOT NULL,
  KEY `idTaches` (`idTaches`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `idListe` int(11) NOT NULL AUTO_INCREMENT,
  `nomListe` varchar(50) NOT NULL,
  `DescriptionListe` varchar(200) NOT NULL,
  PRIMARY KEY (`idListe`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`idListe`, `nomListe`, `DescriptionListe`) VALUES
(1, 'Anniversaire', 'Listes des tâches à faire pour organiser un anniversaire'),
(2, 'Nouvelle liste', 'Une nouvelle liste '),
(3, 'Nouvelle liste', 'Une nouvelle liste '),
(4, 'Nouvelle liste', 'Une nouvelle liste '),
(5, 'Nouvelle liste', 'Une nouvelle liste '),
(6, 'Statistique', 'Une nouvelle liste '),
(7, 'Statistique', 'Une nouvelle liste '),
(8, 'Statistique', 'Une nouvelle liste '),
(9, 'Tickets', 'Une nouvelle liste ');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `prenomPersonne` varchar(50) NOT NULL,
  `nomPersonne` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`idPersonne`, `prenomPersonne`, `nomPersonne`, `username`, `mdp`) VALUES
(1, 'Christian', 'Eva', 'eva_cc35', '$2y$10$r3hcGhGkWluImj.qM6C8O.5/ATgfAf4KCeL9WdnjIpj0hWvPsRsgS');

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `idTaches` int(11) NOT NULL AUTO_INCREMENT,
  `nomTaches` varchar(50) NOT NULL,
  `EtatTaches` enum('Non commencée','En cours','Terminée','') NOT NULL,
  `idTypeTache` int(11) NOT NULL,
  `idListe` int(11) NOT NULL,
  PRIMARY KEY (`idTaches`),
  KEY `idListe` (`idListe`),
  KEY `idTypeTache` (`idTypeTache`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typetache`
--

DROP TABLE IF EXISTS `typetache`;
CREATE TABLE IF NOT EXISTS `typetache` (
  `idTypeTache` int(11) NOT NULL AUTO_INCREMENT,
  `nomTypeTache` varchar(20) NOT NULL,
  `idTypeTache_1` int(11) NOT NULL,
  PRIMARY KEY (`idTypeTache`),
  KEY `idTypeTache_1` (`idTypeTache_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribue`
--
ALTER TABLE `attribue`
  ADD CONSTRAINT `attribue_ibfk_1` FOREIGN KEY (`idTaches`) REFERENCES `taches` (`idTaches`),
  ADD CONSTRAINT `attribue_ibfk_2` FOREIGN KEY (`idPersonne`) REFERENCES `personnes` (`idPersonne`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`idListe`) REFERENCES `liste` (`idListe`),
  ADD CONSTRAINT `taches_ibfk_2` FOREIGN KEY (`idTypeTache`) REFERENCES `typetache` (`idTypeTache`);

--
-- Contraintes pour la table `typetache`
--
ALTER TABLE `typetache`
  ADD CONSTRAINT `typetache_ibfk_1` FOREIGN KEY (`idTypeTache_1`) REFERENCES `typetache` (`idTypeTache`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
