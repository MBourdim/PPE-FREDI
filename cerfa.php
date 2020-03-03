<?php
include ('fpdf/fpdf.php');

$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->Image('fpdf/image/cerfa.png', 0, 0);
$fpdf->Output();


?>