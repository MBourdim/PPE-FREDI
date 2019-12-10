<?php
require_once('DAO.php');
require_once('ligne.php');

Class LigneDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    public function find($id_ligne)
    {
        $sql = "SELECT * FROM ligne_de_frais WHERE id_ligne= :id_ligne";
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_ligne' => $id_ligne
            ));
            $rows = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $lignes = array();

        foreach ($rows as $row) {
            $lignes[] = new Ligne($row);
        }
        // Retourne l'objet métier
        return $ligne_de_frais;
    }

    //Nouvelle ligne_de_frais
    public function createLigne($date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_ligne,$code_statut,$id_motif,$annee,$id_note) {
        $sql = "INSERT INTO ligne_de_frais (date_frais,lib_trajet,cout_peage,cout_repas,cout_hebergement,nb_km,total_km,total_ligne,code_statut,id_motif,annee,id_note) VALUES (:date_frais,:lib_trajet,:cout_peage,:cout_repas,:cout_hebergement,:nb_km,:total_km,:total_ligne,:code_statut,:id_motif,:annee,:id_note)";

        var_dump($sql);

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_ligne" => $id_ligne,
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
                ":annee" => $annee,
                ":id_note" => $id_note
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        $this->updateNote($id_note,$date_remise,$total,$code_statut,$id_utilisateur);

        header('Location: liste_ligne.php');
    }

    //Mets à jour une ligne_de_frais
    public function updateLigne($id_ligne,$date_frais,$lib_trajet,$cout_peage,$cout_repas,$cout_hebergement,$nb_km,$total_km,$total_ligne,$code_statut,$id_motif,$annee,$id_note) {
        $sql = "UPDATE ligne_de_frais SET date_frais = :date_frais,
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
        ":id_ligne" => $id_ligne,
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
        ":annee" => $annee,
        ":id_note" => $id_note
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La ligne de frais à été modifié";
    }

    //Retourne toutes les lignes
    public function findAll() {
        $sql = "SELECT * FROM ligne_de_frais";

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
    public function updateNote($id_note,$date_remise,$total,$code_statut,$id_utilisateur) {
        $sql = "UPDATE note SET 
        date_remise = :date_remise,
        total = :total,
        code_statut = :code_statut
        WHERE id_note = :id_note AND id_utilisateur = :id_utilisateur";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ":id_note" => $id_note,
                ":date_remise" => $date_remise,
                ":total" => $total,
                ":code_statut" => $code_statut,
                ":id_utilisateur" => $id_utilisateur
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "La note à été mise à jour";
    }
    /*//SUPPRESSION
if(isset($_POST['supprNote']) ? $_POST[]) {
    $id_ligne = $data['id_ligne'];
    $res = $bdd->prepare('DELETE FROM ligne_de_frais WHERE id_ligne = :id_ligne');
    //Associe une valeur à un nom correspondant ou à un point d'interrogation (comme paramètre fictif) dans la requête SQL qui a été utilisé pour préparer la requête.
    $res->bindValue(':id_ligne', $id_ligne, PDO::PARAM_INT);
    $res->execute();

    header('Location: liste_ligne.php');
}
    //SUPPRESSION

    public function supp*/
}