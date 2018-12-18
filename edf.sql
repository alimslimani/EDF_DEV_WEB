-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 19 fév. 2018 à 11:31
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `edf`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `identifiant` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ancienReleve` int(11) NOT NULL,
  `dernierReleve` int(11) NOT NULL,
  `idcontroleur` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`identifiant`, `nom`, `prenom`, `adresse`, `codePostal`, `ville`, `ancienReleve`, `dernierReleve`, `idcontroleur`) VALUES
(1, 'De Nardi', 'Patrice', '17, rue des Archives', '69003', 'Lyon', 1024, 1867, 1),
(2, 'Flipo', 'Mathieu', '1, place Gambetta', '69001', 'Lyon', 123, 999, 1),
(3, 'Metzger', 'Corinne', '23, rue de la Roquette', '69001', 'Lyon', 145, 267, 2),
(4, 'Kurschner', 'Thomas', '3, rue Baudelaire', '69005', 'Lyon', 521, 846, 2),
(5, 'Dumay', 'Caroline', '36, avenue Marceau', '69008', 'Lyon', 0, 0, 3),
(6, 'Borrat', 'Thierry', '12, place Albert 1er', '69001', 'Lyon', 1234, 1834, 3),
(7, 'Jeanson', 'Virginie', '7 place Victor Hugo', '69002', 'Lyon', 435, 582, 4),
(8, 'Combe', 'Jean-Pierre', 'Avenue de la Trimouille', '69004', 'Lyon', 458, 1467, 4);

-- --------------------------------------------------------

--
-- Structure de la table `controleur`
--

CREATE TABLE `controleur` (
  `id` int(4) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `controleur`
--

INSERT INTO `controleur` (`id`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'Girard', 'Michel', 'mg', 'mg'),
(2, 'Garnier', 'Francois', 'fg', 'fg'),
(3, 'Alison', 'Benjamin', 'ba', 'ba'),
(4, 'Gand', 'Christophe', 'cg', 'cg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`identifiant`),
  ADD KEY `idcontroleur` (`idcontroleur`);

--
-- Index pour la table `controleur`
--
ALTER TABLE `controleur`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`idcontroleur`) REFERENCES `controleur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;