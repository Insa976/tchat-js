-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 01 mars 2020 à 17:57
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `dateM`, `libelleM`, `idUsers1`, `idUsers2`) VALUES
(26, '2020-02-11 19:53:27', 'ffrfz', 8, 1),
(27, '2020-02-11 19:55:49', 'd', 8, 1),
(28, '2020-02-11 20:55:45', '(-èio', 1, 8),
(29, '2020-02-11 21:13:38', 'ghjk', 1, 6),
(30, '2020-02-14 18:04:42', 'urfh<br />\ndf', 1, 8),
(31, '2020-02-14 18:20:59', 'rger', 1, 8),
(32, '2020-02-14 18:23:15', 'mgegj', 1, 8),
(33, '2020-02-14 18:29:18', 'ffe', 1, 8),
(34, '2020-02-14 18:57:56', 'Bonsoir Titi<br />\n', 8, 1),
(35, '2020-02-14 18:58:05', 'Oui Bonsoir', 1, 8),
(36, '2020-02-14 19:11:13', 'lkneligjz', 8, 1),
(37, '2020-02-14 19:11:29', 'fgomrgçjfpef', 1, 8),
(38, '2020-02-14 20:10:02', 'Coucou Tu vas bien', 6, 1),
(39, '2020-02-14 20:10:49', 'Bra<br />\n', 6, 1),
(40, '2020-02-14 20:10:55', 'Lol', 1, 6),
(41, '2020-02-14 20:16:42', ',:l', 1, 6),
(42, '2020-02-14 20:16:48', '\\n', 1, 6),
(43, '2020-02-14 20:21:49', 'YoYo', 1, 6),
(44, '2020-02-14 20:54:10', 'grg', 6, 1),
(45, '2020-02-14 20:54:23', 'rtegr', 1, 6),
(46, '2020-03-01 10:59:23', 'mk', 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'profil-defaut.png',
  `statut` tinyint(1) NOT NULL,
  `dateInscrit` date NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `nom`, `prenom`, `dateNaissance`, `email`, `mdp`, `photo`, `statut`, `dateInscrit`) VALUES
(1, 'TITI', 'Titi-ti', '1998-01-02', 'titi@titi', '5d933eef19aee7da192608de61b6c23d', 'profil-defaut.png', 0, '2020-01-25'),
(2, 'TUTU', 'Tutu', '2242-01-02', 'tutu@tutu', '8d55cc5497f203ce9814caeeb42dbeff', 'profil-defaut.png', 0, '2020-01-25'),
(4, 'TOTO', 'Toto', '0242-04-02', 'toto@toto', '4124bc0a9335c27f086f24ba207a4912', 'profil-defaut.png', 0, '2020-01-26'),
(5, 'LILI', 'Lili', '0242-04-02', 'lili@lili', '4124bc0a9335c27f086f24ba207a4912', 'profil-defaut.png', 0, '2020-01-26'),
(6, 'LULU', 'Lulu', '3444-12-01', 'lulu@lulu', '5d933eef19aee7da192608de61b6c23d', 'profil-defaut.png', 0, '2020-01-26'),
(8, 'INSSA', 'Moussa', '1998-01-02', 'moussainssa@outlook.fr', '7e98b8a17c0aad30ba64d47b74e2a6c1', 'profil-defaut.png', 0, '2020-02-11');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Message_Users1_FK` FOREIGN KEY (`idUsers1`) REFERENCES `users` (`idUsers`),
  ADD CONSTRAINT `Message_Users2_FK` FOREIGN KEY (`idUsers2`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
