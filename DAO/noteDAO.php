<?php
require_once('DAO.php');
require_once('note.php');

Class NoteDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    public function find($id_note) {
        $sql = "SELECT * FROM note WHERE id_note= :id_note";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_note' => $id_note
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $note=null;
        if ($row) {
            $note = new Note($row);
        }
        
        // Retourne l'objet métier
        return $note;
    }

    //Nouvelle note
    public function createNote($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$id_motif, $id_utilisateur) {
        $sql = "INSERT INTO note (date_frais,lib_trajet,cout_peage,cout_repas,cout_hebergement,nb_km,code_statut,id_motif,annee,id_note) VALUES (:date_frais,:lib_trajet,:cout_peage,:cout_repas,:cout_hebergement,:nb_km,:code_statut,:id_motif,YEAR(:date_frais),:id_note)";

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

    //Mets à jour une note
    public function updateNote($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_note,$code_statut,$id_motif,$id_note) {
        $sql = "UPDATE note SET date_frais = :date_frais,
        lib_trajet = :lib_trajet,
        cout_peage = :cout_peage,
        cout_repas = :cout_repas,
        cout_hebergement  = :cout_hebergement,
        nb_km = :nb_km,
        total_km = :total_km,
        total_note = :total_note,
        code_statut = :code_statut,
        id_motif = :id_motif
        WHERE id_note = :id_note";

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
                ":total_note" => $total_note,
                ":code_statut" => $code_statut,
                ":id_motif" => $id_motif,
                ':id_note' => $id_note
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return 'La note a été modifié. Retourner à la <a href="display_notes.php">liste</a>';

        //header('Location: display_notes.php');
    }

    //Retourne toutes les notes
    public function findAll() {
        $sql = "SELECT * FROM note"; //A modifier

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $notes = array();

        foreach ($rows as $row) {
            $notes[] = new Note($row);
        }

        // Retourne un tableau d'objets
        return $notes;
    }

    //Retourne toutes les notes par autheur
    public function findByAuthor($id) {
        $sql = "SELECT *
                FROM note AS L, note AS N
                WHERE L.id_note = N.id_note
                AND N.id_utilisateur = :id";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(':id' => $id));
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $notes = array();

        foreach ($rows as $row) {
            $notes[] = new Note($row);
        }

        // Retourne un tableau d'objets
        return $notes;
    }

    //Desactive une note
    public function desactivernote($id_note) {
        $sql = "UPDATE note SET code_statut = 0 WHERE id_note = :id_note";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_note' => $id_note
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La note a été désactivé";
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

    //Suprimer une note 
    public function supprimerNote($id) {
        $sql = "DELETE FROM note WHERE id_note = :id_note";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_note" => $id
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La note a été supprimée";
    }
}