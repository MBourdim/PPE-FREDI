#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE fredi CHARACTER SET utf8 COLLATE utf8_general_ci;

USE fredi;

#------------------------------------------------------------
# Table: Type
#------------------------------------------------------------

CREATE TABLE Type(
        idType      Int  Auto_increment  NOT NULL ,
        libelleType Varchar (50) NOT NULL
	,CONSTRAINT Type_PK PRIMARY KEY (idType)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Club
#------------------------------------------------------------

CREATE TABLE Club(
        idClub           Int  Auto_increment  NOT NULL ,
        libelleClub      Varchar (50) NOT NULL ,
        adresseclub      Varchar (50) NOT NULL ,
        denominationClub Varchar (50) NOT NULL
	,CONSTRAINT Club_PK PRIMARY KEY (idClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        idUser                 Int  Auto_increment  NOT NULL ,
        nomUser                Varchar (50) NOT NULL ,
        prenomUser             Varchar (50) NOT NULL ,
        mailUser               Varchar (50) NOT NULL ,
        mdpUser                Varchar (50) NOT NULL ,
        statutUser             Bool NOT NULL ,
        typeUser               Int NOT NULL ,
        isVerif                Int NOT NULL ,
        numLicence             Int NOT NULL ,
        sexeUser               Varchar (1) NOT NULL ,
        dateNaissUser          Date NOT NULL ,
        adresseUser            Varchar (255) NOT NULL ,
        codePostalUser         Int NOT NULL ,
        villeUser              Varchar (50) NOT NULL ,
        matriculeProControleur Varchar (50) ,
        isResponsableFiscal    Bool ,
        prenomResponsable      Varchar (50) ,
        nomResponsable         Varchar (50) ,
        idClub                 Int NOT NULL ,
        idType                 Int NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (idUser)

	,CONSTRAINT Utilisateur_Club_FK FOREIGN KEY (idClub) REFERENCES Club(idClub)
	,CONSTRAINT Utilisateur_Type0_FK FOREIGN KEY (idType) REFERENCES Type(idType)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Periode
#------------------------------------------------------------

CREATE TABLE Periode(
        idPeriode     Int  Auto_increment  NOT NULL ,
        statutPeriode Bool NOT NULL ,
        anneePeriode  Int NOT NULL
	,CONSTRAINT Periode_PK PRIMARY KEY (idPeriode)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Motif
#------------------------------------------------------------

CREATE TABLE Motif(
        idMotif      Int  Auto_increment  NOT NULL ,
        libelleMotif Varchar (50) NOT NULL
	,CONSTRAINT Motif_PK PRIMARY KEY (idMotif)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Frais
#------------------------------------------------------------

CREATE TABLE Frais(
        idFrais              Int  Auto_increment  NOT NULL ,
        dateFrais            Date NOT NULL ,
        trajetFrais          Varchar (50) NOT NULL ,
        kmParcouruFrais      Decimal NOT NULL ,
        totalFraisKmFrais    Decimal NOT NULL ,
        coutPeageFrais       Decimal ,
        coutRepasFrais       Decimal ,
        coutHebergementFrais Decimal ,
        totalFrais           Decimal NOT NULL ,
        statutFrais          Int NOT NULL ,
        idUser               Int NOT NULL ,
        idPeriode            Int NOT NULL ,
        idMotif              Int NOT NULL
	,CONSTRAINT Frais_PK PRIMARY KEY (idFrais)

	,CONSTRAINT Frais_Utilisateur_FK FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
	,CONSTRAINT Frais_Periode0_FK FOREIGN KEY (idPeriode) REFERENCES Periode(idPeriode)
	,CONSTRAINT Frais_Motif1_FK FOREIGN KEY (idMotif) REFERENCES Motif(idMotif)
)ENGINE=InnoDB;

