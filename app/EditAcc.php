<?php
session_start();
require 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());

    if(isset($_POST['newName'])){
        $query = "UPDATE items SET iname ='" . $_POST['newName'] . "'   WHERE id ='" . $_SESSION['edit'] . "'";
        $result = mysqli_query($con, $query);
    }
    if(isset($_POST['newImg'])){
        $query = "UPDATE items SET img ='" . $_POST['newImg'] . "'   WHERE id ='" . $_SESSION['edit'] . "'";
        $result = mysqli_query($con, $query);
    }
    if(isset($_POST['newDescr'])){
        $query = "UPDATE items SET descr ='" . $_POST['newDecr'] . "'   WHERE id ='" . $_SESSION['edit'] . "'";
        $result = mysqli_query($con, $query);
    }
    header("Location:Items.php?message=Item Succesfully Edited!");

?>

