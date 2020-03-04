SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4  DEFAULT 'profil-defaut.png',
  `statut` tinyint(1) NOT NULL,
  `dateInscrit` date NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `Users` (`idUsers`, `nom`, `prenom`, `dateNaissance`, `email`, `mdp`, `photo`, `statut`, `dateInscrit`) VALUES
(1, 'TITI', 'Titi', '1998-01-02', 'titi@titi', 'dcc18342554e6644fc51e09ef34d79fe', 'profil-defaut.png', 0, '2020-01-25'),
(2, 'TUTU', 'Tutu', '2242-01-02', 'tutu@tutu', '8d55cc5497f203ce9814caeeb42dbeff', 'profil-defaut.png', 0, '2020-01-25'),
(4, 'TOTO', 'Toto', '0242-04-02', 'toto@toto', '4124bc0a9335c27f086f24ba207a4912', 'profil-defaut.png', 0, '2020-01-26'),
(5, 'LILI', 'Lili', '0242-04-02', 'lili@lili', '4124bc0a9335c27f086f24ba207a4912', 'profil-defaut.png', 0, '2020-01-26'),
(6, 'LULU', 'Lulu', '3444-12-01', 'lulu@lulu', '3691308f2a4c2f6983f2880d32e29c84', 'profil-defaut.png', 0, '2020-01-26');


ALTER TABLE `message`
  ADD CONSTRAINT `Message_Users1_FK` FOREIGN KEY (`idUsers1`) REFERENCES `Users` (`idUsers`),
  ADD CONSTRAINT `Message_Users2_FK` FOREIGN KEY (`idUsers2`) REFERENCES `Users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
