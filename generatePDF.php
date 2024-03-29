<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");




$sql = mysqli_query($con, "select * from student where regno = '".$_GET['id']."' ");
if (mysqli_num_rows($sql)) {
 $row = mysqli_fetch_assoc($sql);
}

$pdf = new FPDF('P', 'mm', "A4");



$pdf->AddPage();
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(190, 20, 'C K PITHAWALA COLLEGE OF ENGINEERING AND TECHNOLOGY', 0, 0, 'C');

// Adding a logo on top of the page
$pdf->Image('images/ckp.jpg',175,10,30,30,'jpg');
$pdf->Image('images/trust_logo.png',5,10,30,30,'png');


$pdf->Ln(5);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(190, 20,'Opposite Surat Airport, Behind DPS School, Near Malvan Mandir,',0,0,'C');
$pdf->Ln(5);
$pdf->Cell(190, 20,'Dumas Road, Surat - 395007',0,0,'C');
$pdf->Ln(20);
$pdf->SetFont("Arial", "BIU", 15);
$pdf->Cell(200, 20,'Student Registration Details',0,0,'C');

$pdf->Ln(20);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(190,10,'REGISTRATION NUMBER: '.$row['regno'],1,1,'C');

$pdf->Cell(250,10,'FULL NAME: '.strtoupper($row['surname']) ." ".strtoupper($row['name'])." ".strtoupper($row['fname']),0,0,'L'); 
$pdf->Ln(10); 
$pdf->Cell(250,10,'MOTHERS NAME: '.strtoupper($row['mname']),0,0,'L');
$pdf->Ln(10); 
$pdf->Cell(290,10,'GENDER: '.strtoupper($row['gender']),0,0,'L'); 
$pdf->Ln(10); 
$pdf->Cell(290,10,'BOARD: '.$row['board'],0,0,'L'); 
$pdf->Ln(10); 
$pdf->Cell(290,10,'CATEGORY: '.$row['category'],0,0,'L'); 
$pdf->Ln(10);
$pdf->Cell(290,10,'DOB: '.date('d/m/o',strtotime($row['dob'])),0,0,'L'); 
$pdf->Ln(10); 
$pdf->Cell(290,10,'COURSE: '.$row['course'],0,0,'L');
$pdf->Ln(10); 
$pdf->Cell(290,10,'SCHOOL NAME: '.$row['schoolname'],0,0,'L',false);


$pdf->Ln(10); 
$pdf->Cell(290,10,'H.S.C Seat No: '.$row['hseatno'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'H.S.C Passing Year: '.$row['hpassing'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'GUJCET Application No: '.$row['gujappno'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'GUJCET Seat No: '.$row['gujseatno'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'Address: '.$row['address']."-".$row['pincode'],0,0,'L');

// $pdf->Ln(10); 
// $pdf->Cell(290,10,'Pincode: ',0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'Email: '.$row['email'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'Student Mobile No: '.$row['smobno'],0,0,'L');

$pdf->Ln(10); 
$pdf->Cell(290,10,'Parents Mobile No: '.$row['pmobno'],0,0,'L');

$pdf->Rect(150,75,40,40);
$pdf->Cell(275,20,'Hello',0,0,'C');


$pdf->Ln(35); 
$pdf->Cell(10,0,'Declaration: ',0,0,'L',false);
$pdf->Cell(10,20,'I hereby declare that the above information provided is true and correct.',0,0,'L',false);

$pdf->Rect(150,250,40,10);
$pdf->Cell(280,20,'Signature',0,0,'C');


//$pdf->Cell(80,200,"PRODUCT",0,0,"C",false);





$pdf->Output();
?>