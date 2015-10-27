-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Octobre 2015 à 14:22
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webforce3`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `Id_Eleve` int(5) unsigned NOT NULL,
  `nom_Eleve` varchar(30) NOT NULL,
  `note_Francais` decimal(10,0) NOT NULL,
  `note_Math` decimal(10,0) NOT NULL,
  `note_Info` decimal(10,0) NOT NULL,
  `idEcole` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Notes des élévés';

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`Id_Eleve`, `nom_Eleve`, `note_Francais`, `note_Math`, `note_Info`, `idEcole`) VALUES
(1, 'Antoine Sylvain', '10', '10', '10', 3),
(2, 'Arcole David', '10', '10', '10', 1),
(3, 'BESANCON Jb', '10', '10', '0', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`Id_Eleve`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `Id_Eleve` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
