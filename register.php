<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="style.css" />
    
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />

    <script src="./script.js" type="text/javascript"></script>
    <style>
        body{ font: 14px sans-serif; text-align: right; }
    </style>
  </head>

  <body>
  <h3 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to CKPCET. <label><a href="logout.php" />Logout</a></label></h3>
    <!--div class="wrapperckp">
      C K Pithawala College of Engineering and Technology, SURAT
    </div-->

    <div class="wrapper">
      <div class="title" text-align="center">
        <h5>STUDENT REGISTRATION FORM </h5>
      </div>
      <form method="POST" action="registration.php" data-netlify="true">
        <div class="form">
          <div class="inputfield">
            <label>Surname</label>
            <input
              type="text"
              class="input"
              id="name"
              name="surname"
              placeholder="Enter Surname"
              maxlength="30"
              pattern="[A-Za-z]{1,32}"
              title="Enter only alphabets"
              required
            />
          </div>

          <div class="inputfield">
            <label>Name</label>
            <input
              type="text"
              class="input"
              id="name"
              name="name"
              placeholder="Enter Name"
              maxlength="30"
              pattern="[A-Za-z]{1,32}"
              title="Enter only alphabets"
              required
            />
          </div>

          <div class="inputfield">
            <label>Father's Name</label>
            <input
              type="text"
              class="input"
              id="name"
              name="fname"
              placeholder="Enter Father's Name"
              maxlength="30"
              pattern="[A-Za-z]{1,32}"
              title="Enter only alphabets"
              required
            />
          </div>

          <div class="inputfield">
            <label>Mother's Name</label>
            <input
              type="text"
              class="input"
              id="name"
              name="mname"
              placeholder="Enter Mother's Name"
              maxlength="30"
              pattern="[A-Za-z]{1,32}"
              title="Enter only alphabets"
              required
            />
          </div>

          <div class="inputfield" id="gender">
            <label for="">Gender</label>
            <input type="radio" name="gender" id="radio" value="Male" required/>Male
            <input type="radio" name="gender" id="radio" value="Female" required />Female
          </div>

          <div class="inputfield" id="board">
            <label for="">Board from which 12th Examination Passed:</label>
            <input type="radio" value="GSEB" id="radio" name="board" checked />
            GSEB
            <input type="radio" value="CBSE" id="radio" name="board" /> CBSE
            <input type="radio" value="ICSE" id="radio" name="board" /> ISCE
            <input type="radio" value="Other" id="radio" name="board" /> Other
          </div>

          <div class="inputfield" id="category">
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
          </div>

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

          <p id="message"></p>

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
            <label>School Name:</label>
            <input
              type="text"
              class="input"
              id="name"
              name="schoolname"
              placeholder="Enter School Name"
              maxlength="100"
              pattern="[a-zA-Z][a-zA-Z0-9\s]*"
              title="Enter only alphabets and spaces"
              required
            />
          </div>
          <div class="inputfield">
            <table>
              <tr>
                  <tr>
                    <td><label>H.S.C Seat No</label></td>
                    <td>
                      <input
                        type="text"
                        class="inputhsc"
                        placeholder="HSC Seat No"
                        name="hseatno"
                        required
                      />
                    </td>
                    <td><label>H.S.C Year of Passing</label></td>
                    <td>
                      <input
                        type="text"
                        class="inputgujcet"
                        placeholder="Passing Year"
                        name="hpassing"
                        required
                      />
                    </td>
                </tr>
              </tr>  
              <tr>
                <tr>
                  <td><label>GUJCET Application No.</label></td>
                  <td>
                    <input
                      type="text"
                      class="inputgujcet"
                      placeholder="GUJCET App No"
                      name="gujappno"
                      required
                    />
                  </td>
                  <td><label>GUJCET Seat No.</label></td>
                  <td>
                    <input
                      type="text"
                      class="inputgujcet"
                      placeholder="GUJCET Seat No"
                      name="gujseatno"
                      required
                    />
                  </td>
              </tr>
            </tr>          
            </table>
          </div>

          <div class="inputfield">
            <table>
              <tr>
                <td text-align="center">
                  <b><label>SUBJECTS</label></b>
                </td>
                <td text-align="center">
                  <b><label>12th Marks</label></b>
                </td>
                <td text-align="center">
                  <b><label>GUJCET Marks</label></b>
                </td>
              </tr>

              <tr>
                <td><label>MATHSEMATICS</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Maths"
                    maxlength="3"
                  />
                </td>
            
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Guj_Maths"
                    maxlength="3"
                  />
                </td>
              </tr>

              <tr>
                <td><label>CHEMISTRY(Theory)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Chem"
                    maxlength="3"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Guj_Chem"
                    maxlength="3"
                  />
                </td>
              </tr>
              <tr>
                <td><label>PHYSICS(Theory)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Phy"
                    maxlength="3"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Guj_Phy"
                    maxlength="3"
                  />
                </td>
              </tr>
              <tr>
                <td><label>ENGLISH</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Eng"
                    maxlength="3"
                  />
                </td>
              </tr>
              <tr>
                <td><label>CHEMISTRY(Practical)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Chempr"
                    maxlength="3"
                  />
                </td>


                <td><label>Aggregate % of 12th</label></td> 
                <td>
                  <input
                    type="text"
                    class="inputhsc"
                    name="aggregate"
                    
                  />
                </td>
              </tr>
              <tr>
                <td><label>PHYSICS(Practical)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Phypr"
                    maxlength="3"
                  />
                </td>
                
                <td><label>PCM Percentile</label></td> 
                <td>
                  <input
                    type="text"
                    class="inputhsc"
                    name="pcm"
                    
                  />
                </td>
                
              </tr>
              <tr>
                <td><label>COMPUTER(Theory)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Comp"
                    maxlength="3"
                  />
                </td>
                <td><label>GUJCET Percentile</label></td> 
                <td>
                  <input
                    type="text"
                    class="inputhsc"
                    name="gujper"
                    
                  />
                </td>
              </tr>
              <tr>
                <td><label>COMPUTER(Practical)</label></td>
                <td>
                  <input
                    type="text"
                    class="input1"
                    name="Comppr"
                    maxlength="3"
                  />
                </td>
              </tr>
            </table>
          </div>

          <div class="inputfield">
            <label>Address</label>
            <textarea
              class="textarea"
              name="address"
              id=""
              cols="30"
              rows="5"
              placeholder="Enter your address"
              pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$"
              maxlength="100"
              
            ></textarea>
          </div>

          <div class="inputfield">
            <label>Pin Code</label>
            <input
              type="text"
              class="input"
              name="pincode"
              placeholder="Enter your pin code"
              maxlength="6"
              pattern="^[0-9]{6}$"
              
            />
          </div>

          <div class="inputfield">
            <label>Email Address</label>
            <input
              type="email"
              class="input"
              name="email"
              placeholder="Enter your email"
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
              
            />
          </div>

          <div class="inputfield">
            <label for="">Student Mobile Number</label>
            <div class="custom-select" id="phone-codes">
              <select id="phone-code">
                <option value="+91">+91</option>
              </select>
            </div>
            <input
              type="tel"
              class="input"
              name="smobno"
              maxlength="10"
              id="phone-number"
              placeholder="Enter Student phone number"
              pattern="[7-9]{1}[0-9]{9}"
              title="Please enter valid phone number"
              required
            />
          </div>

          <div class="inputfield">
            <label for="">Parents Mobile Number</label>
            <div class="custom-select" id="phone-codes">
              <select id="phone-code">
                <option value="+91">+91</option>
              </select>
            </div>
            <input
              type="tel"
              class="input"
              name="pmobno"
              maxlength="10"
              id="phone-number"
              placeholder="Enter Parents phone number"
              pattern="[7-9]{1}[0-9]{9}"
              title="Please enter valid phone number"
              required
            />
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
            <button
              type="submit"
              value="Register"
              class="btn" 
              name="register"          
            >
              Register
            </button>
            <button type="reset" value="Reset" class="btn">Reset</button>
          </div>
        </div>
      </form>
    </div>
    </div>
 </body>
</html>

