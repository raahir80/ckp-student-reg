<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$sql = mysqli_query($con, "select * from dipstudent where regno = '".$_GET['id']."' ");
if (mysqli_num_rows($sql)) {
 $row = mysqli_fetch_assoc($sql);
}


$totalBacklog = $row['back1'] + $row['back2'] +$row['back3'] +$row['back4'] + $row['back5'] + $row['back6'];

$pdf = new FPDF('P', 'mm', "A4");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);

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


$pdf->SETXY(70,100);
$pdf->Rect(160,50,30,20);
$pdf->SETXY(70,100);
$pdf->SetFont("Arial", "B", 13);

$pdf->Cell(210,-90,"FORM NO",0,0,"C",false);
$pdf->SETXY(70,100);

$pdf->Cell(210,-70,substr($row['regno'],-3),0,0,"C",false);


$pdf->Ln(10); 
$pdf->Rect(10,50,30,20);

$pdf->SetFont("Arial", "B", 12);
$pdf->SETXY(15,110);
$pdf->Cell(250,-110,'COURSE',0,0,'L');
$pdf->SETXY(15,60);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(250,10,strtoupper($row['course']),0,0,'L');

$pdf->SETXY(70,100);
$pdf->SetFont("Arial", "BIU", 15);
$pdf->Cell(70, -90,'D2D Student Registration Details',0,0,'C');
//$pdf->Ln(20);
$pdf->SetFont("Arial", "B", 12);
//$pdf->setFillColor(230,230,230);

$pdf->Cell(-70,-70,'REGISTRATION NUMBER : '.$row['regno'],0,0,'C',false);
//$pdf->SETXY(150,50);
//$pdf->Cell(40, 30,'FORM NO',0,1,'C');




$pdf->SETXY(10,100);
$pdf->Rect(10,75,130,20);
$pdf->Line(20, 45, 210-20, 45); 
$pdf->Line(10, 87,140,87);

$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(25,55);
$pdf->Cell(20, 55,'DIPLOMA Enrollment No.',0,0,'C');
//diploma enrollment no 
$pdf->Line(60, 75,60,95);


$pdf->Cell(80, 55,'DIPLOMA Year of Passing',0,0,'C');
//year of passing
$pdf->Line(110, 75,110,95);

//CGPA
$pdf->Cell(-1, 55,'CGPA',0,0,'C');

// ACPC DETAILS
$pdf->Rect(10,97,130,20);
$pdf->Line(10,110,140,110);
$pdf->Line(40,97,40,117);

$pdf->SETXY(12,100);
$pdf->MultiCell(25,5,'ACPC Merit No.',0,'C');

$pdf->Line(70,97,70,117);
$pdf->SETXY(40,100);
$pdf->MultiCell(30,5,'ACPC Merit Marks',0,'C');

$pdf->SETXY(72,100);
$pdf->MultiCell(30,5,'ACPC Application No.',0,'C');

$pdf->SETXY(107,100);
$pdf->MultiCell(30,5,'Aadhar Card No.',0,'C',false);

$pdf->Line(105,97,105,117);


$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(20,87);
$pdf->Cell(250,10,$row['enrolno'],0,0,'L');
$pdf->SETXY(80,87);
$pdf->Cell(250,10,$row['dipyear'],0,0,'L');
$pdf->SETXY(120,87);
$pdf->Cell(250,10,$row['cgpa'],0,0,'L');

$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(18,110);
$pdf->Cell(250,10,$row['acpcmeritno'],0,0,'L');

$pdf->SETXY(48,110);
$pdf->Cell(250,10,$row['acpcmeritmarks'],0,0,'L');

$pdf->SETXY(78,110);
$pdf->Cell(250,10,$row['acpcappno'],0,0,'L');

$pdf->SETXY(108,110);
$pdf->Cell(250,10,$row['aadhar'],0,0,'L');

$pdf->Rect(150,75,40,40);
$pdf->SETXY(150,100);
$pdf->Cell(40,-10,"PHOTO",0,0,"C",false);




