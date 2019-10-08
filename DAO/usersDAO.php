<?php
require_once('DAO.php');
require_once('user.php');
require_once('Utils.php');

class usersDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    //Nouveau utilisateur
    public function newUser($nom, $prenom, $email, $password) {
        $sql = "INSERT INTO utilisateur (nom, prenom, email, password, code_statut, id_type_utilisateur) ";
        $sql .= "VALUES (:nom, :prenom, :email, :password, :code_statut, :id_type_utilisateur)";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':password' => $password,
                ':code_statut' => 1,
                ':id_type_utilisateur' => 3
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        header('Location: connexion.php');
    }

    //Connexion de l'utilisateur
    public function connectUser($email, $password) {
        // $sql = "SELECT U.*, A.* FROM utilisateur AS U, adherent AS U WHERE U.id_utilisateur = A.id_utilisateur AND U.email = :email";
        //Rajouter le actif 
        $sql = "SELECT * FROM utilisateur WHERE email = :email";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':email' => $email
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        $isPasswordCorrect = password_verify($password, $row['password']);

        if(!$row) {
            return 'Ce compte existe pas';
        } else {
            if($isPasswordCorrect) {
                //Creation de la session et des variables de sessions
                session_start();

                //Creation d'un User
                $user = new User($row['nom'], $row['prenom'], $row['email']);
                $_SESSION['user'] = $user;

                //Redirection une fois connecté
                header('Location: index.php');
            } else {
                return 'Mauvais mot de passe';
            }
        }
    }

    //Renvoie d'un nouveau mot de passe
    public function renvoieMotDePasse($email) {
        $sql = "SELECT email FROM utilisateur WHERE email = :email";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':email' => $email
            ));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        if(!$row) {
            return 'Ce compte existe pas';
        } else {
            $newPassword = Utils::generatePassword();
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            $this->majNewPassword($newPasswordHash, $email);

            //Afficher le nouveau mot de passe
            return 'Votre nouveau mot de passe: '.$newPassword.'<br/><a href="connexion.php">Connexion</a>';
        }
    }

    //Mise à jour du mot de passe de renvoie
    public function majNewPassword($password, $email) {
        $sql = "UPDATE utilisateur SET password = :password WHERE email = :email";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':email' => $email,
                ':password' => $password,
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }
    }
}