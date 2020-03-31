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
    public function createLigne($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$id_motif, $id_utilisateur) {
        $sql = "INSERT INTO ligne_de_frais (date_frais,lib_trajet,cout_peage,cout_repas,cout_hebergement,nb_km,code_statut,id_motif,annee,id_note) VALUES (:date_frais,:lib_trajet,:cout_peage,:cout_repas,:cout_hebergement,:nb_km,:code_statut,:id_motif,YEAR(:date_frais),:id_note)";

        $this->insertNote($date_frais, $id_utilisateur);
        $idNote = $this->selectNote($date_frais, $id_utilisateur);

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
                ":id_motif" => $id_motif,
                ":id_note" => $idNote
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        header('Location: display_notes.php');
    }

    //Retourne l'id d'une note
    public function selectNote($date, $id) {
        $sql = "SELECT id_note FROM note WHERE date_remise = :date_remise AND id_utilisateur = :id_utilisateur";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':date_remise' => $date,
                ':id_utilisateur' => $id
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return $row['id_note'];
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
        $sql = "SELECT *
                FROM ligne_de_frais AS L, note AS N
                WHERE L.id_note = N.id_note
                AND N.id_utilisateur = :id";

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
    public function insertNote($date_remise ,$id_utilisateur) {
        $sql = "INSERT INTO note (date_remise, code_statut, id_utilisateur) VALUES (:date_remise, :code_statut, :id_utilisateur)";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":date_remise" => $date_remise,
                ":code_statut" => 1,
                ":id_utilisateur" => $id_utilisateur
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }
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