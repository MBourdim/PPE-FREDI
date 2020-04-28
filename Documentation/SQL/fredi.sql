CREATE DATABASE IF NOT EXISTS fredi;
USE fredi;
-- phpMyAdmin SQL Dump
-- version 4.9.1
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 06 mars 2020 à 11:41
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
-- Base de données :  fredi
--

-- --------------------------------------------------------
--
-- Structure de la table adherent
--
CREATE TABLE adherent (
  id_utilisateur int(11) NOT NULL,
  numero_licence varchar(50) NOT NULL,
  code_sexe varchar(1) NOT NULL,
  date_naissance date NOT NULL,
  adresse1 varchar(50) NOT NULL,
  adresse2 varchar(50) NOT NULL,
  adresse3 varchar(50) NOT NULL,
  nom_responsable varchar(20) NOT NULL,
  prenom_responsable varchar(20) NOT NULL,
  code_statut tinyint(1) NOT NULL,
  id_club int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table adherent
--

INSERT INTO adherent (id_utilisateur, numero_licence, code_sexe, date_naissance, adresse1, adresse2, adresse3, nom_responsable, prenom_responsable, code_statut, id_club) VALUES
(1, ' 17 05 40 010 443', 'M', '1998-07-26', '30, rue Widric 1er', '54600', 'Villers les Nancy', 'BANDILELLA', 'CLEMENT', 0, 0),
(2, ' 17 05 40 010 340', 'F', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy', 'BERBIER', 'LUCILLE', 0, 0),
(3, ' 17 05 40 010 338', 'M', '1998-03-24', '12, rue de Marron', '54600', 'Villers les Nancy', 'BERBIER', 'THEO', 0, 0),
(4, ' 17 05 40 010 309', 'M', '1998-03-28', '1, rue des Mesanges', '54600', 'Villers les Nancy', 'BECKER', 'ROMAIN', 0, 0),
(5, ' 17 05 40 010 334', 'F', '1962-12-09', '27, rue de Santifontaine', '54000', 'Nancy', 'BIACQUEL', 'VERONIQUE', 0, 0),
(6, ' 17 05 40 010 399', 'F', '1958-09-20', '5, rue des trois epis', '54600', 'Villers les Nancy', 'BIDELOT', 'BRIGITTE', 0, 0),
(7, ' 17 05 40 010 442', 'F', '1991-11-30', '5, rue des trois epis', '54600', 'Villers les Nancy', 'BIDELOT', 'JULIE', 0, 0),
(8, ' 17 05 40 010 308', 'M', '1962-09-24', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'BILLOT', 'DIDIER', 0, 0),
(9, ' 17 05 40 010 329', 'F', '1963-06-07', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'BILLOT', 'CLAIRE', 0, 0),
(10, ' 17 05 40 010 254', 'F', '1986-09-28', '6, rue de la Sapiniere', '54600', 'Villers les Nancy', 'BILLOT', 'MARIANNE', 0, 0),
(11, ' 17 05 40 010 407', 'M', '1997-08-21', '12, rue Edouard Grosjean', '54520', 'Laxou', 'BINNET', 'MARIUS', 0, 0),
(12, ' 17 05 40 010 444', 'M', '1998-09-22', '12, rue de Malzeville', '54000', 'Nancy', 'CALDI', 'THOMAS', 0, 0),
(13, ' 17 05 40 010 431', 'M', '1998-06-10', '26, rue de l\'abbe Didelot', '54600', 'Villers les Nancy', 'CASTEL', 'TIMOTHE', 0, 0),
(14, ' 17 05 40 010 428', 'M', '1983-04-19', '46, rue de l\'abbe Didelot', '54520', 'Laxou', 'CHEOLLE', 'NICOLAS', 0, 0),
(15, ' 17 05 40 010 414', 'M', '1999-09-24', '63, rue Francais', '54000', 'Nancy', 'CHERPION', 'UGO', 0, 0),
(16, ' 17 05 40 010 441', 'M', '1998-03-29', '40, rue de la republique', '54320', 'Maxeville', 'CHEVOITINE', 'LOUIS', 0, 0),
(17, ' 17 05 40 010 440', 'M', '1999-08-02', '168, avenue de Boufflers', '54000', 'Nancy', 'CHOUARNO', 'TOM', 0, 0),
(18, ' 17 05 40 010 402', 'M', '1995-04-15', '14 route de Toul', '54113', 'Blenod les toul', 'COTIN', 'FLORIAN', 0, 0),
(19, ' 17 05 40 010 351', 'M', '1982-12-31', '40 rue Paul Bert', '54600', 'Villers les Nancy', 'DEPERRIN', 'ARNAUD', 0, 0),
(20, ' 17 05 40 010 409', 'F', '1998-01-27', '26, rue du petit etang', '54110', 'Buissoncourt', 'DEPRETRE', 'BEATRICE', 0, 0),
(21, ' 17 05 40 010 446', 'M', '1996-12-03', '31, rue du chanoine Pierron', '54600', 'Villers les nancy', 'DUCRICK', 'AUGUSTIN', 0, 0),
(22, ' 17 05 40 010 395', 'M', '1963-07-08', '31, avenue de Marron', '54600', 'Villers les nancy', 'GARBILLON', 'GILLES', 0, 0),
(23, ' 17 05 40 010 338', 'M', '1994-03-21', '31, avenue de Marron', '54600', 'Villers les Nancy', 'GARBILLON', 'YANN', 0, 0),
(24, ' 17 05 40 010 382', 'F', '1997-11-26', '19, rue de Lavaux', '54520', 'Laxou', 'HAGENBACH', 'CLEMENTINE', 0, 0),
(25, ' 17 05 40 010 420', 'F', '1999-03-08', '32, allee de l\'observatoire', '54520', 'Laxou', 'HASFELD', 'AUXANE', 0, 0),
(26, ' 17 05 40 010 341', 'F', '1976-06-04', '4 rue du marechal Gallieni', '54600', 'Villers les Nancy', 'HUMERT', 'ISABELLE', 0, 0),
(27, ' 17 05 40 010 432', 'M', '2002-11-16', '62, avenue Paul Deroulede', '54600', 'Villers les Nancy', 'LAFIEGLON', 'CLEMENT', 0, 0),
(28, ' 17 05 40 010 429', 'M', '1993-07-23', '65, rue de la sivrite', '54600', 'Villers les Nancy', 'LAMOINE', 'GREGOIRE', 0, 0),
(29, ' 17 05 40 010 419', 'M', '1998-09-02', '10, rue des orchidees', '54600', 'Villers les Nancy', 'LANIELLE', 'NICOLAS', 0, 0),
(30, ' 17 05 40 010 401', 'M', '1997-01-24', '42, rue de la commanderie', '54840', 'Sexey les bois', 'LIEVIN', 'NATHAN', 0, 0),
(31, ' 17 05 40 010 439', 'M', '1999-09-30', '16, rue de Gerbeviller', '54000', 'Nancy', 'LOTANG', 'CYPRIEN', 0, 0),
(32, ' 17 05 40 010 364', 'M', '1951-12-26', '1, rue de Normandie', '54500', 'Vandoeuvre', 'LUQUE', 'ETIENNE', 0, 0),
(33, ' 17 05 40 010 353', 'M', '1996-04-26', '6, rue Winston Churchill', '54000', 'Nancy', 'PERNOT', 'PAUL', 0, 0),
(34, ' 17 05 40 010 438', 'M', '2001-11-13', '3, rue de l\'Embanie', '54520', 'Laxou', 'REMILLON', 'ELIOT', 0, 0),
(35, ' 17 05 40 010 121', 'M', '1957-01-03', '2 , grande rue', '54210', 'Azelot', 'SILBERT', 'GILLES', 0, 0),
(36, ' 17 05 40 010 447', 'F', '2000-04-14', '1, allee du cenacle', '54520', 'Laxou', 'SILBERT', 'LEA', 0, 0),
(37, ' 17 05 40 010 405', 'M', '1997-10-13', '34, rue de Badonviller', '54000', 'Nancy', 'TORTEMANN', 'PIERRE', 0, 0),
(38, ' 17 05 40 010 437', 'M', '2000-06-02', '15, rue de la Seille', '54320', 'Maxeville', 'ZOECKEL', 'MATHIEU', 0, 0),
(39, ' 17 05 40 010 418', 'F', '1970-09-25', '8, sentier de Saint-Arriant', '54520', 'Laxou', 'ZUEL', 'STEPHANIE', 0, 0),
(40, ' 17 05 40 010 448', 'M', '2000-08-14', 'immeuble Savoie', '54520', 'Laxou', 'ZUERO', 'THOMAS', 0, 0),
(100, '17 05 40 010 449', 'M', '1995-09-04', '45 rue de limayrac', '54000', 'Laxou', 'CONTROLEUR', 'CONTROLEUR', 0, 0),
(101, '17 05 40 010 450', 'M', '1995-09-05', '45 rue de limayrac', '54000', 'Laxou', 'ADMIN', 'ADMIN', 0, 0),
(102, '17 05 40 010 451', 'M', '1995-09-06', '45 rue de limayrac', '54000', 'Laxou', 'ADHERENT', 'ADHERENT', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table administrateur
--
CREATE TABLE administrateur (
  id_utilisateur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table club
--
CREATE TABLE club (
  id_club int(11) NOT NULL,
  libelle varchar(50) NOT NULL,
  adresse1 varchar(50) NOT NULL,
  adresse2 varchar(50) NOT NULL,
  adresse3 varchar(50) NOT NULL,
  id_ligue int(11) NOT NULL,
  id_utilisateur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table club
--
INSERT INTO club (id_club, libelle, adresse1, adresse2, adresse3, id_ligue, id_utilisateur) VALUES
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
-- Structure de la table controleur
--
CREATE TABLE controleur (
  id_utilisateur int(11) NOT NULL,
  Matricule_CONT varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table ligne_de_frais
--
CREATE TABLE ligne_de_frais (
  id_ligne int(11) NOT NULL,
  date_frais date NOT NULL,
  lib_trajet varchar(50) NOT NULL,
  cout_peage decimal(10,0) NOT NULL,
  cout_repas decimal(10,0) NOT NULL,
  cout_hebergement decimal(10,0) NOT NULL,
  nb_km int(11) NOT NULL,
  total_km decimal(10,0) NOT NULL,
  total_ligne decimal(10,0) NOT NULL,
  code_statut int(11) NOT NULL,
  id_motif int(11) NOT NULL,
  annee int(11) NOT NULL,
  id_note int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table ligne_de_frais
--
INSERT INTO ligne_de_frais (id_ligne, date_frais, lib_trajet, cout_peage, cout_repas, cout_hebergement, nb_km, total_km, total_ligne, code_statut, id_motif, annee, id_note) VALUES
(10, '2019-12-17', 'Mazamet - Toulouse', '10', '102222', '0', 100, '2100', '2120', 1, 1, 0, 0),
(11, '2019-12-17', 'Mazamet - Toulouse', '10', '10', '0', 100, '2100', '2120', 0, 0, 2019, 0),
(12, '2019-12-27', 'Mazamet', '343', '353557', '0', 100, '2100', '356000', 0, 2, 2019, 0),
(19, '2020-03-06', 'test', '2', '50', '50', 200, '4000', '4102', 1, 1, 2020, 0);
--
-- Déclencheurs ligne_de_frais
--
DELIMITER $$
CREATE TRIGGER before_insert_total_km BEFORE INSERT ON ligne_de_frais FOR EACH ROW BEGIN
DECLARE toto INT;
SELECT forfait_km into toto FROM periode WHERE annee = YEAR(NEW.date_frais);
SET NEW.total_km = toto * NEW.nb_km;
SET NEW.total_ligne = NEW.total_km + NEW.cout_peage + NEW.cout_repas + NEW.cout_hebergement; 
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER before_update_tarif_total_km BEFORE UPDATE ON ligne_de_frais FOR EACH ROW BEGIN
DECLARE toto INT;
SELECT forfait_km into toto FROM periode WHERE annee = YEAR(NEW.date_frais);
SET NEW.total_km = toto * NEW.nb_km;
SET NEW.total_ligne = NEW.total_km + NEW.cout_peage + NEW.cout_repas + NEW.cout_hebergement; 
END
$$
DELIMITER ;
-- --------------------------------------------------------
--
-- Structure de la table ligue
--
CREATE TABLE ligue (
  id_ligue int(11) NOT NULL,
  libelle varchar(50) NOT NULL,
  adresse1 varchar(50) NOT NULL,
  adresse2 varchar(50) NOT NULL,
  adresse3 varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table ligue
--
INSERT INTO ligue (id_ligue, libelle, adresse1, adresse2, adresse3) VALUES
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
-- Structure de la table motif_de_frais
--
CREATE TABLE motif_de_frais (
  id_motif int(11) NOT NULL,
  libelle varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table motif_de_frais
--
INSERT INTO motif_de_frais (id_motif, libelle) VALUES
(1, 'Réunion'),
(2, 'Compétition régionale'),
(3, 'Compétition nationale'),
(4, 'Compétition internationnale'),
(5, 'Stage');
-- --------------------------------------------------------
--
-- Structure de la table note
--
CREATE TABLE note (
  id_note int(11) NOT NULL,
  date_remise date NOT NULL,
  total float NOT NULL,
  code_statut int(11) NOT NULL,
  id_utilisateur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table note
--
INSERT INTO note (id_note, date_remise, total, code_statut, id_utilisateur) VALUES
(1, '2019-12-17', 0, 0, 1),
(2, '2019-12-17', 0, 0, 35);
-- --------------------------------------------------------
--
-- Structure de la table periode
--
CREATE TABLE periode (
  annee int(11) NOT NULL,
  forfait_km decimal(10,0) NOT NULL,
  code_statut int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table periode
--
INSERT INTO periode (annee, forfait_km, code_statut) VALUES
(2019, '21', 0),
(2020, '20', 1),
(2021, '60', 0),
(2052, '0', 0),
(3030, '2', 0);
-- --------------------------------------------------------
--
-- Structure de la table type_util
--
CREATE TABLE type_util (
  id_type_utilisateur int(11) NOT NULL,
  libelle varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table type_util
--
INSERT INTO type_util (id_type_utilisateur, libelle) VALUES
(1, 'Administrateur'),
(2, 'Controleur'),
(3, 'Adherent');
-- --------------------------------------------------------
--
-- Structure de la table utilisateur
--
CREATE TABLE utilisateur (
  id_utilisateur int(11) NOT NULL,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  code_statut int(11) NOT NULL,
  id_type_utilisateur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table utilisateur
--
INSERT INTO utilisateur (id_utilisateur, nom, prenom, email, password, code_statut, id_type_utilisateur) VALUES
(1, 'BANDILELLA', 'CLEMENT', 'BANDILELLA@BANDILELLA.fr', '$2y$10$MhqPrY1I.kGoIB3cVzBQl.Ccob6m8QgYRTeVCpVADm/iDUuFE1Xxm', 1, 3),
(2, 'BERBIER', 'LUCILLE', 'BERBIER@BERBIER.fr', '$2y$10$XIXS44ESJAFwhjUtN0/J9eeapdTLHWbBi.xP4tpw/D38Waakw9Qwu', 1, 3),
(3, 'BERBIER', 'THEO', 'BERBIER@BERBIER.fr', '$2y$10$Ab23t3qHgIQLbLtf9ASWkO.fn9uDgo8FVyW8zgLnnij1xa36d/Td6', 1, 3),
(4, 'BECKER', 'ROMAIN', 'BECKER@BECKER.fr', '$2y$10$jlXf9eSyv8VAOL2lpN494uLmYW2qSm56d5rL.R/gM4zRQVsqOXbIq', 1, 3),
(5, 'BIACQUEL', 'VERONIQUE', 'BIACQUEL@BIACQUEL.fr', '$2y$10$Phk2GWJ6HNjTMsn.r2v.z.GZi6J5AajMiNuMBICfQ0ujm0ihM1IAq', 1, 3),
(6, 'BIDELOT', 'BRIGITTE', 'BIDELOT@BIDELOT.fr', '$2y$10$Kp1256r0S3l5EWkrk1Iq5e4DfAcObER9ZD8VEldj3sBGEoTCDi2l2', 1, 3),
(7, 'BIDELOT', 'JULIE', 'BIDELOT@BIDELOT.fr', '$2y$10$aRY9z9P8WWXKAaPGPxUwb.0mlSBo0Hay3mPWWpreem1I7uDfBM0vm', 1, 3),
(8, 'BILLOT', 'DIDIER', 'BILLOT@BILLOT.fr', '$2y$10$1DXcnVY9f53Nh91eARenEu7SoDp6T5zodzgoofq4cZg3a4PHQQymW', 1, 3),
(9, 'BILLOT', 'CLAIRE', 'BILLOT@BILLOT.fr', '$2y$10$gZzGd2sAqTpu54PdQfrEIub7IrTefqmfpgoU32CVVgqHbjyYMWDna', 1, 3),
(10, 'BILLOT', 'MARIANNE', 'BILLOT@BILLOT.fr', '$2y$10$tQbRkYhbr8ScZx.lqkRP3OB3.9H6HQbHZHUgAxjrK.XHa2fRqvmTe', 1, 3),
(11, 'BINNET', 'MARIUS', 'BINNET@BINNET.fr', '$2y$10$0.PhF.BHOOQg.6yZtVDMR.Uv05n9fg/Se/HxNq47J.AisRkU1Gx9C', 1, 3),
(12, 'CALDI', 'THOMAS', 'CALDI@CALDI.fr', '$2y$10$JK7rh8f/hkTIfaI12zqbdOKRlyhIc0kBWN3405Dq9IO3SN4uWC7Fu', 1, 3),
(13, 'CASTEL', 'TIMOTHE', 'CASTEL@CASTEL.fr', '$2y$10$uhw3mmKWvH9J50AKXzuq0eAMbz/s/reCIZ7TwmgOKHpO.gEWS6ptW', 1, 3),
(14, 'CHEOLLE', 'NICOLAS', 'CHEOLLE@CHEOLLE.fr', '$2y$10$QPCgSRA7nSVebTIsT4tbMOeMcNzonUvxPgufdyHSUyW900fGxtgyu', 1, 3),
(15, 'CHERPION', 'UGO', 'CHERPION@CHERPION.fr', '$2y$10$YPBShiLO8wJ.u8A1.Qy4iOvUNkqHHM7NFo6WvwQC3y2yCV37RDS3i', 1, 3),
(16, 'CHEVOITINE', 'LOUIS', 'CHEVOITINE@CHEVOITINE.fr', '$2y$10$DaPa/wJ1jQgzwSgef.K8q.ERFRvMiH2kvDGn5rKenLu.IMLZCifhe', 1, 3),
(17, 'CHOUARNO', 'TOM', 'CHOUARNO@CHOUARNO.fr', '$2y$10$7HjDHMQhaT7fcmPCRea1xuDFoV74o5OFCVNJ2PgeRUHri4mReRQou', 1, 3),
(18, 'COTIN', 'FLORIAN', 'COTIN@COTIN.fr', '$2y$10$2ht3iEOqWSw4CqLo1Yx0.O324bu7o/a0W5zbeO1ufhUMRmcCVN/aS', 1, 3),
(19, 'DEPERRIN', 'ARNAUD', 'DEPERRIN@DEPERRIN.fr', '$2y$10$lb8Zp8z2ZoF3xJ4VRToEy.THU4LZhN/YiEnWgs1ZoRouuCOACWF/a', 1, 3),
(20, 'DEPRETRE', 'BEATRICE', 'DEPRETRE@DEPRETRE.fr', '$2y$10$b.aCImehjcfsZrYNDvRH/eekoKBv.Xld6Vp5QHK8C1fua95sR7xha', 1, 3),
(21, 'DUCRICK', 'AUGUSTIN', 'DUCRICK@DUCRICK.fr', '$2y$10$DePvNOwGDCvXqRY1VmOnfON2lMCj3j6XvtNvQ6FDp.iXr/aXcMjRi', 1, 3),
(22, 'GARBILLON', 'GILLES', 'GARBILLON@GARBILLON.fr', '$2y$10$syRLqDeaaiwMmRla8fY75eXOvBD1uph2d7HP1sGQpHVsSXiipOMZy', 1, 3),
(23, 'GARBILLON', 'YANN', 'GARBILLON@GARBILLON.fr', '$2y$10$PpYVLFUijHhL0IYR357tNeAs1Iwklpl7yHF4KZckZVyHMP8AetjNq', 1, 3),
(24, 'HAGENBACH', 'CLEMENTINE', 'HAGENBACH@HAGENBACH.fr', '$2y$10$nBi2X0VyYSd3fNnbm0aUk.PJDAfIqUNPLUhV9/dOlY.V2ObGSYgtu', 1, 3),
(25, 'HASFELD', 'AUXANE', 'HASFELD@HASFELD.fr', '$2y$10$5JS9U58N/YWM7doyrjVtLeqyVZWJ/7mZSgouRJ8WKYsqFmnsY2o8y', 1, 3),
(26, 'HUMERT', 'ISABELLE', 'HUMERT@HUMERT.fr', '$2y$10$gMvG1EAzeN9MiXqtmXzpqexx1X52vXyCddhoviOH8jH9DaMxd2AjK', 1, 3),
(27, 'LAFIEGLON', 'CLEMENT', 'LAFIEGLON@LAFIEGLON.fr', '$2y$10$MRQy01837N8IQfeLOhKgZ.GRX0KZyrz47PTJQZ/UA5POR0VZfmHNC', 1, 3),
(28, 'LAMOINE', 'GREGOIRE', 'LAMOINE@LAMOINE.fr', '$2y$10$khMnpodWvs/S/YuD4yVUN.Y/f8s9W2xAJkHgVt74TjjOM8X6drkjK', 1, 3),
(29, 'LANIELLE', 'NICOLAS', 'LANIELLE@LANIELLE.fr', '$2y$10$3sJWVho4vCf2fknIT6eO6.CyBgcjvlDOE/eIosw1ILHtaEIxvkb9K', 1, 3),
(30, 'LIEVIN', 'NATHAN', 'LIEVIN@LIEVIN.fr', '$2y$10$n7YFh3GVzmcIy4iNBVaYtOO66Y/iJ/snfL6GyFDWhn68vVaW5nn1G', 1, 3),
(31, 'LOTANG', 'CYPRIEN', 'LOTANG@LOTANG.fr', '$2y$10$wlIzVZRaK2dz8evEkrC/g.yMQz8g09TGzXhg2JxCfctIZ2HGpeEJG', 1, 3),
(32, 'LUQUE', 'ETIENNE', 'LUQUE@LUQUE.fr', '$2y$10$..BI3Y6HS2OPi9HjD80gk.knGWdH146Z4DG5lvzZa0sOW.GBSTP1K', 1, 3),
(33, 'PERNOT', 'PAUL', 'PERNOT@PERNOT.fr', '$2y$10$sHYaeAknklwbEMTfhX2MNOLoMoWQPXvENlyEgygx1F1Vr.dl80KCS', 1, 3),
(34, 'REMILLON', 'ELIOT', 'REMILLON@REMILLON.fr', '$2y$10$BpVXJTBisU083Jl2QIfHr.0ee6s.V04ZetjK6dGM.RHdbANLXitBC', 1, 3),
(35, 'SILBERT', 'GILLES', 'SILBERT@SILBERT.fr', '$2y$10$wQridJ9LdN6HKxuZVKsZyO6lozN2dQ/tOvN98QgETPkYBUAKSQF/q', 1, 3),
(36, 'SILBERT', 'LEA', 'SILBERT@SILBERT.fr', '$2y$10$wWmhW6l5tEn2VUb.KBkHCe4qSwsJ2.1J34d4/WWOcEVnxoE7koo5G', 1, 3),
(37, 'TORTEMANN', 'PIERRE', 'TORTEMANN@TORTEMANN.fr', '$2y$10$kojmGlanqDBZGxsF5/qm8e7ZkjB85eJCQSN.2ns7eZiZ18pMKVGOC', 1, 3),
(38, 'ZOECKEL', 'MATHIEU', 'ZOECKEL@ZOECKEL.fr', '$2y$10$MzQ.RFk9JSxVX10CfI995eaMI50.4h.RpzvW1dBiOdC63U3M4WT5K', 1, 3),
(39, 'ZUEL', 'STEPHANIE', 'ZUEL@ZUEL.fr', '$2y$10$3.fwHyNLAdC4l5J4NhuMAuD33QUsL4hv81jnDgfD7uB7PYhIJBBYm', 1, 3),
(40, 'ZUERO', 'THOMAS', 'ZUERO@ZUERO.fr', '$2y$10$Ct/CLAKYEGyLZm5SIJnkIeqeXx4rtH8o/UvDklcnv7kbowrr5fjwK', 1, 3),
(100, 'Controlleur', 'Compte', 'compte@controlleur.fr', '$2y$10$4bV1UXHFo.Cisy5aNfHIC.xutl7mo2ty.jd1J5LAMNxobpPX7JvPG', 1, 2),
(101, 'Administrateur', 'Compte', 'compte@administrateur.fr', '$2y$10$zU7N3JVr9vknvaQIEz2NuOizVH6Fu5XomQ8unmbDlSyGG6zcDHcPm', 1, 1),
(102, 'Adherent', 'Compte', 'compte@adherent.fr', '$2y$10$6N6g7qPk0l1sCJtIfx85zeD3GhX831ZA1W5Nouph5KOLBtzm9LyqG', 1, 3);
--
-- Index pour les tables déchargées
--
--
-- Index pour la table adherent
--
ALTER TABLE adherent
  ADD PRIMARY KEY (id_utilisateur),
  ADD KEY adherent_club0_FK (id_club);
--
-- Index pour la table administrateur
--
ALTER TABLE administrateur
  ADD PRIMARY KEY (id_utilisateur);
--
-- Index pour la table club
--
ALTER TABLE club
  ADD PRIMARY KEY (id_club),
  ADD KEY club_ligue_FK (id_ligue),
  ADD KEY club_controleur0_FK (id_utilisateur);
--
-- Index pour la table controleur
--
ALTER TABLE controleur
  ADD PRIMARY KEY (id_utilisateur);
--
-- Index pour la table ligne_de_frais
--
ALTER TABLE ligne_de_frais
  ADD PRIMARY KEY (id_ligne);
--
-- Index pour la table ligue
--
ALTER TABLE ligue
  ADD PRIMARY KEY (id_ligue);
--
-- Index pour la table motif_de_frais
--
ALTER TABLE motif_de_frais
  ADD PRIMARY KEY (id_motif);
--
-- Index pour la table note
--
ALTER TABLE note
  ADD PRIMARY KEY (id_note),
  ADD KEY note_adherent_FK (id_utilisateur);
--
-- Index pour la table periode
--
ALTER TABLE periode
  ADD PRIMARY KEY (annee);
--
-- Index pour la table type_util
--
ALTER TABLE type_util
  ADD PRIMARY KEY (id_type_utilisateur);
--
-- Index pour la table utilisateur
--
ALTER TABLE utilisateur
  ADD PRIMARY KEY (id_utilisateur),
  ADD KEY utilisateur_type_util_FK (id_type_utilisateur);
--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table club
--
ALTER TABLE club
  MODIFY id_club int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table ligne_de_frais
--
ALTER TABLE ligne_de_frais
  MODIFY id_ligne int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table ligue
--
ALTER TABLE ligue
  MODIFY id_ligue int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table motif_de_frais
--
ALTER TABLE motif_de_frais
  MODIFY id_motif int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table note
--
ALTER TABLE note
  MODIFY id_note int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table type_util
--
ALTER TABLE type_util
  MODIFY id_type_utilisateur int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table utilisateur
--
ALTER TABLE utilisateur
  MODIFY id_utilisateur int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table administrateur
--
ALTER TABLE administrateur
  ADD CONSTRAINT administrateur_utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur);
--
-- Contraintes pour la table controleur
--
ALTER TABLE controleur
  ADD CONSTRAINT controleur_utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur);
--
-- Contraintes pour la table note
--
ALTER TABLE note
  ADD CONSTRAINT note_adherent_FK FOREIGN KEY (id_utilisateur) REFERENCES adherent (id_utilisateur);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;