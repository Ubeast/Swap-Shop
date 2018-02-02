<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

$item = $_POST['itemname'];
$email = $_SESSION['email'];

$query = "INSERT INTO requests (iname,email) VALUES('$item','$email')";

$result = mysqli_query($con, $query);


header("Location:FrontPage.php?message=Item Succesfully Requested!");