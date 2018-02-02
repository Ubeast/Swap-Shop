<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
$Email = $_POST['email'];
$Pass = $_POST['password'];

$query = "SELECT * FROM users WHERE Email = '".$Email."' AND Pass = '".$Pass."'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)>0){

    $_SESSION['email'] = $Email;
    mysqli_close($con);
    header("Location:FrontPage.php");
}
else{
    mysqli_close($con);
    header("Location:login.php?error=Wrong username/password");
}
