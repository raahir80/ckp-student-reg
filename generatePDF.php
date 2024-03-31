<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");




$sql = mysqli_query($con, "select * from student where regno = '".$_GET['id']."' ");
if (mysqli_num_rows($sql)) {
 $row = mysqli_fetch_assoc($sql);
}

$totalTH = $row['Maths'] + $row['Chem'] +$row['Phy'] +$row['Comp'] +$row['Eng'];
$totalTHPR = $row['Maths'] + $row['Chem'] +$row['Phy'] +$row['Comp'] +$row['Eng'] + $row['Chempr'] + $row['Phypr'] +$row['Comppr'];

$avg = (float)$totalTH/5;

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
$pdf->SetFont("Arial", "B", 12);
$pdf->setFillColor(230,230,230);
$pdf->Cell(190,10,'REGISTRATION NUMBER: '.$row['regno'],1,1,'C',true);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'FULL NAME: ',0,0,'L'); 
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,70);
$pdf->Cell(250,10,strtoupper($row['surname']) ." ".strtoupper($row['name'])." ".strtoupper($row['fname']),0,0,'L'); 

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'MOTHERS NAME: ',0,0,'L');
$pdf->SETXY(45,80);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['mname']),0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'GENDER: ',0,0,'L');
$pdf->SETXY(45,90);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['gender']),0,0,'L');


$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'BOARD: ',0,0,'L');
$pdf->SETXY(45,100);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['board']),0,0,'L');


$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'CATEGORY: ',0,0,'L');
$pdf->SETXY(45,110);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['category']),0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'DOB: ',0,0,'L');
$pdf->SETXY(45,120);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,date('d/m/o',strtotime($row['dob'])),0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'COURSE: ',0,0,'L');
$pdf->SETXY(45,130);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['course']),0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'SCHOOL NAME: ',0,0,'L');
$pdf->SETXY(45,140);
$pdf->SetFont("Arial", "", 10);
//$pdf->Cell(250,10,strtoupper($row['schoolname']),0,0,'L');

$pdf->MultiCell(80,5,strtoupper($row['schoolname']),0,'L');


//$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,150);
$pdf->Cell(250,10,'H.S.C Seat No: ',0,0,'L');
$pdf->SETXY(45,150);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['hseatno'],0,0,'L');


$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'H.S.C passing Year: ',0,0,'L');
$pdf->SETXY(45,160);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['hpassing'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'GUJCET Appl No: ',0,0,'L');
$pdf->SETXY(45,170);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['gujappno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'GUJCET Seat No: ',0,0,'L');
$pdf->SETXY(45,180);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['gujseatno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'ADDRESS: ',0,0,'L');
$pdf->SETXY(45,190);
$pdf->SetFont("Arial", "", 10);
$pdf->MultiCell(100,5,strtolower($row['address'])."-".$row['pincode'],0,'L');

$pdf->Ln(10); 
$pdf->SETXY(10,200);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Email: ',0,0,'L');
$pdf->SETXY(45,200);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['email'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Student Mobile No: ',0,0,'L');
$pdf->SETXY(45,210);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['smobno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Parents Mobile No: ',0,0,'L');
$pdf->SETXY(45,220);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['pmobno'],0,0,'L');


$pdf->Ln(36); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10,0,'Declaration: ',0,0,'L',false);
$pdf->Cell(10,20,'I hereby declare that the above information provided is true and correct.',0,0,'L',false);

$pdf->Rect(150,250,40,10);
$pdf->Cell(280,20,'Signature',0,0,'C');

$pdf->Rect(150,75,40,40);
$pdf->SETXY(150,100);
$pdf->Cell(40,-10,"PHOTO",0,0,"C",false);



$pdf->Rect(115,130,45,50);
$pdf->SetFont("Arial", "BI", 12);
$pdf->SETXY(125,130);
$pdf->Cell(10,5,'12th RESULT',0,0,'L');


$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(115,130);
$pdf->Cell(10,20,'ENGLISH  ',0,0,'L');
$pdf->SETXY(150,130);
$pdf->Cell(10,20,$row['Eng'],0,0,'L');



$pdf->SETXY(115,135);
$pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
$pdf->SETXY(150,135);
$pdf->Cell(10,20,$row['Maths'],0,0,'L');


$pdf->SETXY(115,140);
$pdf->Cell(10,20,'CHEMISTRY(TH)  ',0,0,'L');
$pdf->SETXY(150,140);
$pdf->Cell(10,20,$row['Chem'],0,0,'L');


$pdf->SETXY(115,145);
$pdf->Cell(10,20,'CHEMISTRY(PR)  ',0,0,'L');
$pdf->SETXY(150,145);
$pdf->Cell(10,20,$row['Chempr'],0,0,'L');



$pdf->SETXY(115,150);
$pdf->Cell(10,20,'PHYSICS(TH)  ',0,0,'L');
$pdf->SETXY(150,150);
$pdf->Cell(10,20,$row['Phy'],0,0,'L');


$pdf->SETXY(115,155);
$pdf->Cell(10,20,'PHYSICS(PR)  ',0,0,'L');
$pdf->SETXY(150,155);
$pdf->Cell(10,20,$row['Phypr'],0,0,'L');



$pdf->SETXY(115,160);
$pdf->Cell(10,20,'COMPUTER  ',0,0,'L');
$pdf->SETXY(150,160);
$pdf->Cell(10,20,$row['Comp'],0,0,'L');



$pdf->SETXY(115,165);
$pdf->Cell(10,20,'COMPUTER(PR)  ',0,0,'L');
$pdf->SETXY(150,165);
$pdf->Cell(10,20,$row['Comppr'],0,0,'L');


$pdf->Rect(115,180,55,8);
$pdf->SETXY(115,175 );
$pdf->Cell(10,20,'TOTAL ',0,0,'L');
$pdf->SETXY(150,175);
$pdf->Cell(10,20,$totalTH." / "."500",0,0,'L');



$pdf->Rect(160,130,45,30);

$pdf->SetFont("Arial", "BI", 12);
$pdf->SETXY(165,130);
$pdf->Cell(10,5,'GUJCET RESULT',0,0,'L');

$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(160,130);
$pdf->Cell(10,20,'PHYSICS  ',0,0,'L');
$pdf->SETXY(195,130);
$pdf->Cell(15,20,$row['Guj_Phy'],0,0,'L');

$pdf->SETXY(160,135);
$pdf->Cell(10,20,'CHEMISTRY  ',0,0,'L');
$pdf->SETXY(195,135);
$pdf->Cell(15,20,$row['Guj_Chem'],0,0,'L');

$pdf->SETXY(160,140);
$pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
$pdf->SETXY(195,140);
$pdf->Cell(15,20,$row['Guj_Maths'],0,0,'L');

$pdf->Rect(115,210,50,10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SETXY(115,212);
$pdf->Cell(10,5,'Aggregate % of 12th',0,0,'L');
$pdf->SETXY(175,212);
$pdf->Cell(10,5,$avg,0,0,'R');


$pdf->Rect(170,210,25,10);


$pdf->Rect(115,220,50,10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SETXY(115,222);
$pdf->Cell(10,5,'PCM Percentile',0,0,'L');
$pdf->SETXY(175,222);
$pdf->Cell(10,5,$avg,0,0,'R');

$pdf->Rect(170,220,25,10);


$pdf->Rect(115,230,50,10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SETXY(115,232);
$pdf->Cell(10,5,'GUJCET Percentile',0,0,'L');
$pdf->SETXY(175,232);
$pdf->Cell(10,5,$avg,0,0,'R');

$pdf->Rect(170,230,25,10);




$pdf->Output();
?>