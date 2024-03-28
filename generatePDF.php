<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");


$sql = mysqli_query($con, "select * from student where regno = '".$_GET['id']."' ");


if (mysqli_num_rows($sql)) {
 $fetch = mysqli_fetch_assoc($sql);
}



$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();
$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,'STUDENT FORM',0,0);


$pdf->setX(100);    
$pdf->Cell(60, 4,$fetch['fname'], 0,0,'L');
$pdf->Ln();







$pdf->Output();
?>