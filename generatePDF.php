<?php
require("./fpdf/fpdf.php");

include("dbConnect.php");




$sql = mysqli_query($con, "select * from student where regno = '".$_GET['id']."' ");
if (mysqli_num_rows($sql)) {
 $row = mysqli_fetch_assoc($sql);
}



$totalTH = $row['Maths'] + $row['Chem'] +$row['Phy'] +$row['Comp'] +$row['Eng'];
$totalTHPR = $row['Maths'] + $row['Chem'] +$row['Phy'] +$row['Comp'] +$row['Eng'] + $row['Chempr'] + $row['Phypr'] +$row['Comppr'];

$pcm = (float)($row['Maths'] + $row['Chem'] +$row['Phy']+$row['Chempr'] + $row['Phypr'])/400;
$pmco =round((float)($row['Maths'] + $row['Chem'] +$row['Phy'] + $row['Comp'] + $row['Comppr'])/300,2);

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

$pdf->Line(20, 45, 210-20, 45); // 20mm from each edge
$pdf->Line(50, 45, 210-50, 45);

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
$pdf->SETXY(12,60);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(250,10,strtoupper($row['course']),0,0,'L');




$pdf->SETXY(70,100);
$pdf->SetFont("Arial", "BIU", 15);
$pdf->Cell(70, -90,'Student Registration Details',0,0,'C');
//$pdf->Ln(20);
$pdf->SetFont("Arial", "B", 12);
//$pdf->setFillColor(230,230,230);

$pdf->Cell(-70,-70,'REGISTRATION NUMBER : '.$row['regno'],0,0,'C',false);
//$pdf->SETXY(150,50);
//$pdf->Cell(40, 30,'FORM NO',0,1,'C');

$pdf->SETXY(10,100);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(230,-50,'FULL NAME : ',0,0,'L'); 
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,70);
$pdf->Cell(250,10,strtoupper($row['surname']) ." ".strtoupper($row['name'])." ".strtoupper($row['fname']),0,0,'L'); 

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'MOTHERS NAME : ',0,0,'L');
$pdf->SETXY(45,80);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['mname']),0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'GENDER : ',0,0,'L');
$pdf->SETXY(45,90);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['gender']),0,0,'L');

$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(80,90);
$pdf->Cell(250,10,'DOB : ',0,0,'L');
$pdf->SETXY(90,90);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,date('d/m/o',strtotime($row['dob'])),0,0,'L');


$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'BOARD : ',0,0,'L');
$pdf->SETXY(45,100);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['board']),0,0,'L');


//$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(80,100);
$pdf->Cell(250,10,'CATEGORY : ',0,0,'L');
$pdf->SETXY(105,100);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,strtoupper($row['category']),0,0,'L');

//$pdf->Ln(10); 



$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'SCHOOL NAME : ',0,0,'L');
$pdf->SETXY(45,112);
$pdf->SetFont("Arial", "", 10);
//$pdf->Cell(250,10,strtoupper($row['schoolname']),0,0,'L');

$pdf->MultiCell(80,5,strtoupper($row['schoolname']),0,'L');


//$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,120);
$pdf->Cell(250,10,'H.S.C Seat No : ',0,0,'L');
$pdf->SETXY(45,120);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['hseatno'],0,0,'L');


