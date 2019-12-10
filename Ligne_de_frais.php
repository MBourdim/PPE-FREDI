<?php 
require_once('DAO/user.php');
require_once('init.php');
require_once('DAO/ligneDAO.php');

session_start();

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    /*//Verifie si il s'agit d'un admin
    if($user->getTypeUser() == 1 || $user->getTypeUser() == 2 || $user->getTypeUser() == 3) {
        header('Location: Ligne_de_frais.php');
    }*/
} else {
    header('Location: index.php');
}

$id_ligne = $_GET['id_ligne'];
//Collection des ligne_de_frais
$ligne_de_frais = new LigneDAO();
$id = $ligne_de_frais->find($id_ligne);


$error = '';


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Affichage_Ligne</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php require_once('include/nav.php'); ?>
    <div class="card"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align:center">Ligne de frais n°<?php echo $id;?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 0px;width: 555px;height: 120px;"><input type="date" style="padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);width: 260px;height: 50px;margin: 60px;padding-top: 10px;margin-right: 60px;margin-top: 40px;"><?php echo $rows->getDate_frais()?></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" style="width: 260px;height: 50px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);text-align: left;margin: 60px;margin-top: 40px;" placeholder="Coûts repas (€)"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin: 0px;width: 555px;padding: 0px;height: 120px;"><input type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;margin-left: 60px;" placeholder="Trajet (Km)"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Coûts péages (€)"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-left: 45px;margin-top: 40px;" placeholder="Kms parcourus (Km)"></div>
                <div class="col-md-6"
                    style="width: 555px;height: 120px;"><input type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Total Frais Kms (€)"><?php echo $rows->get_total_frais?></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 150px;">
                    <div class="dropdown" style="width: 555px;height: 120px;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgb(247,249,252);color: rgb(80,94,108);width: 180px;margin: 85px;margin-top: 50px;">Motif</button>
                        <div
                            class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">En Cours</a><a class="dropdown-item" role="presentation" href="#">Validée</a><a class="dropdown-item" role="presentation" href="#">Controlée</a></div>
                </div>
            </div>
            <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" style="margin: 60px;width: 260px;height: 50px;padding: 10px 40px;margin-top: 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" placeholder="Coûts hébergement (€)"></div>
        </div>
    </div>
    </div>
    <div>
        <div class="container">
            <div class="col-md-6 col-xl-6" style="width: 555px;height: 120px;">
                <div class="input-group">
                    <div class="input-group-prepend"></div>
                    <div class="input-group-append"></div>
                </div><input type="text" style="width: 260px;height: 50px;margin: 350px;margin-top: 40px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" placeholder="Total (€)"></div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>