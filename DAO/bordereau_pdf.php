<?php
include_once('fpdf/fpdf.php');
include_once('DAO/user.php');
include_once('DAO/usersDAO.php');

class PDF extends FPDF
{
  
    // Chargement des données
    /*function LoadData($file)
    {
        // Lecture des lignes du fichier
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }*/

    // Tableau simple
    function BasicTable($header/*, $data*/)
    {
        // En-tête
        foreach($header as $col)
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Données
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }

    // Tableau amélioré
    function ImprovedTable($header/*, $data*/)
    {
        // Largeurs des colonnes
        $w = array(40, 35, 45, 40);
        // En-tête
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        // Données
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R');
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
    }

    // Tableau coloré
    function FancyTable($header/*, $data*/)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(33,150,243);
        $this->SetTextColor(255);
        $this->SetDrawColor(33,150,243);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        #region Entête
        $height = 7;

        foreach($header as $head) {
            $this->Cell($head['width'], $height, $head['content'], 1, 0, 'C',true);
        }
        $this->Ln();
        #endregion

        #region Données
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(10,105,182);
        $this->SetFont('');
        $fill = false;
        /*foreach($data as $row)
        {
            foreach ($row as $index => $cell) {
                # code...
                $this->Cell($header[$index]['width'], $height, $cell, 1, 0, 'L', $fill);
            }
            $this->Ln();
            $fill = !$fill;
        }*/
        // Trait de terminaison
        // $this->Cell($width*count($data),0,'','T');
        #endregion
    }

    function Total($total) {
        $this->SetFillColor(33,150,243);
        $this->SetTextColor(255);
        $this->SetDrawColor(33,150,243);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        $this->Cell(160, 7, 'Total', 1, 0, 'L', true);
        $this->Cell(30, 7, $total." EUR", 1, 0, 'L', true);
    }

    function ToUTF8($text) {
        return $this->UTF8ToUTF16BE($text);
    }
}