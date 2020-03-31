<?php
require_once('DAO.php');
require_once('ligue.php');

Class LigueDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }
    //Retourne une ligue en particulier
    public function find($id_ligue) {
        $sql = "SELECT * FROM ligue WHERE id_ligue= :id_ligue";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_ligue' => $id_ligue
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $ligue=null;
        if ($row) {
            $ligue = new Ligue($row);
        }
        
        // Retourne l'objet métier
        return $ligue;
    }

    //Retourne toutes les ligues
    public function findAll() {
        $sql = "SELECT * FROM ligue"; 

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $ligue = array();

        foreach ($rows as $row) {
            $ligue[] = new Ligue($row);
        }

        // Retourne un tableau d'objets
        return $ligue;
    }


}