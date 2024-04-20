<?php     //start php tag
//include connect.php page for database connection
include ('dbConnect.php');


$read = "SELECT * from dipstudent ORDER BY regno DESC LIMIT 1";

$result = mysqli_query($con, $read);

if ($result) {
  $fetch = mysqli_fetch_assoc($result);
  $lastregno = $fetch['regno'];

  if ($lastregno == null) {
    $newregno = "CKPCETD2D0001";
  } else {
    $newregno = str_replace("CKPCETD2D", "", $lastregno);

    $newregno = str_pad($newregno + 1, 4, 0, STR_PAD_LEFT);
    $newregno = "CKPCETD2D" . $newregno;
  }

} else {
  echo "<script>alert('Server down')</script>";
}


//if submit is not blanked i.e. it is clicked.
if (isset($_POST['register'])) {

  $regno = $newregno;
  $surname = mysqli_real_escape_string($con, $_POST['surname']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $mname = mysqli_real_escape_string($con, $_POST['mname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $university = mysqli_real_escape_string($con, $_POST['uname']);
  $category = mysqli_real_escape_string($con, $_POST['category']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $course = mysqli_real_escape_string($con, $_POST['course']);
  $collegename = mysqli_real_escape_string($con, $_POST['collegename']);

  $cpi1 = mysqli_real_escape_string($con, (int) $_POST['cpi1']);
  $cpi2 = mysqli_real_escape_string($con, (int) $_POST['cpi2']);
  $cpi3 = mysqli_real_escape_string($con, (int) $_POST['cpi3']);
  $cpi4 = mysqli_real_escape_string($con, (int) $_POST['cpi4']);
  $cpi5 = mysqli_real_escape_string($con, (int) $_POST['cpi5']);
  $cpi6 = mysqli_real_escape_string($con, (int) $_POST['cpi6']);

  $spi1 = mysqli_real_escape_string($con, (int) $_POST['spi1']);
  $spi2 = mysqli_real_escape_string($con, (int) $_POST['spi2']);
  $spi3 = mysqli_real_escape_string($con, (int) $_POST['spi3']);
  $spi4 = mysqli_real_escape_string($con, (int) $_POST['spi4']);
  $spi5 = mysqli_real_escape_string($con, (int) $_POST['spi5']);
  $spi6 = mysqli_real_escape_string($con, (int) $_POST['spi6']);

  // $sem2 = mysqli_real_escape_string($con, (int) $_POST['Chem']);
  // $gujchem = mysqli_real_escape_string($con, (int) $_POST['Guj_Chem']);
  // $phy = mysqli_real_escape_string($con, (int) $_POST['Phy']);
  // $gujphy = mysqli_real_escape_string($con, (int) $_POST['Guj_Phy']);
  // $eng = mysqli_real_escape_string($con, (int) $_POST['Eng']);
  // $chempr = mysqli_real_escape_string($con, (int) $_POST['Chempr']);
  // $aggregate = mysqli_real_escape_string($con, (float) $_POST['aggregate']);
  // $phypr = mysqli_real_escape_string($con, (int) $_POST['Phypr']);
  // $pcm = mysqli_real_escape_string($con, (float) $_POST['pcm']);
  // $comp = mysqli_real_escape_string($con, (int) $_POST['Comp']);
  // $gujper = mysqli_real_escape_string($con, (float) $_POST['gujper']);
  // $comppr = mysqli_real_escape_string($con, (int) $_POST['Comppr']);

  $address = mysqli_real_escape_string($con, $_POST['address']);
  $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $smobno = mysqli_real_escape_string($con, $_POST['smobno']);
  $pmobno = mysqli_real_escape_string($con, $_POST['pmobno']);
  $check = mysqli_real_escape_string($con, $_POST['check']);

  $acpcmeritno = mysqli_real_escape_string($con, $_POST['acpcmeritno']);
  $acpcmeritmarks = mysqli_real_escape_string($con, (float)$_POST['acpcmeritmarks']);
  $acpcappno = mysqli_real_escape_string($con, $_POST['acpcappno']);
  $aadhar = mysqli_real_escape_string($con, $_POST['aadhar']);

  $enrolno = mysqli_real_escape_string($con, $_POST['enrolno']);
  $dipyear = mysqli_real_escape_string($con, $_POST['dipyear']);
  $cgpa = mysqli_real_escape_string($con, $_POST['cgpa']);
  $back1 = mysqli_real_escape_string($con, (int)$_POST['back1']);
  $back2 = mysqli_real_escape_string($con, (int)$_POST['back2']);
  $back3 = mysqli_real_escape_string($con, (int)$_POST['back3']);
  $back4 = mysqli_real_escape_string($con, (int)$_POST['back4']);
  $back5 = mysqli_real_escape_string($con, (int)$_POST['back5']);
  $back6 = mysqli_real_escape_string($con, (int)$_POST['back6']);


  // database insert SQL code
  $sql = "INSERT INTO dipstudent (surname,name,fname,mname,gender,university,category,dob,regno,course,collegename,spi1,spi2,spi3,spi4,spi5,spi6,cpi1,cpi2,cpi3,cpi4,cpi5,cpi6,address,pincode,email,smobno,pmobno,declared,acpcmeritno,acpcmeritmarks,acpcappno,aadhar,enrolno,dipyear,cgpa,back1,back2,back3,back4,back5,back6) VALUES 
  ('$surname', '$name', '$fname', '$mname','$gender','$university','$category','$dob','$regno','$course','$collegename','$spi1','$spi2','$spi3','$spi4','$spi5','$spi6','$cpi1','$cpi2','$cpi3','$cpi4','$cpi5','$cpi6','$address','$pincode','$email','$smobno','$pmobno','$check','$acpcmeritno','$acpcmeritmarks','$acpcappno','$aadhar','$enrolno','$dipyear','$cgpa','$back1','$back2','$back3','$back4','$back5','$back6')";

  // insert into database 
  $rs = mysqli_query($con, $sql);

  if ($rs) {
    echo '<script language="javascript">';
    echo "alert('Your Registration Number is:'+'$newregno')";
    //echo "window.location.href='welcome.php'";
    echo '</script>';

    //header("location:generatePDF.php?id=".$newregno);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>D2D Student Registration Form</title>
  <link rel="stylesheet" href="style.css" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
</head>

<style>
 a {
  color: white;
  text-decoration: none;
}
</style>

<body>

  <!--div class="wrapperckp">
      C K Pithawala College of Engineering and Technology, SURAT
    </div-->

  <div class="wrapper">
    <div class="title" text-align="center">
      <h5>D2D STUDENT REGISTRATION FORM </h5>
    </div>
    <form method="POST" action="" data-netlify="true">
      <div class="form">

      <div class="inputfield">
          <label>Diploma Enroll. No.</label>
          <input type="text" class="input" id="aadhar" name="enrolno" placeholder="Diploma Enrollment Number" maxlength="12">
        </div>
        <div class="inputfield">
          <table>
            <tr>
              <tr>
                <td><label>Diploma Passing Year</label></td>
                <td>
                  <input type="text" class="inputhsc" placeholder="Passing Year" name="dipyear" />
                </td>
                <td><label>CGPA</label></td>
                <td>
                  <input type="text" class="inputhsc" placeholder="CGPA obtained" name="cgpa" />
                </td>
              </tr>
              <tr>
                <td><label>ACPC Merit No</label></td>
                <td>
                  <input type="text" class="inputhsc" placeholder="ACPC Merit No" name="acpcmeritno" />
                </td>
                <td><label>ACPC Merit Marks</label></td>
                <td>
                  <input type="text" class="inputhsc" placeholder="ACPC Merit Marks" name="acpcmeritmarks" />
                </td>
              </tr>
              <tr>
                <tr>
                  <td><label>ACPC Application No.</label></td>
                  <td>
                    <input type="text" class="inputhsc" placeholder="ACPC App No" name="acpcappno" />
                  </td>
                </tr>
            </tr>
          </table>
        </div>

        <div class="inputfield">
          <label>Aadhar Card No</label>
          <input type="text" class="inputhsc" id="aadhar" name="aadhar" placeholder="Aadhar Number" maxlength="12">
        </div>

        <!--div class="inputfield">
            <label>Registration No</label>
            <input
              type="text"
              class="inputhsc"
              id="regno"
              name="regno"
              readonly ="readonly"
              placeholder=<?php echo $newregno; ?>             
            >
          </div-->
        <div class="inputfield">
          <label>Surname</label>
          <input type="text" class="input" id="name" name="surname" placeholder="Enter Surname" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required />
        </div>

        <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" id="name" name="name" placeholder="Enter Name" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required />
        </div>

        <div class="inputfield">
          <label>Father's Name</label>
          <input type="text" class="input" id="name" name="fname" placeholder="Enter Father's Name" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required />
        </div>

        <div class="inputfield">
          <label>Mother's Name</label>
          <input type="text" class="input" id="name" name="mname" placeholder="Enter Mother's Name" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required />
        </div>

        <div class="inputfield" id="gender">
          <label for="">Gender</label>
          <input type="radio" name="gender" id="radio" value="Male" required />Male
          <input type="radio" name="gender" id="radio" value="Female" required />Female
        </div>

        <!--div class="inputfield" id="board">
            <label for="">Board from which 12th Examination Passed:</label>
            <input type="radio" value="GSEB" id="radio" name="board" checked />
            GSEB
            <input type="radio" value="CBSE" id="radio" name="board" /> CBSE
            <input type="radio" value="ICSE" id="radio" name="board" /> ISCE
            <input type="radio" value="Other  " id="radio" name="board" /> Other
          </div-->

          <div class="inputfield">
          <label>University Name</label>
          <input type="text" class="input" id="uname" name="uname" placeholder="Enter University Name" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required />
        </div>



        <div class="inputfield">
          <label>Category</label>
          <div class="custom_select">
            <select id="category" name="category" required>
              <option value="">--Select your choice--</option>
              <option value="GEN">GEN</option>
              <option value="EWS">EWS</option>
              <option value="SEBC">SEBC</option>
              <option value="SC">SC</option>
              <option value="ST">ST</option>
              <option value="OTHER">Other</option>
            </select>
          </div>
        </div>



        <!--div class="inputfield" id="category">
            <label for="">Category:</label>
            <input
              type="radio"
              value="GEN"
              id="radio"
              name="category"
              checked
            />
            GEN
            <input type="radio" value="GEN-EWS" id="radio" name="category" />
            EWS
            <input type="radio" value="SEBC" id="radio" name="category" /> SEBC
            <input type="radio" value="SC" id="radio" name="category" /> SC
            <input type="radio" value="ST" id="radio" name="category" /> ST
            <input type="radio" value="Other" id="radio" name="category " />
            Other
          </div-->

        <!--div class="inputfield">
          <label for="">Age</label>
          <input type="text" class="input" name="age" placeholder="Enter your age" maxlength="2" pattern="^[0-9]{2}$"
            required placeholder="Enter your age" title="Enter numbers only">
        </div-->

        <div class="inputfield">
          <label for="">Date of Birth</label>
          <input type="date" class="input" name="dob" required />
        </div>

        <!--div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" id="password" name="" placeholder="Enter your password min 8 characters"
            autocomplete="off" onkeyup='check()' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            maxlength="100" minlength="8" required>
        </div>

        <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" onkeyup='check()' class="input" id="confirm-password" name=""
            placeholder="Confirm password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            maxlength="100" minlength="8" required>
        </div-->

        <!--p id="message"></p-->

        <div class="inputfield">
          <label>Choice of Course</label>
          <div class="custom_select">
            <select id="course" name="course" required>
              <option value="">--Select your choice--</option>
              <option value="Computer">Computer</option>
              <option value="IT">IT</option>
              <option value="Civil">Civil</option>
              <option value="Electrical">Electrical</option>
              <option value="Mechanical">Mechanical</option>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>College Name:</label>
          <input type="text" class="input" id="collegename" name="collegename" placeholder="Enter College Name" maxlength="100"
            pattern="[a-zA-Z][a-zA-Z0-9\s]*" title="Enter only alphabets and spaces" required />
        </div>
        <!--div class="inputfield">
          <table>
            <tr>
            <tr>
              <td><label>H.S.C Seat No</label></td>
              <td>
                <input type="text" class="inputhsc" placeholder="HSC Seat No" name="hseatno" required />
              </td>
              <td><label>H.S.C Year of Passing</label></td>
              <td>
                <input type="text" class="inputhsc" placeholder="Passing Year" name="hpassing" required />
              </td>
            </tr>
            </tr>
            <tr>
            <tr>
              <td><label>GUJCET Application No.</label></td>
              <td>
                <input type="text" class="inputhsc" placeholder="GUJCET App No" name="gujappno" required />
              </td>
              <td><label>GUJCET Seat No.</label></td>
              <td>
                <input type="text" class="inputhsc" placeholder="GUJCET Seat No" name="gujseatno" required />
              </td>
            </tr>
            </tr>
          </table>
        </div-->

        <div class="inputfield">
          <table>
            <tr>
              <td text-align="center">
                <b><label>SEMESTER</label></b>
              </td>
              <td text-align="center">
                <b><label>SPI</label></b>
              </td>
              <td text-align="center">
                <b><label>CPI</label></b>
              </td>
              <td text-align="center">
                <b><label>BACKLOG COUNT</label></b>
              </td>
            </tr>
            <tr>
              <td><label>SEM I</label></td>
              <td>
                <input type="text" class="input1" name="spi1" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi1" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back1" maxlength="4" />
              </td>
            </tr>

            <tr>
              <td><label>SEM II</label></td>
              <td>
                <input type="text" class="input1" name="spi2" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi2" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back2" maxlength="4" />
              </td>
            </tr>
            <tr>
              <td><label>SEM III</label></td>
              <td>
                <input type="text" class="input1" name="spi3" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi3" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back3" maxlength="4" />
              </td>
            </tr>
            <tr>
              <td><label>SEM IV</label></td>
              <td>
                <input type="text" class="input1" name="spi4" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi4" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back4" maxlength="4" />
              </td>
            </tr>
            <tr>
              <td><label>SEM V</label></td>
              <td>
                <input type="text" class="input1" name="spi5" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi5" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back5" maxlength="4" />
              </td>
            </tr>
            <tr>
              <td><label>SEM VI</label></td>
              <td>
                <input type="text" class="input1" name="spi6" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="cpi6" maxlength="4" />
              </td>
              <td>
                <input type="text" class="input1" name="back6" maxlength="4" />
              </td>
            </tr>
          </table>
        </div>

        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" id="" cols="30" rows="5" placeholder="Enter your address"
            pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100"></textarea>
        </div>

        <div class="inputfield">
          <label>Pin Code</label>
          <input type="text" class="input" name="pincode" placeholder="Enter your pin code" maxlength="6"
            pattern="^[0-9]{6}$" />
        </div>

        <div class="inputfield">
          <label>Email Address</label>
          <input type="email" class="input" name="email" placeholder="Enter your email"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" />
        </div>

        <div class="inputfield">
          <label for="">Student Mobile Number</label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code">
              <option value="+91">+91</option>
            </select>
          </div>
          <input type="tel" class="input" name="smobno" maxlength="10" id="phone-number"
            placeholder="Enter Student phone number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number"
            required />
        </div>

        <div class="inputfield">
          <label for="">Parents Mobile Number</label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code">
              <option value="+91">+91</option>
            </select>
          </div>
          <input type="tel" class="input" name="pmobno" maxlength="10" id="phone-number"
            placeholder="Enter Parents phone number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number"
            required />
        </div>

        <!--div class="inputfield">
            <label>Upload Photo</label>
            <p id="file-size">*Max size 100kb.</p>
            <input
              type="file"
              name="myfile"
              id="myfile"
              placeholder="Upload your photo"
              rows="7"
              required
            />
          </div-->

        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" name="check" value="Declared" required />
            <span class="checkmark"></span>
          </label>
          <p>
            I hereby declare that the above information provided is true and
            correct.
          </p>
        </div>

        <div class="inputfield" required>
          <div data-netlify-recaptcha="true"></div>
        </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" value="Register" class="btn" name="register">
            Register
          </button>

          <button type="reset" value="Reset" class="btn">Reset</button>

          <button type="submit" class="btn"><a href="welcome.php">Records</a></button>
        </div>
      </div>
    </form>
  </div>
  </div>
</body>

</html>