<?php
require_once('DAO.php');

class usersDAO extends DAO {
    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    //Nouveau utilisateur
    public function newUser($name, $email, $password) {
        
    }
}