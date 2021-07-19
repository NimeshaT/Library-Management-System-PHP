<?php
require('../lib/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(1,5,'Member wise Book report');

include_once("../includes/db.php");
// subquery
$sql= "SELECT *, (SELECT  count(lid) FROM lending WHERE lending.uid=user.uid) AS book_count from user";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(70,20,$row["name"]);
    $pdf->Cell(70,20,$row["book_count"]);
    $pdf->Ln();
}
$pdf->Output();
?>