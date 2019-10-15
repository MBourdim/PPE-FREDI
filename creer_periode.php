<?php 
require_once('DAO/user.php');
require_once('init.php');
require_once('DAO/periodeDAO.php');
session_start();

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    //Verifie si il s'agit d'un controlleur
    if($user->getTypeUser() == 3 || $user->getTypeUser() == 1) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

//Recupère champs du formulaire
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$tarif = isset($_POST['tarif']) ? $_POST['tarif'] : '';
$statut = isset($_POST['statut']) ? $_POST['statut'] : '';
$submit = isset($_POST['periodeForm']);

$error = '';

if($submit) {
    if($annee != '' && $tarif != '' && $statut != '') {
        $periode = new PeriodeDAO();
        $error = $periode->createPeriode($annee, $tarif, $statut);
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
    <title>FREDI Creer Periode</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php require_once('include/nav.php'); ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center; margin-bottom: 15%;">Créer une période</h1>
                </div>
                <?php
                //Message d'erreur
                if ($error != '') {
                    echo '<p class="color: red">' . $error . '</p>';
                }
                ?>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Année:&nbsp;</span><input type="number" name="annee" style="margin-bottom: 25px;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;">
                    </div>
                    <div class="col-md-6"><span>Tarif kilometrique:&nbsp;</span><input type="text" name="tarif" style="padding: 10px 10px 10px 10px;"></div>
                    <div class="col-md-6"><span>Statut:&nbsp;</span>
                        <!-- <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="#">First Item</a>
                                <a class="dropdown-item" role="presentation" href="#">Second Item</a>
                            </div>
                        </div> -->
                        <select class="form-control" name="statut">
                            <option value="1">Ouverte</option>
                            <option value="0">Fermée</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center"><button class="btn btn-primary" type="submit" name="periodeForm" style="margin-top: 15%; width: 100%">Creer la periode</button></div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>