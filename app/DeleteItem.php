<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

if(isset($_POST['delete'])) {

    $query = "DELETE FROM items WHERE id ='" . $_POST['delete'] . "'";
    $result = mysqli_query($con, $query);
}

header("Location:Items.php?message=Item Succesfully Deleted!");