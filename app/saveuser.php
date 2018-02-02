<?php
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

$Email = $_POST['email'];
$Pass = $_POST['password'];
$Username = $_POST['username'];
$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$query = "INSERT INTO users (fName,lName,Email,Pass,Username) VALUES('$fName','$lName','$Email','$Pass','$Username')";

$result = mysqli_query($con, $query);


header("Location:login.php?message=Your account is activated. Please Sign in!");
        