$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,120);
$pdf->Cell(230,10,'FULL NAME : ',0,0,'L'); 
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,120);
$pdf->Cell(250,10,strtoupper($row['surname']) ." ".strtoupper($row['name'])." ".strtoupper($row['fname']),0,0,'L'); 

//$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,130);
$pdf->Cell(250,10,'MOTHERS NAME : ',0,0,'L');
$pdf->SETXY(45,130);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['mname']),0,0,'L');


$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,140);
$pdf->Cell(250,10,'DOB : ',0,0,'L');
$pdf->SETXY(45,140);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,date('d/m/o',strtotime($row['dob'])),0,0,'L');

//$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(80,140);
$pdf->Cell(250,10,'GENDER : ',0,0,'L');
$pdf->SETXY(100,140);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['gender']),0,0,'L');

$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(125,140);
$pdf->Cell(250,10,'CATEGORY : ',0,0,'L');
$pdf->SETXY(150,140);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['category']),0,0,'L');

$pdf->SETXY(10,150);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'UNIVERSITY : ',0,0,'L');
$pdf->SETXY(45,150);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['university']),0,0,'L');


$pdf->SETXY(10,160);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'COLLEGE NAME : ',0,0,'L');
$pdf->SETXY(45,160);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['collegename']),0,0,'L');

$pdf->SETXY(10,170);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'ADDRESS : ',0,0,'L');
$pdf->SETXY(45,170);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtolower($row['address'])."-".$row['pincode'],0,0,'L');


$pdf->SETXY(10,180);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Email : ',0,0,'L');
$pdf->SETXY(45,180);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['email'],0,0,'L');

$pdf->SETXY(10,190);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Student Mobile No : ',0,0,'L');
$pdf->SETXY(45,190);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['smobno'],0,0,'L');

$pdf->SETXY(10,200);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Parents Mobile No : ',0,0,'L');
$pdf->SETXY(45,200);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['pmobno'],0,0,'L');


$pdf->Rect(80,190,60,60);
$pdf->Line(80,198,140,198);
//$pdf->Line(45,225,105,225);



$pdf->SETXY(92,190);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'DIPLOMA RESULT',0,0,'L');

//vertical line in a table 
$pdf->Line(100,198,100,250);
$pdf->Line(120,198,120,250);

//horizontal lines in  a table
$pdf->Line(80,206,140,206);
$pdf->SETXY(105,196);
$pdf->Cell(250,10,'SPI',0,0,'L');
$pdf->SETXY(123,196);
$pdf->Cell(250,10,'CPI',0,0,'L');

$pdf->Line(80,213,140,213);
$pdf->SETXY(80,205);
$pdf->Cell(45,10,'SEM-I',0,0,'L');
$pdf->SETXY(108,205);
$pdf->Cell(45,10,$row['spi1'],0,0,'L');
$pdf->SETXY(125,205);
$pdf->Cell(45,10,$row['cpi1'],0,0,'L');

$pdf->Line(80,220,140,220);
$pdf->SETXY(80,212);
$pdf->Cell(45,10,'SEM-II',0,0,'L');
$pdf->SETXY(108,212);
$pdf->Cell(45,10,$row['spi2'],0,0,'L');
$pdf->SETXY(125,212);
$pdf->Cell(45,10,$row['cpi2'],0,0,'L');

$pdf->Line(80,227,140,227);
$pdf->SETXY(80,219);
$pdf->Cell(45,10,'SEM-III',0,0,'L');
$pdf->SETXY(108,219);
$pdf->Cell(45,10,$row['spi3'],0,0,'L');
$pdf->SETXY(125,219);
$pdf->Cell(45,10,$row['cpi3'],0,0,'L');

$pdf->Line(80,234,140,234);
$pdf->SETXY(80,226);
$pdf->Cell(45,10,'SEM-IV',0,0,'L');
$pdf->SETXY(108,226);
$pdf->Cell(45,10,$row['spi4'],0,0,'L');
$pdf->SETXY(125,226);
$pdf->Cell(45,10,$row['cpi4'],0,0,'L');

