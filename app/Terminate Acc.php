<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

if(isset($_POST['terminate'])) {

    $query = "DELETE FROM users WHERE id ='" . $_POST['terminate'] . "'";
    $result = mysqli_query($con, $query);
}

header("Location:FrontPage.php?message=Account Succesfully Terminated!");