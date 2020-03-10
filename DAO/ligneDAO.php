<?php
require_once('DAO.php');
require_once('ligne.php');

Class LigneDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    public function find($id_ligne) {
        $sql = "SELECT * FROM ligne_de_frais WHERE id_ligne= :id_ligne";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_ligne' => $id_ligne
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $ligne_de_frais=null;
        if ($row) {
            $ligne_de_frais = new Ligne($row);
        }
        
        // Retourne l'objet métier
        return $ligne_de_frais;
    }

    //Nouvelle ligne_de_frais
    public function createLigne($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$id_motif) {
        $sql = "INSERT INTO ligne_de_frais (date_frais,lib_trajet,cout_peage,cout_repas,cout_hebergement,nb_km,code_statut,id_motif,annee) VALUES (:date_frais,:lib_trajet,:cout_peage,:cout_repas,:cout_hebergement,:nb_km,:code_statut,:id_motif,YEAR(:date_frais))";

        var_dump($sql);

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":date_frais" => $date_frais,
                ":lib_trajet" => $lib_trajet,
                ":cout_peage" => $cout_peage,
                ":cout_repas" => $cout_repas,
                ":cout_hebergement"  => $cout_hebergement,
                ":nb_km" => $nb_km,
                ":code_statut" => 1,
                ":id_motif" => $id_motif
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        //$this->updateNote($id_note,$date_remise,$total,$id_utilisateur);

        header('Location: display_notes.php');
    }

    //Mets à jour une ligne_de_frais
    public function updateLigne($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_ligne,$code_statut,$id_motif,$id_ligne) {
        $sql = "UPDATE ligne_de_frais SET date_frais = :date_frais,
        lib_trajet = :lib_trajet,
        cout_peage = :cout_peage,
        cout_repas = :cout_repas,
        cout_hebergement  = :cout_hebergement,
        nb_km = :nb_km,
        total_km = :total_km,
        total_ligne = :total_ligne,
        code_statut = :code_statut,
        id_motif = :id_motif
        WHERE id_ligne = :id_ligne";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":date_frais" => $date_frais,
                ":lib_trajet" => $lib_trajet,
                ":cout_peage" => $cout_peage,
                ":cout_repas" => $cout_repas,
                ":cout_hebergement"  => $cout_hebergement,
                ":nb_km" => $nb_km,
                ":total_km" => $total_km,
                ":total_ligne" => $total_ligne,
                ":code_statut" => $code_statut,
                ":id_motif" => $id_motif,
                ':id_ligne' => $id_ligne
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return 'La ligne de frais a été modifié. Retourner à la <a href="display_notes.php">liste</a>';

        //header('Location: display_notes.php');
    }

    //Retourne toutes les lignes
    public function findAll() {
        $sql = "SELECT * FROM ligne_de_frais"; //A modifier

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

    //Retourne toutes les lignes par autheur
    public function findByAuthor($id) {
        $sql = "SELECT L.date_frais, M.libelle, L.total_ligne
                FROM ligne_de_frais AS L, motif_de_frais AS M, note AS N, utilisateur AS U
                WHERE L.id_note = N.id_note
                AND N.id_utilisateur = U.id_utilisateur
                AND L.id_motif = M.id_motif
                AND U.id_utilisateur = :id";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(':id' => $id));
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

    //Desactive une ligne_de_frais
    public function desactiverLigne($id_ligne) {
        $sql = "UPDATE ligne_de_frais SET code_statut = 0 WHERE id_ligne = :id_ligne";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_ligne' => $id_ligne
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La ligne de frais a été désactivé";
    }

    //Mets à jour la note active
    public function updateNote($id_note,$date_remise,$total,$id_utilisateur) {
        $sql = "UPDATE note SET 
        date_remise = :date_remise,
        total = :total,
        WHERE id_note = :id_note AND id_utilisateur = :id_utilisateur";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_note" => $id_note,
                ":date_remise" => $date_remise,
                ":total" => $total,
                ":id_utilisateur" => $id_utilisateur
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La note a été mise à jour";
    }

    //Suprimer une ligne de frais 
    public function supprimerLigne($id) {
        $sql = "DELETE FROM ligne_de_frais WHERE id_ligne = :id_ligne";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_ligne" => $id
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La ligne de frais a été supprimée";
    }
}