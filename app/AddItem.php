<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

$item = $_POST['itemname'];
$img = $_POST['imglink'];
$desc = $_POST['description'];
$iprice = $_POST['iprice'];
$catag = $_POST['catag'];
$cont = $_SESSION['email'];

$query = "INSERT INTO items (iname,img,descr,contact,price,catagory) VALUES('$item','$img','$desc','$cont','$iprice','$catag')";

$result = mysqli_query($con, $query);


header("Location:Items.php?message=Item Succesfully Added!");