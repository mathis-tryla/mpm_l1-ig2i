-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 26 juin 2019 à 14:13
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mpmTennis_final`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `numCarte` char(4) NOT NULL,
  `mdp` char(4) DEFAULT NULL,
  `administrateur` int(11) DEFAULT NULL,
  `blacklisté` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`numCarte`, `mdp`, `administrateur`, `blacklisté`) VALUES
('0008', '3010', 0, 0),
('0057', '1812', 0, 0),
('0654', '2301', 0, 0),
('1000', '0208', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `nomClub` char(30) NOT NULL,
  `telClub` char(10) DEFAULT NULL,
  `telPresident` char(10) DEFAULT NULL,
  `adresseClub` char(100) DEFAULT NULL,
  `villeClub` char(100) DEFAULT NULL,
  `horaires` char(40) DEFAULT NULL,
  `horaireExceptionnel` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`nomClub`, `telClub`, `telPresident`, `adresseClub`, `villeClub`, `horaires`, `horaireExceptionnel`) VALUES
('TC Courrières', '0321496113', '0683178072', 'Halle Henri Cochet\r\nChemin de Douai', '62710\r\nCOURRIERES', '8H-21H Lundi au Vendredi', '');

-- --------------------------------------------------------

--
-- Structure de la table `courts`
--

CREATE TABLE `courts` (
  `numCourt` int(11) NOT NULL,
  `nom` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `courts`
--

INSERT INTO `courts` (`numCourt`, `nom`) VALUES
(1, 'Simonne Mathieu'),
(2, 'Francis Dubois'),
(3, 'Pascoe Valez'),
(4, 'Philippe Chatrier');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `nomDepartement` char(40) NOT NULL,
  `numDepartement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`nomDepartement`, `numDepartement`) VALUES
('Ain', 1),
('Aisne', 2),
('Allier', 3),
('Alpes de Haute-Provence', 4),
('Alpes-Maritimes', 6),
('Ardêche', 7),
('Ardennes', 8),
('Ariège', 9),
('Aube', 10),
('Aude', 11),
('Aveyron', 12),
('Bas-Rhin', 67),
('Bouches-du-Rhône', 13),
('Calvados', 14),
('Cantal', 15),
('Charente', 16),
('Charente-Maritime', 17),
('Cher', 18),
('Corrèze', 19),
('Corse du Sud', 96),
('Côte-d\'Or', 21),
('Côtes d\'Armor', 22),
('Creuse', 23),
('Deux-Sèvres', 79),
('Dordogne', 24),
('Doubs', 25),
('Drôme', 26),
('Essonne', 91),
('Eure', 27),
('Eure-et-Loir', 28),
('Finistère', 29),
('Gard', 30),
('Gers', 32),
('Gironde', 33),
('Guadeloupe', 98),
('Guyane', 100),
('Haut-Rhin', 68),
('Haute-Corse', 97),
('Haute-Garonne', 31),
('Haute-Loire', 43),
('Haute-Marne', 52),
('Haute-Saône', 70),
('Haute-Savoie', 74),
('Haute-Vienne', 87),
('Hautes-Alpes', 5),
('Hautes-Pyrénées', 65),
('Hauts-de-Seine', 92),
('Hérault', 34),
('Île-et-Vilaine', 35),
('Indre', 36),
('Indre-et-Loire', 37),
('Isère', 38),
('Jura', 39),
('La Réunion', 101),
('Landes', 40),
('Loir-et-Cher', 41),
('Loire', 42),
('Loire-Atlantique', 44),
('Loiret', 45),
('Lot', 46),
('Lot-et-Garonne', 47),
('Lozère', 48),
('Maine-et-Loire', 49),
('Manche', 50),
('Marne', 51),
('Martinique', 99),
('Mayenne', 53),
('Meurthe-et-Moselle', 54),
('Meuse', 55),
('Monaco', 20),
('Morbihan', 56),
('Moselle', 57),
('Nièvre', 58),
('Nord', 59),
('Nouvelle-Calédonie', 102),
('Oise', 60),
('Orne', 61),
('Paris', 75),
('Pas-de-Calais', 62),
('Puy-de-Dôme', 63),
('Pyrénées-Atlantiques', 64),
('Pyrénées-Orientales', 66),
('Rhône', 69),
('Saône-et-Loire', 71),
('Sarthe', 72),
('Savoie', 73),
('Seine-et-Marne', 77),
('Seine-Maritime', 76),
('Seine-Saint-Denis', 93),
('Somme', 80),
('Tarn', 81),
('Tarn-et-Garonne', 82),
('Territoire-de-Belfort', 90),
('Val-d\'Oise', 95),
('Val-de-Marne', 94),
('Var', 83),
('Vaucluse', 84),
('Vendée', 85),
('Vienne', 86),
('Vosges', 88),
('Yonne', 89),
('Yvelines', 78);

-- --------------------------------------------------------

