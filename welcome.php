<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }

        .custom {
                    width: 200px !important;
                }
    </style>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    <div class="wrapper">
        <h2 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to CKPCET.</h2>
        <p>
            <a href="reset-password.php" class="btn btn-warning custom ml-3 ">Reset Your Password</a>
            <a href="register.php" class="btn btn-warning custom ml-3 ">Student Registration</a>
        </p>
        <p>
            <a href="logout.php" class="btn btn-danger custom ml-3-">Sign Out </a>     
            <a href="display.php" class="btn btn-primary custom ml-3">Display Records</a>
        </p>
        </p>
    </div>
</body>
</html>