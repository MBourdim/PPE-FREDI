<?php
session_start();
require_once('init.php');
require_once('DAO/usersDAO.php');

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

//Recupère champs du formulaire
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$submit = isset($_POST['connexionForm']);

$error = '';

if($submit) {
    if($email != '' && $password != '') {
        $user = new UsersDAO();
        $error = $user->connectUser($email, $password);
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
    <title>FREDI Connexion</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color: #56c6c6;">Connexion</h1>
            </div>
            <?php
            if ($error != '') {
                echo '<p class="color: red">' . $error . '</p>';
            }
            ?>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mot de passe"></div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="connexionForm" style="background-color: #56c6c6;">Connexion</button>
            </div>
            <a class="forgot" href="mot_de_passe_oublie.php">Renvoyer mot de pase ?</a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>