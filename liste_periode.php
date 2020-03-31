<?php 
require_once('DAO/user.php');
require_once('init.php');
require_once('DAO/periodeDAO.php');
session_start();

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    //Verifie si il s'agit d'un admin
    if($user->getTypeUser() == 2 || $user->getTypeUser() == 3) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

//Collection des periodes
$periodes = new PeriodeDAO();
$rows = $periodes->findAll();

//Permet de desactiver une periode
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$submit = isset($_POST['desactiverPeriode']);

$error = '';

if($submit) {
    $periode = new PeriodeDAO();
    $error = $periode->desactiverPeriode($annee);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FREDI Période Liste</title>
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
                        <button class="btn btn-primary" type="button" style="margin-bottom: 25px; width: 100%;">Créer une periode</button>
                    </a>
                    <?php
                    if ($error != '') {
                        echo '<p class="color: red">' . $error . '</p>';
                    }
                    ?>
                </div>
            </div>
            <?php 
            foreach($rows as $row) { 

            echo '<div class="row" style="margin-bottom: 25px;">
                <div class="col-md-4" style="height: 50px;"><a href="modifier_periode.php?annee='.$row->getAnnee().'"><button class="btn btn-primary" type="button" style="height: 100%; width: 100%" '; if($row->getCodeStatut() == 0) { echo 'disabled'; } echo '>Modifier</button></a></div>
                <div class="col-md-4" style="height: 50px;">
                    <p style="margin-top: 13px;">Période de l\'année:  '.$row->getAnnee().' / Tarif km: '.$row->getTarif().' €</p>
                </div>
                <div class="col-md-4" style="height: 50px;">
                    <form method="POST">
                        <input type="hidden" name="annee" value="'.$row->getAnnee().'"/>
                        <button class="btn btn-primary" type="submit" name="desactiverPeriode" type="button" style="height: 100%; width: 100%;" '; if($row->getCodeStatut() == 0) { echo 'disabled'; } echo'>Desactiver</button>
                    </form>
                </div>
            </div>';

            }
            ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
    function supprimerLigne() {
        if(confirm("Vouslez-vous supprimer la ligne de frais ?")) {
            window.location.href = "display_notes.php?supprimer=<?php echo $row->get_id_ligne(); ?>";
        }
    }
    </script>
</body>

</html>