<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="mysql";       //blank if no password is set for mysql.
$database="studentdb";  //database name which you created
$con=mysqli_connect($hostname,$username,$password);
if(!$con)
{
die('Connection Failed'.mysqli_error());
}

mysqli_select_db($con,$database);

?>