--
-- Structure de la table `les_clubs`
--

CREATE TABLE `les_clubs` (
  `nomClub` char(30) NOT NULL,
  `ligue` char(40) DEFAULT NULL,
  `departement` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE `ligues` (
  `nomLigue` char(30) NOT NULL,
  `idLigue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`nomLigue`, `idLigue`) VALUES
('AUVERGNE RHONE-ALPES', 0),
('BOURGOGNE FRANCHE COMTE', 1),
('BRETAGNE', 2),
('CENTRE VAL DE LOIRE', 3),
('CORSE', 4),
('GRAND EST', 5),
('GUADELOUPE', 6),
('GUYANE', 7),
('HAUTS DE FRANCE', 8),
('ILE DE FRANCE', 9),
('MARTINIQUE', 10),
('NORMANDIE', 11),
('NOUVELLE AQUITAINE', 12),
('NOUVELLE CALEDONIE', 13),
('OCCITANIE', 14),
('PAYS DE LA LOIRE', 15),
('PROVENCE ALPES COTE AZUR', 16),
('REUNION', 17);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `numReserv` int(11) NOT NULL,
  `numCourt` int(11) DEFAULT NULL,
  `heure` char(5) DEFAULT NULL,
  `occupation` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

CREATE TABLE `tournois` (
  `nomTournoi` char(80) NOT NULL,
  `club` char(20) DEFAULT NULL,
  `ligue` char(30) DEFAULT NULL,
  `departement` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `numLicence` char(8) NOT NULL,
  `numCarte` char(4) NOT NULL,
  `ligue` char(30) DEFAULT NULL,
  `nom` char(10) DEFAULT NULL,
  `prenom` char(20) DEFAULT NULL,
  `age` char(3) DEFAULT NULL,
  `adresse` char(50) DEFAULT NULL,
  `mail` char(50) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `club` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`numLicence`, `numCarte`, `ligue`, `nom`, `prenom`, `age`, `adresse`, `mail`, `telephone`, `club`) VALUES
('0475620W', '0008', 'Hauts de France', 'Pin', 'Camille', '07', '4 Rue de Haut Pont', 'famillePin@orange.fr', '', 'TC Courrières'),
('1257803P', '0057', 'Hauts de France', 'Jamain', 'Jacques', '13', '128 Impasse Moliere', 'jacjam105@gmail.com', '', 'TC Courrières'),
('2641380B', '0654', 'Hauts de France', 'Aymé', 'Paul', '24', '140 Avenue Charles de Gaulle', 'ayme62@free.fr', '0712523478', 'TC Courrières'),
('2657491W', '1000', 'Hauts de France', 'Danet', 'Marie', '32', '126 Rue Jean Masset', 'marie.danet@orange.fr', '0657841304', 'TC Courrières');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`numCarte`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`nomClub`);

--
-- Index pour la table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`numCourt`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`nomDepartement`);

--
-- Index pour la table `les_clubs`
--
ALTER TABLE `les_clubs`
  ADD PRIMARY KEY (`nomClub`),
  ADD KEY `FKligue` (`ligue`),
  ADD KEY `FKdepart` (`departement`);

--
-- Index pour la table `ligues`
--
ALTER TABLE `ligues`
  ADD PRIMARY KEY (`nomLigue`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`numReserv`),
  ADD KEY `FKnumCourt` (`numCourt`);

--
-- Index pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD PRIMARY KEY (`nomTournoi`),
  ADD KEY `FKclub_tournoi` (`club`),
  ADD KEY `FKligue_tournoi` (`ligue`),
  ADD KEY `FKdepartem` (`departement`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`numLicence`,`numCarte`),
  ADD KEY `FKcarte` (`numCarte`),
  ADD KEY `FKclub` (`club`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `les_clubs`
--
ALTER TABLE `les_clubs`
  ADD CONSTRAINT `FKdepart` FOREIGN KEY (`departement`) REFERENCES `departements` (`nomDepartement`),
  ADD CONSTRAINT `FKligue` FOREIGN KEY (`ligue`) REFERENCES `ligues` (`nomLigue`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FKnumCourt` FOREIGN KEY (`numCourt`) REFERENCES `courts` (`numCourt`);

--
-- Contraintes pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD CONSTRAINT `FKclub_tournoi` FOREIGN KEY (`club`) REFERENCES `les_clubs` (`nomClub`),
  ADD CONSTRAINT `FKdepartem` FOREIGN KEY (`departement`) REFERENCES `departements` (`nomDepartement`),
  ADD CONSTRAINT `FKligue_tournoi` FOREIGN KEY (`ligue`) REFERENCES `ligues` (`nomLigue`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `FKcarte` FOREIGN KEY (`numCarte`) REFERENCES `admin` (`numCarte`),
  ADD CONSTRAINT `FKclub` FOREIGN KEY (`club`) REFERENCES `clubs` (`nomClub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
