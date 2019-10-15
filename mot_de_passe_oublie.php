<?php
session_start();
require_once('init.php');
//Ajout DAO Utilisateurs
require 'DAO/usersDAO.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

//Recupère champs du formulaire
$email = isset($_POST['email']) ? $_POST['email'] : '';
$submit = isset($_POST['renvoieForm']);

$error = '';

if($submit) {
    if($email != '') {
        $user = new UsersDAO();
        $error = $user->renvoieMotDePasse($email);
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
    <title>FREDI Mot de passe oublié</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color: #56c6c6;">Mot de passe oublié</h1>
            </div>
            <?php
            if ($error != '') {
                echo '<p class="color: red">' . $error . '</p>';
            }
            ?>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" name="renvoieForm" type="submit" style="background-color: #56c6c6;">Renvoyer</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>