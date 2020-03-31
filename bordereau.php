<?php
include_once('DAO/bordereau_pdf.php');
include_once('DAO/user.php');
include_once('DAO/adherent.php');
include_once('DAO/adherentDAO.php');
require_once('DAO/ligneDAO.php');
require_once('init.php');
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

$id_adherent = isset($_GET['id']) ? $_GET["id"] : "";
//Collection des adherent
$adherent = new AdherentDAO();
$unAdherent = $adherent->find($id_adherent);

//Collection des ligne_de_frais
$ligne_de_frais = new LigneDAO();
$uneLigne = $ligne_de_frais->findByAuthor($id_adherent);

//var_dump($ligne_de_frais);

$error = '';


/*
//Verifie si id_ligne nest pas vide
if($_GET['id_ligne'] == '') {
  header('Location: Ligne_de_frais.php');
} else {
  $ligneDAO = new LigneDAO();
  $uneLigne = $ligneDAO->find($_GET['id_ligne']);
}*/

$pdf = new PDF();
    $pdf->SetFont('Arial','',11);
    $pdf->AddPage();
 
    // Titres des colonnes
    /*$header = array(
        Array('width' => '30', 'content' => 'Date'),
        Array('width' => '80', 'content' => 'Motif'),
        Array('width' => '50', 'content' => 'Type'),
        Array('width' => '30', 'content' => 'Montant')
        );
    // Chargement des données
    $types = Array('default' => 'Autre frais', 'km' => 'Frais de transport');
    /*$data = Array();
    foreach ($fees as $key => $fee) {
        array_push($data, Array($fee->creation_date, $fee->caption, $types[$fee->id_fee_type], $fee->amount*$fee->coef." EUR"));
    }*/
    $pdf->SetFillColor(224,235,255);
    $pdf->SetDrawColor(33,150,243);
    $pdf->Write(7, utf8_decode("Je soussigné ".$unAdherent->getNom_resp()." ".$unAdherent->getPrenom_Resp().", demeurant au : "));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode("".$unAdherent->getAdresse1()."  ".$unAdherent->getAdresse2()."  ".$unAdherent->getAdresse3().""), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association: "));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode(/*$row->club->name*/"DOJO BURGIEN"), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("en tant que don."));
    $pdf->Ln();
    $pdf->Ln();
    //Tableau
  /*$pdf->FancyTable($header/*,$data);
     
    /************************************************************************************************** */
    // Entête de la liste
  //$pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(25, 10, "Date", 'B', 0, 'C');
  $pdf->Cell(25, 10, "Motif", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Trajet", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Kms", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Cout Trajet", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Peages", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Repas", 'B', 0, 'C');
  $pdf->Cell(20, 10, "Hebergement", 'B', 0, 'C');
  $pdf->Cell(25, 10, "Total ligne", 'B', 1, 'C');
  
  $montant_total = 0;
  foreach ($ligne_de_frais as $uneLigne) {
    $trajet_frais = $uneLigne->getLib_frais();
    $date_frais = $uneLigne->getDate_frais();
    $km_parcourus = $uneLigne->get_nb_km();
    $prix_km = $uneLigne->get_total_km();
    $cout_peage = $uneLigne->getCout_peage();
    $cout_repas = $uneLigne->getCout_repas();
    $cout_hebergement = $uneLigne->getCout_hebergement();
    $libelle_motif = $uneLigne->get_id_motif();
    $total_ligne = $uneLigne->get_total_ligne();
    $montant_total= $montant_total + $total_ligne;
    
    // Liste des employés
  $pdf->SetFont('Arial', '', 8);
  $pdf->Cell(25, 10, utf8_decode($date_frais),1, 0, 'C',1);
  $pdf->Cell(25, 10, utf8_decode($libelle_motif), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($trajet_frais), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($km_parcourus), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($prix_km), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_peage), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_repas), 1, 0, 'C',1);
  $pdf->Cell(20, 10, utf8_decode($cout_hebergement), 1, 0, 'C',1);
  $pdf->Cell(25, 10, utf8_decode($total_ligne), 1, 1, 'C',1);
  }
  
  $pdf->Cell(170, 10, "Montant total des frais de deplacement", 1, 0, 'C');
  $pdf->Cell(25, 10, utf8_decode($montant_total), 1, 1, 'C',1);

  /*********************************************************************************************** */
  
    /*$pdf->Ln();
    $pdf->Ln();
    $pdf->Total("100 EUR");*/
    $pdf->SetTextColor(10,105,182);
    $pdf->SetFillColor(224,235,255);
    $pdf->SetDrawColor(33,150,243);
    $pdf->Write(7, utf8_decode("Mon numéro de licence est le suivant :"));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode($unAdherent->getNum_licence()), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("Montant des dons :"));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode($montant_total." EUR"), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetFont('','I');
    $pdf->Cell(190, 7, utf8_decode("Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de tous les justificatifs correspondants."), 0, 0, 'C', true);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('','');
    $pdf->SetFillColor(224,235,255);
    $pdf->SetDrawColor(33,150,243);
    $pdf->Cell(95, 7, utf8_decode("A ___________________________"), 0, 0, 'LT', true);
    $pdf->Cell(95, 7, utf8_decode("Le __________________________"), 0, 0, 'LT', true);
    $pdf->Ln();
    $pdf->Cell(190, 30, utf8_decode("Signature du bénévole"), 0, 0, 'LT', true);
    $pdf->Ln();

    $pdf->SetFillColor(210,210,210);
    $pdf->SetDrawColor(180,180,180);
    $pdf->SetTextColor(90,90,90);
    $pdf->SetFont('','B');
    $pdf->Cell(190, 7, utf8_decode("Partie réservée à l'association."), 0, 0, 'LT', true);
    $pdf->Ln();
    $pdf->SetFont('','');
    $pdf->Cell(190, 10, utf8_decode("Remis le : ___________"), 0, 0, 'LT', true);
    $pdf->Ln();
    $pdf->Cell(190, 30, utf8_decode("Signature du trésorier"), 0, 0, 'LT', true);
    $pdf->Ln();
    $pdf->Ln();

    $id = date('dmYhms');
    // $file = $pdf->Output("F", 'outfiles/bordereau_pdf.pdf'/*.$id.*/);
    //$link = "outfiles/bordereau_pdf.pdf";
    $pdf->Output();    
    ?> 