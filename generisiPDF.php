<?php
require('pdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times', 'B', 10);
$pdf->Cell(15, 7, "Rank");
$pdf->Cell(50, 7, "Korisnik");
$pdf->Cell(40, 7, "WOD");
$pdf->Cell(20, 7, "Vreme");
$pdf->Ln();
$pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();

include('autoload.php');
$podaci = $baza->vratiSveRezulate();
$brojac = 0;
foreach ($podaci as $rezultat) {
    $brojac++;
    $pdf->Cell(15, 7, $brojac);
    $pdf->Cell(50, 7, $rezultat->first_name." ".$rezultat->last_name);
    $pdf->Cell(40, 7, $rezultat->wod_name);
    $pdf->Cell(20, 7, $rezultat->minutes.":".$rezultat->seconds);

    $pdf->Ln();
}

$pdf->Output();

