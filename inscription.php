<?php
session_start();
require_once('init.php');
//Ajout DAO Utilisateurs
require 'DAO/usersDAO.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

//Recupère champs du formulaire d'inscription d'utilisateur particulier
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$submit = isset($_POST['inscriptionForm']);

$error = '';

if ($submit) {
    if ($nom != '' && $prenom != '' && $email != '' && $password != '') {
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        $user = new UsersDAO();
        $user->newUser($nom, $prenom, $email, $pass_hache);
    } else {
        $error = 'Veuillez compléter les champs correctement.';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FREDI Inscription</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color: #56c6c6;">Inscription</h1>

                <?php
                if ($error != '') {
                    echo '<p class="color: red">' . $error . '</p>';
                }
                ?>

                <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Nom"></div>
                <div class="form-group"><input class="form-control" type="text" name="prenom" placeholder="Prénom"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mot de passe"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" name="inscriptionForm" type="submit" style="background-color: #56c6c6;">Inscription</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>