$pdf->Line(80,241,140,241);
$pdf->SETXY(80,233);
$pdf->Cell(45,10,'SEM-V',0,0,'L');
$pdf->SETXY(108,233);
$pdf->Cell(45,10,$row['spi5'],0,0,'L');
$pdf->SETXY(125,233);
$pdf->Cell(45,10,$row['cpi5'],0,0,'L');

$pdf->SETXY(80,240);
$pdf->Cell(45,10,'SEM-VI',0,0,'L');
$pdf->SETXY(108,240);
$pdf->Cell(45,10,$row['spi6'],0,0,'L');
$pdf->SETXY(125,240);
$pdf->Cell(45,10,$row['cpi6'],0,0,'L');



$pdf->Rect(142,190,55,60);
$pdf->Line(142,198,197,198);
$pdf->SETXY(145,190);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'CURRENT BACKLOG COUNT',0,0,'L');

//vertical line of table
$pdf->Line(170,198,170,250);

// Horizontal line of a table
$pdf->Line(142,205,197,205);
$pdf->SETXY(147,198);
$pdf->Cell(45,10,'SEM-I',0,0,'L');
$pdf->SETXY(180,198);
$pdf->Cell(45,10,$row['back1'],0,0,'L');

$pdf->Line(142,212,197,212);
$pdf->SETXY(147,205);
$pdf->Cell(45,10,'SEM-II',0,0,'L');
$pdf->SETXY(180,205);
$pdf->Cell(45,10,$row['back2'],0,0,'L');

$pdf->Line(142,219,197,219);
$pdf->SETXY(147,212);
$pdf->Cell(45,10,'SEM-III',0,0,'L');
$pdf->SETXY(180,212);
$pdf->Cell(45,10,$row['back3'],0,0,'L');

$pdf->Line(142,226,197,226);
$pdf->SETXY(147,219);
$pdf->Cell(45,10,'SEM-IV',0,0,'L');
$pdf->SETXY(180,219);
$pdf->Cell(45,10,$row['back4'],0,0,'L');

$pdf->Line(142,233,197,233);
$pdf->SETXY(147,226);
$pdf->Cell(45,10,'SEM-V',0,0,'L');
$pdf->SETXY(180,226);
$pdf->Cell(45,10,$row['back5'],0,0,'L');

$pdf->Line(142,240,197,240);
$pdf->SETXY(147,233);
$pdf->Cell(45,10,'SEM-VI',0,0,'L');
$pdf->SETXY(180,233);
$pdf->Cell(45,10,$row['back6'],0,0,'L');

$pdf->SETXY(141,240);
$pdf->SetFont("Arial", "B", 9);
$pdf->Cell(45,10,'TOTAL BACKLOG',0,0,'L');
$pdf->SETXY(180,240);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(45,10,$totalBacklog,0,0,'L');



$pdf->SETXY(10,248);
$pdf->Cell(280,20,'Place: ',0,0,'L');
$pdf->SETXY(10,255);
$pdf->Cell(280,20,"Applicant's Sign: ",0,0,'L');
$pdf->SETXY(10,256);
$pdf->Cell(280,20,"Parent's Signature: ",0,0,'C');

$pdf->SETXY(0,0);
$pdf->Cell(320,10,'Date: '.date("d/m/Y h:i:s a", time()),0,0,'C');

