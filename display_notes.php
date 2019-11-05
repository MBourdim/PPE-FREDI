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





//SUPPRESSION
if(isset($_POST['supprNote'])) {
    $idligne = $data['id_ligne'];
    $res = $bdd->prepare('DELETE FROM ligne_de_frais WHERE id_ligne = :idligne');
    //Associe une valeur à un nom correspondant ou à un point d'interrogation (comme paramètre fictif) dans la requête SQL qui a été utilisé pour préparer la requête.
    $res->bindValue(':idligne', $idligne, PDO::PARAM_INT);
    $res->execute();

    header('Location: display_notes.php');
}
//SUPPRESSION
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>display_note</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<?php require_once('include/nav.php'); ?>
    <div>
        <div class="container" style="margin-top: 0px;">
            <div class="row" style="margin-top: 46px;">
                <div class="col-md-4"><a href="Creer_Ligne.php"><button class="btn btn-primary border rounded-0 float-right" type="button" style="width: 230px;margin: 0px;height: 48px;padding: 6px 12px;min-height: 0px;max-height: none;margin-left: 6px;margin-right: 50px;margin-bottom: 9px;">Créer une Note</button></a></div>
                <div
                    class="col-md-4" style="padding-right: 0px;padding-top: 10px;"><button class="btn btn-primary border rounded-0 float-left" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: -10px;">Générer un bordereau</button></div>
            <div
                class="col-md-4"><button class="btn btn-primary border rounded-0 float-left" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: 0px;">Générer un CERFA&nbsp;</button></div>
    </div>
    <div class="row" style="margin-top: 46px;">
        <div class="col-md-4"><a href="Modifier_Ligne.php"><button class="btn btn-primary border rounded-0 float-right" type="button" style="width: 230px;margin: 0px;height: 48px;padding: 6px 12px;min-height: 0px;max-height: none;margin-left: 6px;margin-right: 50px;margin-bottom: 9px;">Modifier</button></a></div>
        <div
            class="col-md-4" style="padding-right: 0px;padding-top: 10px;"><a href="Ligne_de_frais.php" style="width: auto;margin-top: 15px;margin-right: 0px;margin-left: 95px;margin-bottom: 0px;min-height: 0px;max-height: 0px;min-width: 0px;max-width: 0px;padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">Note de Frais N° xxxx</a></div>
    <div
        class="col-md-4"><button class="btn btn-primary border rounded-0 float-left" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: 0px;" name="supprNote">Supprimer</button></div>
        </div>
        </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>