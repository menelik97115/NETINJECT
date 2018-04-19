-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 12 avr. 2018 à 14:15
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `injecteur_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE `agenda` (
  `duree` int(4) NOT NULL,
  `ID` int(2) NOT NULL,
  `date_nettoyage` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `duree` int(4) NOT NULL,
  `frequence` int(4) NOT NULL,
  `periode` int(4) NOT NULL,
  `rapport_cyclique` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donne_etat`
--

CREATE TABLE `donne_etat` (
  `duree` int(4) NOT NULL,
  `numero_serie` int(2) NOT NULL,
  `ETAT` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `injecteurs`
--

CREATE TABLE `injecteurs` (
  `numero_serie` int(2) NOT NULL,
  `modele_moteur` char(32) DEFAULT NULL,
  `marque` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `date_connexion` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`duree`,`ID`),
  ADD KEY `I_FK_AGENDA_Cycle` (`duree`),
  ADD KEY `I_FK_AGENDA_Utilisateurs` (`ID`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`duree`);

--
-- Index pour la table `donne_etat`
--
ALTER TABLE `donne_etat`
  ADD PRIMARY KEY (`duree`,`numero_serie`),
  ADD KEY `I_FK_DONNE_ETAT_Cycle` (`duree`),
  ADD KEY `I_FK_DONNE_ETAT_Injecteurs` (`numero_serie`);

--
-- Index pour la table `injecteurs`
--
ALTER TABLE `injecteurs`
  ADD PRIMARY KEY (`numero_serie`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `duree` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
