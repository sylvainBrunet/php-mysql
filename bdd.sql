-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 14:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joueurUn` int(11) NOT NULL,
  `joueurDeux` int(11) NOT NULL,
  `scoreJoueurUn` int(11) NOT NULL,
  `scoreJoueurDeux` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `playerOne` (`joueurUn`),
  KEY `playerTwo` (`joueurDeux`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `joueurUn`, `joueurDeux`, `scoreJoueurUn`, `scoreJoueurDeux`, `winner`) VALUES
(1, 1, 2, 1, 3, 2),
(2, 1, 1, 1, 3, 1),
(3, 2, 3, 3, 1, 2),
(4, 3, 1, 0, 0, -1),
(5, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(200) NOT NULL,
  `clashRoyalTag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`id`, `pseudo`, `clashRoyalTag`) VALUES
(1, 'Maxence', '2L99PRGJ'),
(2, 'Matthieu', 'YRV99QPP'),
(3, 'Tom', '8JLRY2LP'),
(4, 'Anthony', '8C8QUOG8');

-- --------------------------------------------------------

--
-- Structure de la table `teamgames`
--

DROP TABLE IF EXISTS `teamgames`;
CREATE TABLE IF NOT EXISTS `teamgames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipeUne` int(11) NOT NULL,
  `equipeDeux` int(11) NOT NULL,
  `scoreEquipeUne` int(11) NOT NULL,
  `scoreEquipeDeux` int(11) NOT NULL,
  `teamWinner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teamOne` (`equipeUne`),
  KEY `teamTwo` (`equipeDeux`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teamgames`
--

INSERT INTO `teamgames` (`id`, `equipeUne`, `equipeDeux`, `scoreEquipeUne`, `scoreEquipeDeux`, `teamWinner`) VALUES
(2, 9, 8, 2, 0, 9),
(3, 9, 11, 2, 3, 11),
(4, 10, 13, 0, 2, 13),
(5, 16, 17, 1, 2, 17),
(6, 19, 17, 3, 0, 19),
(7, 19, 17, 3, 1, 19),
(8, 19, 17, 3, 1, 19),
(9, 19, 18, 3, 0, 19);

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(255) NOT NULL,
  `joueurUn` varchar(50) NOT NULL,
  `joueurDeux` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `playerTwo` (`joueurDeux`) USING BTREE,
  KEY `playerOne` (`joueurUn`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `teamName`, `joueurUn`, `joueurDeux`) VALUES
(19, 'les dieux', 'Maxence', 'Matthieu'),
(18, 'DZEA', 'Anthony', 'Tom'),
(17, 'les choux', 'Maxence', 'Anthony'),
(16, 'azaza', 'Matthieu', 'Anthony');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `playerOne` FOREIGN KEY (`joueurUn`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `playerTwo` FOREIGN KEY (`joueurDeux`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
