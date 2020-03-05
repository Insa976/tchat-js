-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 04 mars 2020 à 22:12
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `dateM` datetime NOT NULL,
  `libelleM` text NOT NULL,
  `idUsers1` int(11) DEFAULT NULL,
  `idUsers2` int(11) NOT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `Message_Users1_FK` (`idUsers1`),
  KEY `Message_Users2_FK` (`idUsers2`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `dateM`, `libelleM`, `idUsers1`, `idUsers2`) VALUES
(1, '2020-03-04 21:11:37', 'Salut !', 8, 6),
(2, '2020-03-04 21:12:20', 'Salut ! Ça va ? ', 6, 8),
(3, '2020-03-04 21:12:44', 'Ça va bien, et toi ?', 8, 6),
(4, '2020-03-04 21:13:12', 'Ça va merci ! ☺', 6, 8),
(5, '2020-03-04 21:15:28', 'Cool ! Je te laisse je vais conduire.<br />\nOn se capte après ;-) !', 8, 6),
(6, '2020-03-04 21:16:07', 'D\'accord à tout à coup !<br />\n', 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 DEFAULT 'profil-defaut.png',
  `statut` tinyint(1) NOT NULL,
  `dateInscrit` date NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `Users` (`idUsers`, `nom`, `prenom`, `dateNaissance`, `email`, `mdp`, `photo`, `statut`, `dateInscrit`) VALUES
(1, 'TITI', 'Titi', '1998-01-02', 'titi@tchat-js.fr', '5d933eef19aee7da192608de61b6c23d', 'profil-defaut.png', 0, '2020-01-25'),
(2, 'TUTU', 'Tutu', '2242-01-02', 'tutu@tchat-js.fr', 'bdb8c008fa551ba75f8481963f2201da', 'profil-defaut.png', 0, '2020-01-25'),
(4, 'TOTO', 'Toto', '0242-04-02', 'toto@tchat-js.fr', 'f71dbe52628a3f83a77ab494817525c6', 'profil-defaut.png', 0, '2020-01-26'),
(5, 'LILI', 'Lili', '0242-04-02', 'lili@tchat-js.fr', '777bbb7869ae8193249f8ff7d3e59afe', 'profil-defaut.png', 0, '2020-01-26'),
(6, 'LULU', 'Lulu', '3444-12-01', 'lulu@tchat-js.fr', '654e4dc5b90b7478671fe6448cab3f32', 'profil-defaut.png', 0, '2020-01-26'),
(8, 'INSSA', 'Moussa', '1998-01-02', 'moussainssa@outlook.fr', '639583119441bd84c373c314afd2814d', 'profil-defaut.png', 0, '2020-02-11');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Message_Users1_FK` FOREIGN KEY (`idUsers1`) REFERENCES `Users` (`idUsers`),
  ADD CONSTRAINT `Message_Users2_FK` FOREIGN KEY (`idUsers2`) REFERENCES `Users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
