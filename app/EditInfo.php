<?php
session_start();
require 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
if(isset($_POST['editForm'])) {
    if (isset($_POST['newFName'])) {
        $query = "UPDATE users SET fName ='" . $_POST['newFName'] . "'   WHERE id ='" . $_SESSION['uid'] . "'";
        $result = mysqli_query($con, $query);
    }
    if (isset($_POST['newLName'])) {
        $query = "UPDATE users SET lName ='" . $_POST['newLName'] . "'   WHERE id ='" . $_SESSION['uid'] . "'";
        $result = mysqli_query($con, $query);
    }
    if (isset($_POST['newUName'])) {
        $query = "UPDATE users SET Username ='" . $_POST['newUName'] . "'   WHERE id ='" . $_SESSION['uid'] . "'";
        $result = mysqli_query($con, $query);
    }
    if (isset($_POST['newEmail'])) {
        $query = "UPDATE users SET email ='" . $_POST['newEmail'] . "'   WHERE id ='" . $_SESSION['uid'] . "'";
        $result = mysqli_query($con, $query);
    }
    header("Location:UserPage.php?message=Info Succesfully Edited!");
}


?>

<html lang="en">
<head>
    <title>Edit User Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 0px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }


        .container{
            padding-top: 20px;
            padding-right:  15%;
            padding-left: 15%;

        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body style="background-color: #f1f1f1">

<div class="jumbotron">
    <div class="container text-center">
        <img src="imgs/swapshop_logo.png">
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="FrontPage.php">Home</a></li>
                <li><a href="Items.php">Items</a></li>
                <li><a href="Sell.php">Sell</a></li>
                <li><a href="Request.php">Request</a></li>
                <li><a href="Search.php">Search</a></li>
                <li>
                    <form method="post" action="Search.php" class="search-box, form-inline" name="search" style="margin-top: 8px;">
                        <input type="text" class="form-control" placeholder="Search shop" name="nameOf">
                        <input type="submit" class="btn btn-danger btn-sm" value="Search">
                    </form>
                </li>

            </ul>
            <ul class="navbar navbar-nav navbar-right" style="padding: 10px;">
                <?php
                if(!isset($_SESSION['email'])){
                    echo "<li><a href='login.php'><button type='button' class='btn btn-default btn-sm' style='margin-left: 5px;'><span class='glyphicon glyphicon-log-in'></span>Login</button></a></li>";
                }
                else{
                    echo "<div></div>";
                    echo "<li><a href='UserPage.php' ><button type='button' class='btn btn-default btn-sm' style='margin-left: 5px;'>
                     <span class='glyphicon glyphicon-user'></span> Hi, ";

                    $query = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";
                    $result = $con->query($query);
                    if($result->num_rows>0)
                        while ($row = $result -> fetch_assoc())

                            echo $row['fName'];
                    echo "</button></a></li>";
                    echo "</li>";

                    echo "<li><a href='signout.php'><button type='button' class='btn btn-default btn-sm' style='margin-left: 5px;'><span class='glyphicon glyphicon-log-out'></span> Logout</button></a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>





        <div class="container" style="height: auto; padding-bottom: 20px; background-color: #fdfdfd;">
            <?php
            if(!isset($_SESSION['email'])){
                echo "<h1 class='alert-danger'>You can't view this page unless you're signed in!</h1>";
                echo "<center><form action='login.php'>
                         <input class='btn btn-info btn-block' type='submit' value='Login'>
                          </form></center>";
            }
            ?>
            <div>

                <form class="form-signin" action="EditInfo.php"  method="post">
                    <div><h1>Edit Account Info</h1></div>
                    <div class="row">
                        <div class="col-xs-0">
                            <label for="inputFirst" class="sr-only">New First Name</label>
                        </div>

                        <input type="text" id="inputFirst" class="form-control" placeholder="New First Name" name="newFName" style="margin-bottom: 10px;">

                        <div id="message" class="col-xs-2"></div>

                    </div>
                    <div class="row">
                        <div class="col-xs-0">
                            <label for="inputLast" class="sr-only">New Last Name</label>
                        </div>

                        <input type="text" id="inputLast" class="form-control" placeholder="New Last Name" name="newLName" style="margin-bottom: 10px;">

                        <div id="message" class="col-xs-2"></div>

                    </div>
                    <div class="row">
                        <div class="col-xs-0">
                            <label for="inputUser" class="sr-only">New Username</label>
                        </div>

                        <input type="text" id="inputUser" class="form-control" placeholder="New Username" name="newUName" style="margin-bottom: 10px;">

                        <div id="message" class="col-xs-2"></div>

                    </div>
                    <div class="row">
                        <div class="col-xs-0">
                            <label for="inputUser" class="sr-only">New E-mail</label>
                        </div>

                        <input type="text" id="inputUser" class="form-control" placeholder="New E-mail" name="newEmail" style="margin-bottom: 10px;">

                        <div id="message" class="col-xs-2"></div>

                    </div>
                    <div style="padding-left: 30%; padding-right: 30%" >
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="editForm">Submit</button>
                    </div>
                </form>

            </div>
        </div>






<footer class="container-fluid text-center">
    <p>© SwapShop 2017</p>
</footer>

</body>
</html>

