<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");

$query = mysqli_query($con, "select * from student where name = '".$_GET['name']."' ");

$details = mysqli_fetch_array($query);



$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();
$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,'STUDENT FORM',0,0);






$pdf->Output();
?>