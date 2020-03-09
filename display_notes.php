<?php
require_once('DAO/user.php');
require_once('DAO/usersDAO.php');
require_once('init.php');
require_once('DAO/periodeDAO.php');
require_once('DAO/ligneDAO.php');

session_start();
//Verifie si on est connecter
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    //Verifie si il s'agit pas d'un admin
    if ($user->getTypeUser() == 1) {
        header('Location: index.php');
    }
} else {
    //Renvoie sur la page d'accueil
    header('Location: index.php');
}

$error = '';

//Collection des ligne_de_frais
$ligne_de_frais = new LigneDAO();
$rows = $ligne_de_frais->findAll();

//On verifie si on veut supprimer une ligne de frais
if (isset($_GET['supprimer'])) {
    $ligneSupprimer = new LigneDAO();
    $error = $ligneSupprimer->supprimerLigne($_GET['supprimer']);
}
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
            <?php
            //Message d'erreur
            if ($error != '') {
                echo '<p class="color: red">' . $error . '</p>';
            }
            ?>
            <div class="row" style="margin-top: 46px;">
                <div class="col-md-4">
                    <!---bouton createur de ligne de frais-->
                    <a href="Creer_Ligne.php">
                        <button class="btn btn-primary border rounded-0 float-right" type="button" style="width: 230px;margin: 0px;height: 48px;padding: 6px 12px;min-height: 0px;max-height: none;margin-left: 6px;margin-right: 50px;margin-bottom: 9px;">
                            Créer une Note
                        </button>
                    </a>
                </div>
                <!---bouton generateur bordereau-->
                <a href="bordereau.php?id=<?php echo $user->getId(); ?>">
                    <div class="col-md-4" style="padding-right: 0px;padding-top: 10px;">
                        <?php if ($user->getTypeUser() == 3) { ?>
                            <a href="bordereau.php?id=<?php echo $user->getId(); ?>">
                                <button class="btn btn-primary border rounded-0 float-left" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: -10px;">
                                    Générer un bordereau
                                </button>
                            </a>
                        <?php } ?>
                    </div>
                    <!---bouton generateur CERFA-->
                    <div class="col-md-4">
                        <?php if ($user->getTypeUser() == 2) { ?>
                            <a href="cerfa.php">
                                <button class="btn btn-primary border rounded-0 float-left" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: 0px;">
                                    Générer un CERFA&nbsp;
                                </button>
                            </a>
                        <?php } ?>
                    </div>
            </div>
            <div class="row" style="margin-top: 46px;">
                <?php
                //Affichage des ligne de frais
                foreach ($rows as $row) { ?>
                    <div class="col-md-4">
                        <!---bouton modifier une ligne de frais-->
                            <button class="btn btn-primary border rounded-0 float-right" onclick="modifierLigne()"type="button" style="width: 230px;margin: 0px;height: 48px;padding: 6px 12px;min-height: 0px;max-height: none;margin-left: 6px;margin-right: 50px;margin-bottom: 9px;" <?php if ($user->getTypeUser() == 1) {
                                                                                                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                                                                                                    } ?>>
                                Modifier
                            </button>
                    </div>
                    <!---bouton afficher ligne de frais-->
                    <div class="col-md-4" style="padding-right: 0px;padding-top: 10px;">
                        <a href="Ligne_de_frais.php?id_ligne=<?php echo $row->get_id_ligne(); ?>" style="width: auto;margin-top: 15px;margin-right: 0px;margin-left: 95px;margin-bottom: 0px;min-height: 0px;max-height: 0px;min-width: 0px;max-width: 0px;padding-bottom: 0px;padding-top: 0px;padding-right: 0px;padding-left: 0px;"><?php echo $row->getLib_trajet() . " / " . $row->getDate_frais(); ?></a></div>
                    <!---bouton suppression ligne de frais-->
                    <div class="col-md-4">
                        <button class="btn btn-primary border rounded-0 float-left" onclick="supprimerLigne()" type="button" style="width: 230px;margin: 0px;height: 48px;margin-right: 7px;margin-bottom: 10px;margin-left: 52px;margin-top: 0px;" name="supprNote" <?php if ($user->getTypeUser() == 1 || $user->getTypeUser() == 2) {
                                                                                                                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                                                                                                                            } ?>>
                            Supprimer
                        </button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        //Confirmation pour la suppression d'une ligne
        function supprimerLigne() {
            if (confirm("Voulez-vous supprimer la ligne de frais ?")) {
                window.location.href = "display_notes.php?supprimer=<?php echo $row->get_id_ligne(); ?>";
            }
        }

        //Confiramtion pour la modification d'une ligne
        function modifierLigne() {
            if (confirm("Voulez-vous modifier la ligne de frais ?")) {
                window.location.href = "Modifier_Ligne.php?id_ligne=<?php echo $row->get_id_ligne(); ?>";
            }
        }
    </script>
</body>

</html>