<?php
class User {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $typeUser;

    //constructeur
    public function __construct($id, $nom, $prenom, $email, $typeUser) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->typeUser = $typeUser;
    }

    //Get id
    public function getId() {
        return $this->id;
    }

    //Set id
    public function setId($id) {
        $this->id = $id;
    }

    //Get nom
    public function getNom() {
        return $this->nom;
    }

    //Set nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    //Get prenom
    public function getPrenom() {
        return $this->prenom;
    }

    //Set prenom
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    //Get email
    public function getEmail() {
        return $this->email;
    }

    //Set email
    public function setEmail($email) {
        $this->email = $email;
    }

    //Get type user
    public function getTypeUser() {
        /* 1 = Administrateur
           2 = Controleur
           3 = Aherent
        */
        return $this->typeUser;
    }

    //Set type user
    public function setTypeUser($typeUser) {
        $this->typeUser = $typeUser;
    }
}