$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'H.S.C passing Year: ',0,0,'L');
$pdf->SETXY(45,130);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['hpassing'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'GUJCET Appl No : ',0,0,'L');
$pdf->SETXY(45,140);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['gujappno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,150);
$pdf->Cell(250,10,'GUJCET Seat No : ',0,0,'L');
$pdf->SETXY(45,150);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['gujseatno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'ADDRESS : ',0,0,'L');
$pdf->SETXY(45,160);
$pdf->SetFont("Arial", "", 10);
$pdf->MultiCell(75,5,strtolower($row['address'])."-".$row['pincode'],0,'L');

$pdf->Ln(10); 
$pdf->SETXY(10,170);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Email : ',0,0,'L');
$pdf->SETXY(45,170);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['email'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Student Mobile No : ',0,0,'L');
$pdf->SETXY(45,180);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['smobno'],0,0,'L');

$pdf->Ln(10); 
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(250,10,'Parents Mobile No : ',0,0,'L');
$pdf->SETXY(45,190);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(250,10,$row['pmobno'],0,0,'L');


//$pdf->Ln(36); 
$pdf->SETXY(15,255);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10,0,'Declaration: ',0,0,'L',false);
$pdf->Cell(10,20,'I hereby declare that the above information provided is true and correct.',0,0,'L',false);

$pdf->Rect(150,250,40,10);
$pdf->Cell(280,20,'Signature',0,0,'C');

$pdf->Rect(150,75,40,40);
$pdf->SETXY(150,100);
$pdf->Cell(40,-10,"PHOTO",0,0,"C",false);



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




$pdf->Rect(160,125,45,30);


$pdf->SetFont("Arial", "BI", 12);
$pdf->SETXY(165,120);
$pdf->Cell(10,5,'GUJCET RESULT',0,0,'L');


if($row['Guj_Phy'] == 0){
    $pdf->SetFont("Arial", "", 10);
    $pdf->SETXY(160,120);
    $pdf->Cell(10,20,'PHYSICS  ',0,0,'L');
    $pdf->SETXY(195,120);
    $pdf->Cell(15,20,"--",0,0,'L');
    
}else{
    $pdf->SetFont("Arial", "", 10);
    $pdf->SETXY(160,120);
    $pdf->Cell(10,20,'PHYSICS  ',0,0,'L');
    $pdf->SETXY(195,120);
    $pdf->Cell(15,20,$row['Guj_Phy'],0,0,'L');
}


if($row['Guj_Chem'] == 0){
    $pdf->SETXY(160,125);
    $pdf->Cell(10,20,'CHEMISTRY  ',0,0,'L');
    $pdf->SETXY(195,125);
    $pdf->Cell(15,20,"--",0,0,'L');
}else{
    $pdf->SETXY(160,125);
    $pdf->Cell(10,20,'CHEMISTRY  ',0,0,'L');
    $pdf->SETXY(195,125);
    $pdf->Cell(15,20,$row['Guj_Chem'],0,0,'L');
}


if($row['Guj_Maths'] == 0){
    $pdf->SETXY(160,130);
    $pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
    $pdf->SETXY(195,130);
    $pdf->Cell(15,20,"--",0,0,'L');
}else{
    $pdf->SETXY(160,130);
    $pdf->Cell(10,20,'MATHEMATICS  ',0,0,'L');
    $pdf->SETXY(195,130);
    $pdf->Cell(15,20,$row['Guj_Maths'],0,0,'L');
}



$pdf->SETXY(110,200);
$pdf->Rect(160,165,40,8);


$pdf->SETXY(120,119);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(100,100,"PCM",0,0,"C",false);
$pdf->SETXY(180,167);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(10,5,$pcm,0,0,'R');


$pdf->SETXY(110,200);
$pdf->Rect(160,175,40,8);
$pdf->SETXY(120,129);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(100,100,"PMCO",0,0,"C",false);
$pdf->SETXY(180,177);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(10,5,$pmco,0,0,'R');



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
$pdf->Cell(10,5,$row['pcm'],0,0,'R');

$pdf->Rect(170,220,25,10);


$pdf->Rect(115,230,50,10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SETXY(115,232);
$pdf->Cell(10,5,'GUJCET Percentile',0,0,'L');
$pdf->SETXY(175,232);
$pdf->Cell(10,5,$row['gujper'],0,0,'R');

$pdf->Rect(170,230,25,10);


$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,200);
$pdf->Cell(250,10,'ACPC Merit No : ',0,0,'L');
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,202);
$pdf->Cell(10,5,$row['acpcmeritno'],0,0,'L');

$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,210);
$pdf->Cell(250,10,'ACPC Merit Marks : ',0,0,'L');
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,212);
$pdf->Cell(10,5,$row['acpcmeritmarks'],0,0,'L');


$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,220);
$pdf->Cell(250,10,'ACPC App No : ',0,0,'L');
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,222);
$pdf->Cell(10,5,$row['acpcappno'],0,0,'L');

$pdf->SetFont("Arial", "B", 10);
$pdf->SETXY(10,230);
$pdf->Cell(250,10,'Aadhar Card No : ',0,0,'L');
$pdf->SetFont("Arial", "", 10);
$pdf->SETXY(45,232);
$pdf->Cell(10,5,$row['aadhar'],0,0,'L   ');






$pdf->Output();
?>