<?php
include('DAO/cerfa_pdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16 );
$pdf->Cell(40,10,'Hello World !');
$pdf->Output();


?>