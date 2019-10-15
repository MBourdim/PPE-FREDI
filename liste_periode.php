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

$periodes = new PeriodeDAO();
$rows = $periodes->findAll();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FREDI Periode Liste</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php require_once('include/nav.php'); ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="creer_periode.php">
                        <button class="btn btn-primary" type="button" style="margin-bottom: 25px; width: 100%;">Creer une periode</button>
                    </a>
                </div>
            </div>
            <?php 
            foreach($rows as $row) { 

            echo '<div class="row" style="margin-bottom: 25px;">
                <div class="col-md-4" style="height: 50px;"><button class="btn btn-primary" type="button" style="height: 100%; width: 100%">Modifier</button></div>
                <div class="col-md-4" style="height: 50px;">
                    <p style="margin-top: 13px;">Période de l\'année:  '.$row->getAnnee().'</p>
                </div>
                <div class="col-md-4" style="height: 50px;"><button class="btn btn-primary" type="button" style="height: 100%; width: 100%;">Desactiver</button></div>
            </div>';

            }
            ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>