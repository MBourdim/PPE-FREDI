<?php
require_once('DAO.php');
require_once('periode.php');

Class PeriodeDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    //Nouvelle periode
    public function createPeriode($annee, $tarif, $statut) {
        $sql = "INSERT INTO periode (annee, forfait_km, code_statut) ";
        $sql .= "VALUES (:annee, :forfait_km, :code_statut)";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee,
                ':forfait_km' => $tarif,
                ':code_statut' => $statut
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        header('Location: liste_periode.php');
    }

    //Mets à jour une période
    public function updatePeriode($annee, $tarif, $statut) {
        $sql = "UPDATE periode SET forfait_km = :forfait_km, code_statut = :code_statut WHERE annee = :annee";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee,
                ':forfait_km' => $tarif,
                ':code_statut' => $statut
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return 'La période à été modifié. Retourner à la <a href="liste_periode.php">liste</a>'; 
    }

    //Retourne toutes les periodes
    public function findAll() {
        $sql = "SELECT * FROM periode";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $periodes = array();

        foreach ($rows as $row) {
            $periodes[] = new Periode($row);
        }

        // Retourne un tableau d'objets
        return $periodes;
    }

    //Retourne une période
    public function find($annee) {
        $sql = "SELECT * FROM periode WHERE annee = :annee";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        // Retourne un tableau
        return new Periode($row);
    }

    //Desactive une période
    public function desactiverPeriode($annee) {
        $sql = "UPDATE periode SET code_statut = 0 WHERE annee = :annee";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La période a été désactivé";
    }
}