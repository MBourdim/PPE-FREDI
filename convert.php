<?php
require_once('DAO/DAO.php');
require_once('init.php');

class Convert extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function convertDb() {
        $sql = "SELECT * FROM adherent";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        foreach($rows as $row) {
            $id = $row["id_utilisateur"];
            $nom = $row["nom_responsable"];
            $password = $nom;
            $prenom = $row["prenom_responsable"];
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            $email= $nom."@".$nom.".fr";
            $params = array(
            ":id_utilisateur" => $id,
            ":email" => $email,
            ":password" => $passwordHash,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":id_type_utilisateur" => 1,
            ":code_statut" => 1
            );

            $req = "INSERT INTO utilisateur (id_utilisateur,email, password, nom, prenom, id_type_utilisateur, code_statut)
            VALUES (:id_utilisateur,:email, :password, :nom, :prenom, :id_type_utilisateur, :code_statut)";

            try {
                $sth = $this->pdo->prepare($sql);
                $sth->execute($params);
            } catch (PDOException $ex) {
                throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
            }
        }
    }
}

$convert = new Convert();
$convert->convertDb();