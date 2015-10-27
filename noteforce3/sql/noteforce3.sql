-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Octobre 2015 à 23:15
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `noteforce3`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE IF NOT EXISTS `ecole` (
`idEcole` int(11) NOT NULL,
  `nomEcole` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Liste des écoles';

--
-- Contenu de la table `ecole`
--

INSERT INTO `ecole` (`idEcole`, `nomEcole`) VALUES
(1, 'HIRSON'),
(2, 'PARIS');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
`idMatiere` int(11) NOT NULL,
  `nomMatiere` varchar(20) NOT NULL,
  `idPersonne` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='matières enseignées';

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`idMatiere`, `nomMatiere`, `idPersonne`) VALUES
(1, 'HTML-CSS', 1),
(2, 'PHP', 2);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`idNote` int(11) NOT NULL,
  `dteExam` date NOT NULL,
  `idEleve` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `Commentaire` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Notes des élèves pour toutes les écoles';

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`idNote`, `dteExam`, `idEleve`, `idMatiere`, `note`, `Commentaire`) VALUES
(1, '2015-10-21', 4, 1, 10, 'Bon travail'),
(2, '2015-10-21', 4, 2, 10, 'Bon travail'),
(3, '2015-10-21', 5, 1, 15, 'Très bon travail'),
(4, '2015-10-21', 5, 2, 12, 'Bon travail'),
(5, '2015-10-21', 6, 1, 8, 'Peut mieux faire'),
(6, '2015-10-21', 6, 2, 5, 'Des lacunes'),
(7, '2015-10-01', 4, 1, 11, 'Bien'),
(8, '2015-10-01', 4, 2, 9, 'Pas mal'),
(9, '2015-10-01', 5, 1, 12, 'Bon travail'),
(10, '2015-10-01', 5, 2, 14, 'Très bien'),
(11, '2015-10-01', 6, 1, 4, 'Touriste'),
(12, '2015-10-01', 6, 2, 2, 'Null');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
`idPersonne` int(11) NOT NULL,
  `nomPersonne` varchar(30) NOT NULL,
  `prenomPersonne` varchar(30) NOT NULL,
  `loginPersonne` varchar(20) NOT NULL,
  `passPersonne` varchar(42) NOT NULL,
  `typePersonne` char(1) NOT NULL,
  `idEcole` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Table des élèves et des formateurs';

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `loginPersonne`, `passPersonne`, `typePersonne`, `idEcole`) VALUES
(1, 'VUILLIOT', 'Quentin', 'QV', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'F', 1),
(2, 'TAVERNIER', 'Bruno', 'BT', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'F', 1),
(3, 'GATES', 'Bill', 'BG', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'A', 1),
(4, 'DUPOND', 'Michel', 'MD', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'E', 1),
(5, 'MARTIN', 'Paul', 'PM', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'E', 1),
(6, 'PROVISTE', 'Alain', 'AP', '*0C5A7B68E07269710DF5593098D2FEE70EACF958', 'E', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
 ADD PRIMARY KEY (`idEcole`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
 ADD PRIMARY KEY (`idMatiere`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`idNote`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
 ADD PRIMARY KEY (`idPersonne`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
MODIFY `idEcole` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
MODIFY `idPersonne` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
