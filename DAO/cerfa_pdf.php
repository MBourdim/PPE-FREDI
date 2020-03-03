<?php
include ('fpdf/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    $this->Image('cerfa.png',10,6,30);
}

}