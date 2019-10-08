<?php
class User {
    private $nom;
    private $prenom;
    private $email;

    //constructeur
    public function __construct($nom, $prenom, $email) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
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
}