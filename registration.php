<?php     //start php tag
//include connect.php page for database connection
include ('dbConnect.php');


$read = "SELECT * from student ORDER BY regno DESC LIMIT 1";

$result = mysqli_query($con, $read);

if ($result) {
    $fetch = mysqli_fetch_assoc($result);
    $lastregno = $fetch['regno'];

    if ($lastregno == null) {
        $newregno = "CKPCET0000";
    } else {
        $newregno = str_replace("CKPCET", "", $lastregno);

        $newregno = str_pad($newregno+1,4,0,STR_PAD_LEFT);
        $newregno="CKPCET".$newregno;
    }

} else {
    echo "<script>alert('Server down')</script>";
}


//if submit is not blanked i.e. it is clicked.
if (isset($_POST['register'])) {
    $regno = mysqli_real_escape_string($con,$_POST['regno']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $board = mysqli_real_escape_string($con, $_POST['board']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $sname = mysqli_real_escape_string($con, $_POST['schoolname']);
    $hseatno = mysqli_real_escape_string($con, $_POST['hseatno']);
    $hpassing = mysqli_real_escape_string($con, $_POST['hpassing']);
    $gujappno = mysqli_real_escape_string($con, $_POST['gujappno']);
    $gujseatno = mysqli_real_escape_string($con, $_POST['gujseatno']);
    $maths = mysqli_real_escape_string($con, (int) $_POST['Maths']);
    $gujmaths = mysqli_real_escape_string($con, (int) $_POST['Guj_Maths']);
    $chem = mysqli_real_escape_string($con, (int) $_POST['Chem']);
    $gujchem = mysqli_real_escape_string($con, (int) $_POST['Guj_Chem']);
    $phy = mysqli_real_escape_string($con, (int) $_POST['Phy']);
    $gujphy = mysqli_real_escape_string($con, (int) $_POST['Guj_Phy']);
    $eng = mysqli_real_escape_string($con, (int) $_POST['Eng']);
    $chempr = mysqli_real_escape_string($con, (int) $_POST['Chempr']);
    $aggregate = mysqli_real_escape_string($con, (float) $_POST['aggregate']);
    $phypr = mysqli_real_escape_string($con, (int) $_POST['Phypr']);
    $pcm = mysqli_real_escape_string($con, (float) $_POST['pcm']);
    $comp = mysqli_real_escape_string($con, (int) $_POST['Comp']);
    $gujper = mysqli_real_escape_string($con, (float) $_POST['gujper']);
    $comppr = mysqli_real_escape_string($con, (int) $_POST['Comppr']);

    $address = mysqli_real_escape_string($con, $_POST['address']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $smobno = mysqli_real_escape_string($con, $_POST['smobno']);
    $pmobno = mysqli_real_escape_string($con, $_POST['pmobno']);
    $check = mysqli_real_escape_string($con, $_POST['check']);


    // database insert SQL code
    $sql = "INSERT INTO student (studid,surname,name,fname,mname,gender,board,category,dob,regno,course,schoolname,hseatno,hpassing,gujappno,gujseatno,Maths,Guj_Maths,Chem,Guj_Chem,Phy,Guj_Phy,Eng,Chempr,average,Phypr,pcm,Comp,gujper,Comppr,address,pincode,email,smobno,pmobno,declared) VALUES (0,'$surname', '$name', '$fname', '$mname','$gender','$board','$category','$dob','$regno','$course','$sname','$hseatno','$hpassing','$gujappno','$gujseatno','$maths','$gujmaths','$chem','$gujchem','$phy','$gujphy','$eng','$chempr','$aggregate','$phypr','$pcm','$comp','$gujper','$comppr','$address','$pincode','$email','$smobno','$pmobno','$check')";

    // insert into database 
    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo '<script language="javascript">';
        //echo "alert('Your Registration Number is:'+'$regno')";
        echo '</script>';
        header("location:generatePDF.php?id=" . $regno);
    }
}
?>