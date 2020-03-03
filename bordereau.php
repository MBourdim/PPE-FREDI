<?php
include_once('DAO/bordereau_pdf.php');

$pdf = new PDF();
    $pdf->SetFont('Arial','',11);
    $pdf->AddPage();

    // Titres des colonnes
    $header = array(
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
    $pdf->Write(7, utf8_decode("Je soussigné BANDILELLA Clément, demeurant au :"/*.$adherent->nom." ".$adherent->prenom.*/));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode(/*$adherent->adress." ".$adherent->postal_code." ".$adherent->city*/"30, rue Widric 1er 54600 Villers les Nancy"), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association: "));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode(/*$adherent->club->name*/"DOJO BURGIEN"), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("en tant que don."));
    $pdf->Ln();
    $pdf->Ln();
    //Tableau
  $pdf->FancyTable($header/*,$data*/);
  $pdf->Total(/*$note->total*/"ex : 260,50 EUR");
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(10,105,182);
    $pdf->SetFillColor(224,235,255);
    $pdf->SetDrawColor(33,150,243);
    $pdf->Write(7, utf8_decode("Mon numéro de licence est le suivant :"));
    $pdf->Ln();
  $pdf->Cell(190, 7, utf8_decode(/*$adherent->licence_num*/" 17 05 40 010 443"), 1, 0, 'C', true);
    $pdf->Ln();
    $pdf->Write(7, utf8_decode("Montant des dons :"));
    $pdf->Ln();
    $pdf->Cell(190, 7, utf8_decode(/*$note->total.*/"100 EUR"), 1, 0, 'C', true);
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
    