/*

$pdf->Rect(115,125,45,50);
$pdf->SetFont("Arial", "BI", 12);
$pdf->SETXY(125,120);
$pdf->Cell(10,5,'12th RESULT',0,0,'L');


if($row['Eng'] == 0)
{
    $pdf->SetFont("Arial", "", 10);
    $pdf->SETXY(115,120);
    $pdf->Cell(10,20,'ENGLISH  ',0,0,'L');
    $pdf->SETXY(150,120);
    $pdf->Cell(10,20,"--",0,0,'L');
}else{
        $pdf->SetFont("Arial", "", 10);
    $pdf->SETXY(115,120);
    $pdf->Cell(10,20,'ENGLISH  ',0,0,'L');
    $pdf->SETXY(150,120);
    $pdf->Cell(10,20,$row['Eng'],0,0,'L');  
}



if($row['Maths'] == 0){
    $pdf->SETXY(115,125);
    $pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
    $pdf->SETXY(150,125);
    $pdf->Cell(10,20,"--",0,0,'L');

}else{
    $pdf->SETXY(115,125);
    $pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
    $pdf->SETXY(150,125);
    $pdf->Cell(10,20,$row['Maths'],0,0,'L');

}


if($row['Chem'] == 0){
    $pdf->SETXY(115,130);
    $pdf->Cell(10,20,'CHEMISTRY(TH)  ',0,0,'L');
    $pdf->SETXY(150,130);
    $pdf->Cell(10,20,"--",0,0,'L');

}else{
    $pdf->SETXY(115,130);
    $pdf->Cell(10,20,'CHEMISTRY(TH)  ',0,0,'L');
    $pdf->SETXY(150,130);
    $pdf->Cell(10,20,$row['Chem'],0,0,'L');
}


if($row['Chempr'] == 0){
    $pdf->SETXY(115,135);
    $pdf->Cell(10,20,'CHEMISTRY(PR)  ',0,0,'L');
    $pdf->SETXY(150,135);
    $pdf->Cell(10,20,"--",0,0,'L');

}else{
    $pdf->SETXY(115,135);
    $pdf->Cell(10,20,'CHEMISTRY(PR)  ',0,0,'L');
    $pdf->SETXY(150,135);
    $pdf->Cell(10,20,$row['Chempr'],0,0,'L');
}



if($row['Phy'] == 0){
    $pdf->SETXY(115,140);
    $pdf->Cell(10,20,'PHYSICS(TH)  ',0,0,'L');
    $pdf->SETXY(150,140);
    $pdf->Cell(10,20,"--",0,0,'L');
}else{
    $pdf->SETXY(115,140);
    $pdf->Cell(10,20,'PHYSICS(TH)  ',0,0,'L');
    $pdf->SETXY(150,140);
    $pdf->Cell(10,20,$row['Phy'],0,0,'L');
}

if($row['Phypr'] == 0){
    $pdf->SETXY(115,145);
    $pdf->Cell(10,20,'PHYSICS(PR)  ',0,0,'L');
    $pdf->SETXY(150,145);
    $pdf->Cell(10,20,"--",0,0,'L');
}else{
    $pdf->SETXY(115,145);
    $pdf->Cell(10,20,'PHYSICS(PR)  ',0,0,'L');
    $pdf->SETXY(150,145);
    $pdf->Cell(10,20,$row['Phypr'],0,0,'L');
}



if($row['Comp'] == 0){
    $pdf->SETXY(115,150);
    $pdf->Cell(10,20,'COMPUTER  ',0,0,'L');
    $pdf->SETXY(150,150);
    $pdf->Cell(10,20,"--",0,0,'L');
}else{
    $pdf->SETXY(115,150);
    $pdf->Cell(10,20,'COMPUTER  ',0,0,'L');
    $pdf->SETXY(150,150);
    $pdf->Cell(10,20,$row['Comp'],0,0,'L');
}


if($row['Comppr'] == 0){
    $pdf->SETXY(115,155);
    $pdf->Cell(10,20,'COMPUTER(PR)  ',0,0,'L');
    $pdf->SETXY(150,155);
    $pdf->Cell(10,20,"--",0,0,'L');
}else{
    $pdf->SETXY(115,155);
    $pdf->Cell(10,20,'COMPUTER(PR)  ',0,0,'L');
    $pdf->SETXY(150,155);
    $pdf->Cell(10,20,$row['Comppr'],0,0,'L');
}






$pdf->SetFont("Arial", "B", 10);
$pdf->Rect(115,175,45,8);

if($totalTH == 0){
    $pdf->SETXY(115,170);
    $pdf->Cell(10,20,'TOTAL ',0,0,'L');
    $pdf->SETXY(150,170);
    $pdf->Cell(10,20,"--",0,0,'L');

}else{
    $pdf->SETXY(115,170);
    $pdf->Cell(10,20,'TOTAL ',0,0,'L');
    $pdf->SETXY(150,170);
    $pdf->Cell(10,20,$totalTH,0,0,'L');
}

*/


$pdf->Output();
?>