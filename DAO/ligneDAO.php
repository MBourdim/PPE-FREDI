<?php
require_once('DAO.php');
require_once('ligne.php');

Class LigneDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    //Nouvelle ligne
    public function createLigne($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_ligne,$code_statut,$id_motif,$annee,$id_note) {
        $sql = "INSERT INTO ligne (date_frais,lib_trajet,cout_peage,cout_repas,cout_hebergement,nb_km,total_km,total_ligne,code_statut,id_motif,annee,id_note) ";
        $sql .= "VALUES (:date_frais,:lib_trajet,:cout_peage,:cout_repas,:cout_hebergement,:nb_km,:total_km,:total_ligne,:code_statut,:id_motif,:annee,:id_note)";

        var_dump($sql);

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

        $this->updateNote($id_note,$date_remise,$total,$code_statut,$id_utilisateur);

        header('Location: liste_ligne.php');
    }

    //Mets à jour une ligne
    public function updateLigne($id_ligne,$date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_ligne,$code_statut,$id_motif,$annee,$id_note) {
        $sql = "UPDATE ligne SET date_frais = :date_frais,
        lib_trajet = :lib_trajet,
        cout_peage = :cout_peage,
        cout_repas = :cout_repas,
        cout_hebergement  = :cout_hebergement,
        nb_km = :nb_km,
        total_km = :total_km,
        total_ligne = :total_ligne,
        code_statut = :code_statut,
        id_motif = :id_motif,
        annee = :annee,
        id_note = :id_note
        WHERE id_ligne = :id_ligne";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
        ":id_ligne" = $id_ligne,
        ":date_frais" = $date_frais,
        ":lib_trajet" = $lib_trajet,
        ":cout_peage" = $cout_peage,
        ":cout_repas" = $cout_repas,
        ":cout_hebergement"  = $cout_hebergement,
        ":nb_km" = $nb_km,
        ":total_km" = $total_km,
        ":total_ligne" = $total_ligne,
        ":code_statut" = $code_statut,
        ":id_motif" = $id_motif,
        ":annee" = $annee,
        ":id_note" = $id_note
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La ligne à été modifié";
    }

    //Retourne toutes les lignes
    public function findAll() {
        $sql = "SELECT * FROM ligne";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $lignes = array();

        foreach ($rows as $row) {
            $lignes[] = new Ligne($row);
        }

        // Retourne un tableau d'objets
        return $lignes;
    }

    //Desactive une ligne
    public function desactiverLigne($id_ligne) {
        $sql = "UPDATE ligne SET code_statut = 0 WHERE annee = :annee";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La ligne a été désactivé";
    }

    //Mets à jour la note active
    public function updateNote($id_note,$date_remise,$total,$code_statut,$id_utilisateur) {
        $sql = "UPDATE note SET 
        date_remise = :date_remise,
        total = :total,
        code_statut = :code_statut
        WHERE id_note = :id_note AND id_utilisateur = :id_utilisateur";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_note" = $id_note,
                ":date_remise" = $date_remise,
                ":total" = $total,
                ":code_statut" = $code_statut,
                ":id_utilisateur" = $id_utilisateur
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La note à été mise à jour";
    }
}