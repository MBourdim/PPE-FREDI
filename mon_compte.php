<?php
require_once('DAO/user.php');
require_once('init.php');
require_once('DAO/usersDAO.php');
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: index.php');
}

//Recupère champs du formulaire
$numeroLicence = isset($_POST['numeroLicence']) ? $_POST['numeroLicence'] : '';
$codeSexe = isset($_POST['codeSexe']) ? $_POST['codeSexe'] : '';
$dateNaissance = isset($_POST['dateNaissance']) ? $_POST['dateNaissance'] : '';
$adresse1 = isset($_POST['adresse1']) ? $_POST['adresse1'] : '';
$adresse2 = isset($_POST['adresse2']) ? $_POST['adresse2'] : '';
$adresse3 = isset($_POST['adresse3']) ? $_POST['adresse3'] : '';
$nomResponsable = isset($_POST['nomResponsable']) ? $_POST['nomResponsable'] : '';
$prenomResponsable = isset($_POST['prenomResponsable']) ? $_POST['prenomResponsable'] : '';
$submit = isset($_POST['modifProfil']);

$objectSession = $_SESSION['user'];
$idUtilisateur = $objectSession->getId();

$error = '';

if($submit) {
    $user = new UsersDAO();
    $error = $user->updateProfilAdherent($numeroLicence, $codeSexe, $dateNaissance, $adresse1, $adresse2, $adresse3, $nomResponsable, $prenomResponsable, $idUtilisateur);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FREDI Mon compte</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php require_once('include/nav.php'); ?>
    <!-- <div class="row">
        <div class="col" style="text-align:center">
            <h1>Mon compte</h1>
        </div>
    </div> -->
    <form method="POST">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align:center">Mon compte</h1>
                </div>
                <?php
                //Message d'erreur
                if ($error != '') {
                    echo '<p class="color: red">' . $error . '</p>';
                }
                ?>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 0px;width: 555px;height: 120px;"><input type="text" placeholder="Numéro de licence" name="numero_licence" style="padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);width: 260px;height: 50px;margin: 60px;padding-top: 10px;margin-right: 60px;margin-top: 40px;"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="date" name="dateNaissance" style="width: 260px;height: 50px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);text-align: left;margin: 60px;margin-top: 40px;"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin: 0px;width: 555px;padding: 0px;height: 120px;"><input type="text" placeholder="Adresse 1" name="adresse1" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;margin-left: 60px;"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" placeholder="Adresse 2" name="adresse2" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" placeholder="Adresse 3" name="adresse3" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-left: 45px;margin-top: 40px;"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" placeholder="Nom responsable" name="nomResponsable" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" placeholder="Prenom responsable" name="prenomResponsable" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-left: 45px;margin-top: 40px;"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;">
                    <select name="codeSexe">
                        <option value="F">Femme</option>
                        <option value="M">Homme</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 90px;margin-right: 0px;"><button class="btn btn-primary" type="submit" name="modifProfil" style="width: 143px;margin: 25px;margin-right: 25px;margin-bottom: 25px;margin-top: 53px;margin-left: 410px;height: 48px;">Valider</button></div>
            </div>
        </div>
    </div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>