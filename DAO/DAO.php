<?php
class DAO {
    protected $pdo = NULL; //Objet de connexion

    public function __construct() {
        //Paramètres à partir du init.php
        $user = DB_USER;
        $password = DB_PASSWORD;
        $host = DB_HOST;
        $name = DB_NAME;

        //On construit le DSN
        $dsn = 'mysql:host='.$host.';dbname='.$name;

        //Création de la connexion
        try {
            $pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("<p>Erreur lors de la connexion : " . $e->getMessage().'<p>');
        }

        $this->pdo = $pdo;
    }
}