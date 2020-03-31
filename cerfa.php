<?php
include ('fpdf/fpdf.php');

$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->Image('fpdf/image/cerfa.png', 0, 0);

$fpdf->SetFont('Arial','', 16);
$fpdf->Cell(175, 45, utf8_decode("Salles d’Armes de Villers lès Nancy"), 0, 1, 'C');
$fpdf->Cell(175, -25, utf8_decode("1, rue Rodin - 54600 Villers-lès-Nancy"), 0, 1, 'C');
$fpdf->Cell(175, 50, utf8_decode("Club d’Escrime"), 0, 1, 'C');

$fpdf->SetFont('Arial','',12);
$fpdf->SetX(20);
$fpdf->Cell(0, 155, utf8_decode("Jean-Christophe Berbier"), 0, 1, 'L');
$fpdf->SetX(25);
$fpdf->Cell(0, -139, utf8_decode("12, rue de Marron, 54600 Villers-lès-Nancy"), 0, 1, 'L');

$fpdf->SetFont('Arial','',10);
$fpdf->SetX(28);
$fpdf->Cell(0, 150, utf8_decode("54600"), 0, 1, 'L');
$fpdf->SetX(65);
$fpdf->Cell(0, -150, utf8_decode("Villers-lès-Nancy"), 0, 1, 'L');

$fpdf->SetFont('Arial','B',10);
$fpdf->SetX(153);
$fpdf->Cell(0, 166, utf8_decode("500 euros"), 0, 1, 'L');

$fpdf->SetFont('Arial','',10);
$fpdf->SetX(45);
$fpdf->Cell(0, -154, utf8_decode("Cinq cents euros"), 0, 1, 'L');
$fpdf->SetX(37);
$fpdf->Cell(0, 167, utf8_decode("03/03/2020"), 0, 1, 'L');




$fpdf->Output();
?>