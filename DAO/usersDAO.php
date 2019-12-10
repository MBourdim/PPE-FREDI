<?php
require_once('DAO.php');
require_once('user.php');
require_once('Utils.php');

class UsersDAO extends DAO {
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

        $idUtilisateur = $this->findUserPourInscription($email);
        $this->newAdherent($idUtilisateur);

        header('Location: connexion.php');
    }

    //Nouveau adherent
    public function newAdherent($idUtilisateur) {
        $sql = "INSERT INTO adherent (id_utilisateur, numero_licence, code_sexe, date_naissance, adresse1, adresse2, adresse3, nom_responsable, prenom_responsable, code_statut, id_club) ";
        $sql .= "VALUES (:id_utilisateur, :numero_licence, :code_sexe, :date_naissance, :adresse1, :adresse2, :adresse3, :nom_responsable, :prenom_responsable, :code_statut, :id_club)";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_utilisateur' => $idUtilisateur,
                ':numero_licence' => '',
                ':code_sexe' => '',
                ':date_naissance' => '',
                ':adresse1' => '',
                ':adresse2' => '',
                ':adresse3' => '',
                ':nom_responsable' => '',
                ':prenom_responsable' => '',
                ':code_statut' => 1,
                ':id_club' => 1
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }
    }

    //Mise à jour du profil adherent
    public function updateProfilAdherent($numeroLicence, $codeSexe, $dateNaissance, $adresse1, $adresse2, $adresse3, $nomResponsable, $prenomResponsable, $idUtilisateur) {
        $sql = "UPDATE periode SET forfait_km = :forfait_km, code_statut = :code_statut WHERE annee = :annee";

        $sql = "UPDATE adherent SET id_utilisateur = :id_utilisateur, numero_licence = :numero_licence, code_sexe = :code_sexe, date_naissance = :date_naissance, adresse1 = :adresse1, 
                adresse2 = :adresse2, adresse3 = :adresse3, nom_responsable = :nom_responsable, prenom_responsable = :prenom_responsable WHERE id_utilisateur = :id_utilisateur";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':id_utilisateur' => $idUtilisateur,
                ':numero_licence' => $numeroLicence,
                ':code_sexe' => $codeSexe,
                ':date_naissance' => $dateNaissance,
                ':adresse1' => $adresse1,
                ':adresse2' => $adresse2,
                ':adresse3' => $adresse3,
                ':nom_responsable' => $nomResponsable,
                ':prenom_responsable' => $prenomResponsable
            ));
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        return "Le profil à été mis à jour";
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
                $user = new User($row['id_utilisateur'], $row['nom'], $row['prenom'], $row['email'], $row['id_type_utilisateur']);
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

    //Recherche utilisateur
    public function findUserPourInscription($email) {
        $sql = "SELECT id_utilisateur FROM utilisateur WHERE email = :email";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(":email" => $email));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        // $salarie = new Salarie($row);
        // // Retourne l'objet métier
        // return $salarie;

        return $row['id_utilisateur'];
        }
}