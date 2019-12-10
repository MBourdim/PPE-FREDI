<?php

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    //Verifie si il s'agit d'un controlleur
    if($user->getTypeUser() == 3 || $user->getTypeUser() == 1) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

$date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : '';
$lib_trajet = isset($_POST['forfait_km']) ? $_POST['forfait_km'] : '';
$cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : '';
$cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : '';
$cout_hebergement = isset($_POST['cout_hebergemement']) ? $_POST['cout_hebergement'] : '';
$nb_km = isset($_POST['nb_km']) ? $_POST['nb_km'] : '';
$total_km = isset($_POST['total_km']) ? $_POST['total_km'] : '';
$total_ligne = isset($_POST['total_ligne']) ? $_POST['total_ligne'] : '';
$code_statut = isset($_POST['code_statut']) ? $_POST['code_statut'] : '';
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$id_note = isset($_POST['id_note']) ? $_POST['id_note'] : '';
$submit = isset($_POST['ligneForm']);

$error = '';

if($submit) {
    if($annee != '' && $tarif != '' && $statut != '') {
        $periode = new PeriodeDAO();
        $error = $periode->createPeriode($id_note, $date_frais, $cout_repas, $nb_km, $cout_peage, $total_km, $code_statut, $cout_hebergement, $total_ligne);
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
    <title>Creer_Ligne</title>
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
                    <h1 style="text-align:center">Créer votre ligne de frais</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 0px;width: 555px;height: 120px;"><input type="date" name="date_frais" style="padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);width: 260px;height: 50px;margin: 60px;padding-top: 10px;margin-right: 60px;margin-top: 40px;"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" name="cout_repas" style="width: 260px;height: 50px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);text-align: left;margin: 60px;margin-top: 40px;" placeholder="Coûts repas (€)"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin: 0px;width: 555px;padding: 0px;height: 120px;"><input type="text" name="nb_km" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;margin-left: 60px;" placeholder="Trajet (Km)"></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" name="cout_peage" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Coûts péages (€)"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 120px;"><input type="text" name="total_km" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-left: 45px;margin-top: 40px;" placeholder="Kms parcourus (Km)"></div>
                <div class="col-md-6"
                    style="width: 555px;height: 120px;"><input type="text" name="" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Total Frais Kms (€)"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 150px;">
                    <div class="dropdown" style="width: 555px;height: 120px;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" name="code_statut" style="background-color: rgb(247,249,252);color: rgb(80,94,108);width: 180px;margin: 85px;margin-top: 50px;">Motif</button>
                        <div
                            class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">test</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                </div>
            </div>
            <div class="col-md-6" name="cout_hebergement" style="width: 555px;height: 120px;"><input type="text" style="margin: 60px;width: 260px;height: 50px;padding: 10px 40px;margin-top: 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" placeholder="Coûts hébergement (€)"></div>
        </div>
    </div>
    </div>
    <div>
        <div class="container">
            <div class="col-md-6 col-xl-6" style="width: 555px;height: 120px;">
                <div class="input-group">
                    <div class="input-group-prepend"></div>
                    <div class="input-group-append"></div>
                </div><input type="text" name="total_ligne" style="width: 260px;height: 50px;margin: 350px;margin-top: 40px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" placeholder="Total (€)"></div>
        </div>
    </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 90px;margin-right: 0px;"><button class="btn btn-primary" type="submit" name="ligneForm" style="width: 143px;margin: 25px;margin-right: 25px;margin-bottom: 25px;margin-top: 53px;margin-left: 410px;height: 48px;">Créer ligne</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

