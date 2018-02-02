<?php
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
$user = $_POST['user'];
$query = "SELECT * FROM user WHERE username = '".$user."'";

$result = mysqli_query($con, $query);
if(mysqli_num_rows($result)==1)
    echo "yes";
else {
    echo "no";
}
mysqli_close($con);


