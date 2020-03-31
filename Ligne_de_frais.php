<?php 
require_once('DAO/user.php');
require_once('init.php');
require_once('DAO/ligneDAO.php');
session_start();

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: index.php');
}
$id_ligne = isset($_GET['id_ligne']) ? $_GET["id_ligne"] : "";
//Collection des ligne_de_frais
$ligne_de_frais = new LigneDAO();
$row = $ligne_de_frais->find($id_ligne);

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
                    <h1 style="text-align:center">Ligne de frais n°<?php echo $id_ligne;?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 0px;width: 555px;height: 120px;"><p style="padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);width: 260px;height: 50px;margin: 60px;padding-top: 10px;margin-right: 60px;margin-top: 40px;">Date : <?php echo $row->getDate_frais()?></p></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><p type="text" style="width: 260px;height: 50px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);text-align: left;margin: 60px;margin-top: 40px;" placeholder="Coûts repas (€)">Coûts repas (€) : <?php echo $row->getCout_repas()?></p></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin: 0px;width: 555px;padding: 0px;height: 120px;"><p type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;margin-left: 60px;" placeholder="Trajet (Km)">Trajet : <?php echo $row->getLib_trajet()?></p></div>
                <div class="col-md-6" style="width: 555px;height: 120px;"><p type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Coûts péages (€)">Coûts péages (€) : <?php echo $row->getCout_peage()?></p></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 120px;"><p type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-left: 45px;margin-top: 40px;" placeholder="Kms parcourus (Km)">Kms parcourus (Km) : <?php echo $row->get_nb_km()?></p></div>
                <div class="col-md-6"
                    style="width: 555px;height: 120px;"><p type="text" style="width: 260px;height: 50px;margin: 60px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);margin-top: 40px;" placeholder="Total Frais Kms (€)">Total Frais Kms (€) : <?php echo $row->get_total_km()?></p></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 555px;height: 150px;">
                    <select>
                        <option <?php if($row->get_id_motif() == 1) { echo "selected"; }?>>Réunion</option>
                        <option <?php if($row->get_id_motif() == 2) { echo "selected"; }?>>Compétition Régionale</option>
                        <option <?php if($row->get_id_motif() == 3) { echo "selected"; }?>>Compétition Nationale</option>
                        <option <?php if($row->get_id_motif() == 4) { echo "selected"; }?>>Compétition Internationale</option>
                        <option <?php if($row->get_id_motif() == 5) { echo "selected"; }?>>Stage</option>
                    </select>
            </div>
            <div class="col-md-6" style="width: 555px;height: 120px;"><p type="text" style="margin: 60px;width: 260px;height: 50px;padding: 10px 40px;margin-top: 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" title="Coûts hébergement (€)">Coûts hébergement(€) : <?php echo $row->getCout_hebergement()?></p></div>
        </div>
    </div>
    </div>
    <div>
        <div class="container">
            <div class="col-md-6 col-xl-6" style="width: 555px;height: 120px;">
                <div class="input-group">
                    <div class="input-group-prepend"></div>
                    <div class="input-group-append"></div>
                </div><p type="text" style="width: 260px;height: 50px;margin: 350px;margin-top: 40px;padding: 10px 40px;background-color: rgb(247,249,252);color: rgb(80,94,108);" placeholder="Total (€)">Total Ligne(€) : <?php echo $row->get_total_ligne()?></p></div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>