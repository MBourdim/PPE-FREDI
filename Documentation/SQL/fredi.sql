-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 10 mars 2020 à 14:44
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fredi`
--


CREATE DATABASE IF NOT EXISTS fredi DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fredi;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_utilisateur` int(11) NOT NULL,
  `numero_licence` varchar(50) NOT NULL,
  `code_sexe` varchar(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse1` varchar(50) NOT NULL,
  `adresse2` varchar(50) NOT NULL,
  `adresse3` varchar(50) NOT NULL,
  `nom_responsable` varchar(1) NOT NULL,
  `prenom_responsable` varchar(20) NOT NULL,
  `code_statut` tinyint(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code_statut_utilisateur` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `id_type_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_utilisateur`, `numero_licence`, `code_sexe`, `date_naissance`, `adresse1`, `adresse2`, `adresse3`, `nom_responsable`, `prenom_responsable`, `code_statut`, `nom`, `prenom`, `email`, `password`, `code_statut_utilisateur`, `id_club`, `id_type_utilisateur`) VALUES
(1, ' 17 05 40 010 443', 'M', '1998-07-26', '30, rue Widric 1er', '54600', 'Villers les Nancy', 'B', 'CLEMENT', 0, '', '', '', '', 0, 0, 0),
(2, ' 17 05 40 010 340', 'F', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy', 'B', 'LUCILLE', 1, '', '', '', '', 0, 0, 0),
(3, ' 17 05 40 010 338', 'M', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy', 'B', 'THEO', 0, '', '', '', '', 0, 0, 0),
(4, ' 17 05 40 010 309', 'M', '1998-03-28', '1, rue des Mesanges', '54600', 'Villers les Nancy', 'B', 'ROMAIN', 0, '', '', '', '', 0, 0, 0),
(5, ' 17 05 40 010 334', 'F', '1962-12-09', '27, rue de Santifontaine', '54000', 'Nancy', 'B', 'VERONIQUE', 0, '', '', '', '', 0, 0, 0),
(6, ' 17 05 40 010 399', 'F', '1958-09-20', '5, rue des trois epis', '54600', 'Villers les Nancy', 'B', 'BRIGITTE', 0, '', '', '', '', 0, 0, 0),
(7, ' 17 05 40 010 442', 'F', '1991-11-30', '5, rue des trois epis', '54600', 'Villers les Nancy', 'B', 'JULIE', 0, '', '', '', '', 0, 0, 0),
(8, ' 17 05 40 010 308', 'M', '1962-09-24', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'B', 'DIDIER', 0, '', '', '', '', 0, 0, 0),
(9, ' 17 05 40 010 329', 'F', '1963-06-07', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'B', 'CLAIRE', 0, '', '', '', '', 0, 0, 0),
(10, ' 17 05 40 010 254', 'F', '1986-09-28', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'B', 'MARIANNE', 0, '', '', '', '', 0, 0, 0),
(11, ' 17 05 40 010 407', 'M', '1997-08-21', '12, rue Edouard Grosjean', '54520', 'Laxou', 'B', 'MARIUS', 0, '', '', '', '', 0, 0, 0),
(12, ' 17 05 40 010 444', 'M', '1998-09-22', '12, rue de Malzeville', '54000', 'Nancy', 'C', 'THOMAS', 0, '', '', '', '', 0, 0, 0),
(13, ' 17 05 40 010 431', 'M', '1998-06-10', '26, rue de l\'abbe Didelot', '54600', 'Villers les Nancy', 'C', 'TIMOTHE', 0, '', '', '', '', 0, 0, 0),
(14, ' 17 05 40 010 428', 'M', '1983-04-19', '46, rue de l\'abbe Didelot', '54520', 'Laxou', 'C', 'NICOLAS', 0, '', '', '', '', 0, 0, 0),
(15, ' 17 05 40 010 414', 'M', '1999-09-24', '63, rue Francais', '54000', 'Nancy', 'C', 'UGO', 0, '', '', '', '', 0, 0, 0),
(16, ' 17 05 40 010 441', 'M', '1998-03-29', '40, rue de la republique', '54320', 'Maxeville', 'C', 'LOUIS', 0, '', '', '', '', 0, 0, 0),
(17, ' 17 05 40 010 440', 'M', '1999-08-02', '168, avenue de Boufflers', '54000', 'Nancy', 'C', 'TOM', 0, '', '', '', '', 0, 0, 0),
(18, ' 17 05 40 010 402', 'M', '1995-04-15', '14 route de Toul', '54113', 'Blenod les toul', 'C', 'FLORIAN', 0, '', '', '', '', 0, 0, 0),
(19, ' 17 05 40 010 351', 'M', '1982-12-31', '40 rue Paul Bert', '54600', 'Villers les Nancy', 'D', 'ARNAUD', 0, '', '', '', '', 0, 0, 0),
(20, ' 17 05 40 010 409', 'F', '1998-01-27', '26, rue du petit etang', '54110', 'Buissoncourt', 'D', 'BEATRICE', 0, '', '', '', '', 0, 0, 0),
(21, ' 17 05 40 010 446', 'M', '1996-12-03', '31, rue du chanoine Pierron', '54600', 'Villers les nancy', 'D', 'AUGUSTIN', 0, '', '', '', '', 0, 0, 0),
(22, ' 17 05 40 010 395', 'M', '1963-07-08', '31, avenue de Marron', '54600', 'Villers les nancy', 'G', 'GILLES', 0, '', '', '', '', 0, 0, 0),
(23, ' 17 05 40 010 338', 'M', '1994-03-21', '31, avenue de Marron', '54600', 'Villers les Nancy', 'G', 'YANN', 0, '', '', '', '', 0, 0, 0),
(24, ' 17 05 40 010 382', 'F', '1997-11-26', '19, rue de Lavaux', '54520', 'Laxou', 'H', 'CLEMENTINE', 0, '', '', '', '', 0, 0, 0),
(25, ' 17 05 40 010 420', 'F', '1999-03-08', '32, allee de l\'observatoire', '54520', 'Laxou', 'H', 'AUXANE', 0, '', '', '', '', 0, 0, 0),
(26, ' 17 05 40 010 341', 'F', '1976-06-04', '4 rue du marechal Gallieni', '54600', 'Villers les Nancy', 'H', 'ISABELLE', 0, '', '', '', '', 0, 0, 0),
(27, ' 17 05 40 010 432', 'M', '2002-11-16', '62, avenue Paul Deroulede', '54600', 'Villers les Nancy', 'L', 'CLEMENT', 0, '', '', '', '', 0, 0, 0),
(28, ' 17 05 40 010 429', 'M', '1993-07-23', '65, rue de la sivrite', '54600', 'Villers les Nancy', 'L', 'GREGOIRE', 0, '', '', '', '', 0, 0, 0),
(29, ' 17 05 40 010 419', 'M', '1998-09-02', '10, rue des orchidees', '54600', 'Villers les Nancy', 'L', 'NICOLAS', 0, '', '', '', '', 0, 0, 0),
(30, ' 17 05 40 010 401', 'M', '1997-01-24', '42, rue de la commanderie', '54840', 'Sexey les bois', 'L', 'NATHAN', 0, '', '', '', '', 0, 0, 0),
(31, ' 17 05 40 010 439', 'M', '1999-09-30', '16, rue de Gerbeviller', '54000', 'Nancy', 'L', 'CYPRIEN', 0, '', '', '', '', 0, 0, 0),
(32, ' 17 05 40 010 364', 'M', '1951-12-26', '1, rue de Normandie', '54500', 'Vandoeuvre', 'L', 'ETIENNE', 0, '', '', '', '', 0, 0, 0),
(33, ' 17 05 40 010 353', 'M', '1996-04-26', '6, rue Winston Churchill', '54000', 'Nancy', 'P', 'PAUL', 0, '', '', '', '', 0, 0, 0),
(34, ' 17 05 40 010 438', 'M', '2001-11-13', '3, rue de l\'Embanie', '54520', 'Laxou', 'R', 'ELIOT', 0, '', '', '', '', 0, 0, 0),
(35, ' 17 05 40 010 121', 'M', '1957-01-03', '2 , grande rue', '54210', 'Azelot', 'S', 'GILLES', 0, '', '', '', '', 0, 0, 0),
(36, ' 17 05 40 010 447', 'F', '2000-04-14', '1, allee du cenacle', '54520', 'Laxou', 'S', 'LEA', 0, '', '', '', '', 0, 0, 0),
(37, ' 17 05 40 010 405', 'M', '1997-10-13', '34, rue de Badonviller', '54000', 'Nancy', 'T', 'PIERRE', 0, '', '', '', '', 0, 0, 0),
(38, ' 17 05 40 010 437', 'M', '2000-06-02', '15, rue de la Seille', '54320', 'Maxeville', 'Z', 'MATHIEU', 0, '', '', '', '', 0, 0, 0),
(39, ' 17 05 40 010 418', 'F', '1970-09-25', '8, sentier de Saint-Arriant', '54520', 'Laxou', 'Z', 'STEPHANIE', 0, '', '', '', '', 0, 0, 0),
(40, ' 17 05 40 010 448', 'M', '2000-08-14', 'immeuble Savoie', '54520', 'Laxou', 'Z', 'THOMAS', 0, '', '', '', '', 0, 0, 0),
(100, '17 05 40 010 449', 'M', '1995-09-04', '45 rue de limayrac', '54000', 'Laxou', 'C', 'CONTROLEUR', 0, '', '', '', '', 0, 0, 0),
(101, '17 05 40 010 450', 'M', '1995-09-05', '45 rue de limayrac', '54000', 'Laxou', 'A', 'ADMIN', 0, '', '', '', '', 0, 0, 0),
(102, '17 05 40 010 451', 'M', '1995-09-06', '45 rue de limayrac', '54000', 'Laxou', 'A', 'ADHERENT', 0, '', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code_statut` int(11) NOT NULL,
  `id_type_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `adresse1` varchar(50) NOT NULL,
  `adresse2` varchar(50) NOT NULL,
  `adresse3` varchar(50) NOT NULL,
  `id_ligue` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id_club`, `libelle`, `adresse1`, `adresse2`, `adresse3`, `id_ligue`, `id_utilisateur`) VALUES
(1, 'DOJO BURGIEN', '1 RUE DU DR DUBY', '1000', 'BOURG EN BRESSE', 0, 0),
(2, 'SAINT DENIS DOJO', '239 ALLEES DES SPORTS', '1000', 'ST DENIS LES BOURG', 0, 0),
(3, 'JUDO CLUB VALLEE ARBENT', 'RUE DU GENERAL ANDREA', '1100', 'ARBENT', 0, 0),
(4, 'BELLI JUDO', '1 RUE DU BAC', '1100', 'BELLIGNAT', 0, 0),
(5, 'RACING CLUB MONTLUEL JUDO', '170 RUE DES CHARTINIERES', '1120', 'DAGNEUX', 0, 0),
(6, 'CENTRE ARTS MARTIAUX PONDINOIS', 'RUE DE L OISELON', '1160', 'PONT D AIN', 0, 0),
(7, 'JUDO CLUB ORNEX', '58 RUE DES PRALETS', '1210', 'ORNEX', 0, 0),
(8, 'DOJO GESSIEN VALSERINE', 'AVENUE DES VOIRONS', '1220', 'DIVONNE LES BAINS', 0, 0),
(9, 'DOJO LA VALLIERE', 'COMPLEXE SPORTIF', '1250', 'MONTAGNAT', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `controleur`
--

CREATE TABLE `controleur` (
  `id_utilisateur` int(11) NOT NULL,
  `Matricule_CONT` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code_statut` int(11) NOT NULL,
  `id_type_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_de_frais`
--

CREATE TABLE `ligne_de_frais` (
  `id_ligne` int(11) NOT NULL,
  `date_frais` date NOT NULL,
  `lib_trajet` varchar(50) NOT NULL,
  `cout_peage` decimal(10,0) NOT NULL,
  `cout_repas` decimal(10,0) NOT NULL,
  `cout_hebergement` decimal(10,0) NOT NULL,
  `nb_km` int(11) NOT NULL,
  `total_km` decimal(10,0) NOT NULL,
  `total_ligne` decimal(10,0) NOT NULL,
  `code_statut` int(11) NOT NULL,
  `id_motif` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `id_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne_de_frais`
--

INSERT INTO `ligne_de_frais` (`id_ligne`, `date_frais`, `lib_trajet`, `cout_peage`, `cout_repas`, `cout_hebergement`, `nb_km`, `total_km`, `total_ligne`, `code_statut`, `id_motif`, `annee`, `id_note`) VALUES
(10, '2019-12-17', 'Mazamet - Toulouse', '10', '102222', '0', 100, '2100', '2120', 1, 1, 0, 0),
(11, '2019-12-17', 'Mazamet - Toulouse', '10', '10', '0', 100, '2100', '2120', 0, 0, 2019, 0),
(12, '2019-12-27', 'Mazamet', '20', '353557', '0', 100, '2100', '355677', 1, 2, 2019, 0),
(20, '2022-01-01', 'Aveyron - Ariege', '54', '13', '50', 220, '440', '557', 1, 1, 2022, 0),
(21, '2022-03-01', 'Millau - Bordeaux', '100', '520', '600', 320, '640', '1860', 1, 3, 2022, 0),
(22, '2020-03-04', 'Millau Toulouse', '9', '30', '50', 200, '4200', '4289', 1, 1, 2020, 4);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `adresse1` varchar(50) NOT NULL,
  `adresse2` varchar(50) NOT NULL,
  `adresse3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `libelle`, `adresse1`, `adresse2`, `adresse3`) VALUES
(1, 'Aéromodélisme', '', '', ''),
(2, 'Aéronautique', '', '', ''),
(3, 'Aérostation', '', '', ''),
(4, 'Aikido', '', '', ''),
(5, 'Aikido FFAAA et aikibudo', '', '', ''),
(6, 'ASPTT', '', '', ''),
(7, 'Badminton', '', '', ''),
(8, 'Ball Trap', '', '', ''),
(9, 'Baseball', '', '', ''),
(10, 'Basketball', '', '', ''),
(11, 'Billard', '', '', ''),
(12, 'Volleyball', '', '', ''),
(13, 'Athlétisme', '', '', ''),
(14, 'Boxe anglaise', '', '', ''),
(15, 'Canoé-kayak', '', '', ''),
(16, 'Danse', '', '', ''),
(17, 'Echecs', '', '', ''),
(18, 'Escrime', '', '', ''),
(19, 'Football', '', '', ''),
(20, 'Golf', '', '', ''),
(21, 'Gymnastique', '', '', ''),
(22, 'Judo', '', '', ''),
(23, 'Karaté et da', '', '', ''),
(24, 'Natation', '', '', ''),
(25, 'Rugby', '', '', ''),
(26, 'Tennis', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `motif_de_frais`
--

CREATE TABLE `motif_de_frais` (
  `id_motif` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motif_de_frais`
--

INSERT INTO `motif_de_frais` (`id_motif`, `libelle`) VALUES
(1, 'Réunion'),
(2, 'Compétition régionale'),
(3, 'Compétition nationale'),
(4, 'Compétition internationnale'),
(5, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `date_remise` date NOT NULL,
  `total` float NOT NULL,
  `code_statut` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `date_remise`, `total`, `code_statut`, `id_utilisateur`) VALUES
(1, '2019-12-17', 0, 0, 1),
(2, '2019-12-17', 0, 0, 35),
(4, '2020-03-04', 0, 1, 104);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `annee` int(11) NOT NULL,
  `forfait_km` decimal(10,2) NOT NULL,
  `code_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`annee`, `forfait_km`, `code_statut`) VALUES
(2019, '21.00', 0),
(2020, '20.56', 1),
(2021, '60.00', 0),
(2022, '1.50', 1),
(2052, '0.00', 0),
(3030, '2.00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_util`
--

CREATE TABLE `type_util` (
  `id_type_utilisateur` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_util`
--

INSERT INTO `type_util` (`id_type_utilisateur`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Controleur'),
(3, 'Adherent');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code_statut` int(11) NOT NULL,
  `id_type_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `code_statut`, `id_type_utilisateur`) VALUES
(1, 'BANDILELLA', 'CLEMENT', 'BANDILELLA@BANDILELLA.fr', '$2y$10$MhqPrY1I.kGoIB3cVzBQl.Ccob6m8QgYRTeVCpVADm/', 1, 3),
(2, 'BERBIER', 'LUCILLE', 'BERBIER@BERBIER.fr', '$2y$10$XIXS44ESJAFwhjUtN0/J9eeapdTLHWbBi.xP4tpw/D3', 1, 3),
(3, 'BERBIER', 'THEO', 'BERBIER@BERBIER.fr', '$2y$10$Ab23t3qHgIQLbLtf9ASWkO.fn9uDgo8FVyW8zgLnnij', 1, 3),
(4, 'BECKER', 'ROMAIN', 'BECKER@BECKER.fr', '$2y$10$jlXf9eSyv8VAOL2lpN494uLmYW2qSm56d5rL.R/gM4z', 1, 3),
(5, 'BIACQUEL', 'VERONIQUE', 'BIACQUEL@BIACQUEL.fr', '$2y$10$Phk2GWJ6HNjTMsn.r2v.z.GZi6J5AajMiNuMBICfQ0u', 1, 3),
(6, 'BIDELOT', 'BRIGITTE', 'BIDELOT@BIDELOT.fr', '$2y$10$Kp1256r0S3l5EWkrk1Iq5e4DfAcObER9ZD8VEldj3sB', 1, 3),
(7, 'BIDELOT', 'JULIE', 'BIDELOT@BIDELOT.fr', '$2y$10$aRY9z9P8WWXKAaPGPxUwb.0mlSBo0Hay3mPWWpreem1', 1, 3),
(8, 'BILLOT', 'DIDIER', 'BILLOT@BILLOT.fr', '$2y$10$1DXcnVY9f53Nh91eARenEu7SoDp6T5zodzgoofq4cZg', 1, 3),
(9, 'BILLOT', 'CLAIRE', 'BILLOT@BILLOT.fr', '$2y$10$gZzGd2sAqTpu54PdQfrEIub7IrTefqmfpgoU32CVVgq', 1, 3),
(10, 'BILLOT', 'MARIANNE', 'BILLOT@BILLOT.fr', '$2y$10$tQbRkYhbr8ScZx.lqkRP3OB3.9H6HQbHZHUgAxjrK.X', 1, 3),
(11, 'BINNET', 'MARIUS', 'BINNET@BINNET.fr', '$2y$10$0.PhF.BHOOQg.6yZtVDMR.Uv05n9fg/Se/HxNq47J.A', 1, 3),
(12, 'CALDI', 'THOMAS', 'CALDI@CALDI.fr', '$2y$10$JK7rh8f/hkTIfaI12zqbdOKRlyhIc0kBWN3405Dq9IO', 1, 3),
(13, 'CASTEL', 'TIMOTHE', 'CASTEL@CASTEL.fr', '$2y$10$uhw3mmKWvH9J50AKXzuq0eAMbz/s/reCIZ7TwmgOKHp', 1, 3),
(14, 'CHEOLLE', 'NICOLAS', 'CHEOLLE@CHEOLLE.fr', '$2y$10$QPCgSRA7nSVebTIsT4tbMOeMcNzonUvxPgufdyHSUyW', 1, 3),
(15, 'CHERPION', 'UGO', 'CHERPION@CHERPION.fr', '$2y$10$YPBShiLO8wJ.u8A1.Qy4iOvUNkqHHM7NFo6WvwQC3y2', 1, 3),
(16, 'CHEVOITINE', 'LOUIS', 'CHEVOITINE@CHEVOITINE.fr', '$2y$10$DaPa/wJ1jQgzwSgef.K8q.ERFRvMiH2kvDGn5rKenLu', 1, 3),
(17, 'CHOUARNO', 'TOM', 'CHOUARNO@CHOUARNO.fr', '$2y$10$7HjDHMQhaT7fcmPCRea1xuDFoV74o5OFCVNJ2PgeRUH', 1, 3),
(18, 'COTIN', 'FLORIAN', 'COTIN@COTIN.fr', '$2y$10$2ht3iEOqWSw4CqLo1Yx0.O324bu7o/a0W5zbeO1ufhU', 1, 3),
(19, 'DEPERRIN', 'ARNAUD', 'DEPERRIN@DEPERRIN.fr', '$2y$10$lb8Zp8z2ZoF3xJ4VRToEy.THU4LZhN/YiEnWgs1ZoRo', 1, 3),
(20, 'DEPRETRE', 'BEATRICE', 'DEPRETRE@DEPRETRE.fr', '$2y$10$b.aCImehjcfsZrYNDvRH/eekoKBv.Xld6Vp5QHK8C1f', 1, 3),
(21, 'DUCRICK', 'AUGUSTIN', 'DUCRICK@DUCRICK.fr', '$2y$10$DePvNOwGDCvXqRY1VmOnfON2lMCj3j6XvtNvQ6FDp.i', 1, 3),
(22, 'GARBILLON', 'GILLES', 'GARBILLON@GARBILLON.fr', '$2y$10$syRLqDeaaiwMmRla8fY75eXOvBD1uph2d7HP1sGQpHV', 1, 3),
(23, 'GARBILLON', 'YANN', 'GARBILLON@GARBILLON.fr', '$2y$10$PpYVLFUijHhL0IYR357tNeAs1Iwklpl7yHF4KZckZVy', 1, 3),
(24, 'HAGENBACH', 'CLEMENTINE', 'HAGENBACH@HAGENBACH.fr', '$2y$10$nBi2X0VyYSd3fNnbm0aUk.PJDAfIqUNPLUhV9/dOlY.', 1, 3),
(25, 'HASFELD', 'AUXANE', 'HASFELD@HASFELD.fr', '$2y$10$5JS9U58N/YWM7doyrjVtLeqyVZWJ/7mZSgouRJ8WKYs', 1, 3),
(26, 'HUMERT', 'ISABELLE', 'HUMERT@HUMERT.fr', '$2y$10$gMvG1EAzeN9MiXqtmXzpqexx1X52vXyCddhoviOH8jH', 1, 3),
(27, 'LAFIEGLON', 'CLEMENT', 'LAFIEGLON@LAFIEGLON.fr', '$2y$10$MRQy01837N8IQfeLOhKgZ.GRX0KZyrz47PTJQZ/UA5P', 1, 3),
(28, 'LAMOINE', 'GREGOIRE', 'LAMOINE@LAMOINE.fr', '$2y$10$khMnpodWvs/S/YuD4yVUN.Y/f8s9W2xAJkHgVt74Tjj', 1, 3),
(29, 'LANIELLE', 'NICOLAS', 'LANIELLE@LANIELLE.fr', '$2y$10$3sJWVho4vCf2fknIT6eO6.CyBgcjvlDOE/eIosw1ILH', 1, 3),
(30, 'LIEVIN', 'NATHAN', 'LIEVIN@LIEVIN.fr', '$2y$10$n7YFh3GVzmcIy4iNBVaYtOO66Y/iJ/snfL6GyFDWhn6', 1, 3),
(31, 'LOTANG', 'CYPRIEN', 'LOTANG@LOTANG.fr', '$2y$10$wlIzVZRaK2dz8evEkrC/g.yMQz8g09TGzXhg2JxCfct', 1, 3),
(32, 'LUQUE', 'ETIENNE', 'LUQUE@LUQUE.fr', '$2y$10$..BI3Y6HS2OPi9HjD80gk.knGWdH146Z4DG5lvzZa0s', 1, 3),
(33, 'PERNOT', 'PAUL', 'PERNOT@PERNOT.fr', '$2y$10$sHYaeAknklwbEMTfhX2MNOLoMoWQPXvENlyEgygx1F1', 1, 3),
(34, 'REMILLON', 'ELIOT', 'REMILLON@REMILLON.fr', '$2y$10$BpVXJTBisU083Jl2QIfHr.0ee6s.V04ZetjK6dGM.RH', 1, 3),
(35, 'SILBERT', 'GILLES', 'SILBERT@SILBERT.fr', '$2y$10$wQridJ9LdN6HKxuZVKsZyO6lozN2dQ/tOvN98QgETPk', 1, 3),
(36, 'SILBERT', 'LEA', 'SILBERT@SILBERT.fr', '$2y$10$wWmhW6l5tEn2VUb.KBkHCe4qSwsJ2.1J34d4/WWOcEV', 1, 3),
(37, 'TORTEMANN', 'PIERRE', 'TORTEMANN@TORTEMANN.fr', '$2y$10$kojmGlanqDBZGxsF5/qm8e7ZkjB85eJCQSN.2ns7eZi', 1, 3),
(38, 'ZOECKEL', 'MATHIEU', 'ZOECKEL@ZOECKEL.fr', '$2y$10$MzQ.RFk9JSxVX10CfI995eaMI50.4h.RpzvW1dBiOdC', 1, 3),
(39, 'ZUEL', 'STEPHANIE', 'ZUEL@ZUEL.fr', '$2y$10$3.fwHyNLAdC4l5J4NhuMAuD33QUsL4hv81jnDgfD7uB', 1, 3),
(40, 'ZUERO', 'THOMAS', 'ZUERO@ZUERO.fr', '$2y$10$Ct/CLAKYEGyLZm5SIJnkIeqeXx4rtH8o/UvDklcnv7k', 1, 3),
(100, 'Controlleur', 'Compte', 'compte@controlleur.fr', '$2y$10$4bV1UXHFo.Cisy5aNfHIC.xutl7mo2ty.jd1J5LAMNx', 1, 2),
(101, 'Administrateur', 'Compte', 'compte@administrateur.fr', '$2y$10$zU7N3JVr9vknvaQIEz2NuOizVH6Fu5XomQ8unmbDlSy', 1, 1),
(102, 'Adherent', 'Compte', 'compte@adherent.fr', '$2y$10$6N6g7qPk0l1sCJtIfx85zeD3GhX831ZA1W5Nouph5KO', 1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `adherent_club0_FK` (`id_club`),
  ADD KEY `adherent_type_util1_FK` (`id_type_utilisateur`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `administrateur_type_util0_FK` (`id_type_utilisateur`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `club_ligue_FK` (`id_ligue`),
  ADD KEY `club_controleur0_FK` (`id_utilisateur`);

--
-- Index pour la table `controleur`
--
ALTER TABLE `controleur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `controleur_type_util0_FK` (`id_type_utilisateur`);

--
-- Index pour la table `ligne_de_frais`
--
ALTER TABLE `ligne_de_frais`
  ADD PRIMARY KEY (`id_ligne`),
  ADD KEY `ligne_de_frais_motif_de_frais_FK` (`id_motif`),
  ADD KEY `ligne_de_frais_periode0_FK` (`annee`),
  ADD KEY `ligne_de_frais_note1_FK` (`id_note`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif_de_frais`
--
ALTER TABLE `motif_de_frais`
  ADD PRIMARY KEY (`id_motif`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`annee`);

--
-- Index pour la table `type_util`
--
ALTER TABLE `type_util`
  ADD PRIMARY KEY (`id_type_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `utilisateur_type_util_FK` (`id_type_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ligne_de_frais`
--
ALTER TABLE `ligne_de_frais`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `motif_de_frais`
--
ALTER TABLE `motif_de_frais`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_util`
--
ALTER TABLE `type_util`
  MODIFY `id_type_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_club0_FK` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `adherent_type_util1_FK` FOREIGN KEY (`id_type_utilisateur`) REFERENCES `type_util` (`id_type_utilisateur`),
  ADD CONSTRAINT `adherent_utilisateur_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_type_util0_FK` FOREIGN KEY (`id_type_utilisateur`) REFERENCES `type_util` (`id_type_utilisateur`),
  ADD CONSTRAINT `administrateur_utilisateur_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_controleur0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `controleur` (`id_utilisateur`),
  ADD CONSTRAINT `club_ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `controleur`
--
ALTER TABLE `controleur`
  ADD CONSTRAINT `controleur_type_util0_FK` FOREIGN KEY (`id_type_utilisateur`) REFERENCES `type_util` (`id_type_utilisateur`),
  ADD CONSTRAINT `controleur_utilisateur_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `ligne_de_frais`
--
ALTER TABLE `ligne_de_frais`
  ADD CONSTRAINT `ligne_de_frais_motif_de_frais_FK` FOREIGN KEY (`id_motif`) REFERENCES `motif_de_frais` (`id_motif`),
  ADD CONSTRAINT `ligne_de_frais_note1_FK` FOREIGN KEY (`id_note`) REFERENCES `note` (`id_note`),
  ADD CONSTRAINT `ligne_de_frais_periode0_FK` FOREIGN KEY (`annee`) REFERENCES `periode` (`annee`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_adherent_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `adherent` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_type_util_FK` FOREIGN KEY (`id_type_utilisateur`) REFERENCES `type_util` (`id_type_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
