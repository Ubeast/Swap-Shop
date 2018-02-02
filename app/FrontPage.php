<?php
session_start();
require 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
?>
<html lang="en">
<head>
    <title>SwapShop</title>
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
            padding-right: 10%;
            padding-left: 10%;

        }

        .slide-image {
            width: 100%;
        }

        .carousel-holder {
            margin-bottom: 30px;
        }

        .carousel-control,
        .item {
            border-radius: 4px;
        }


        .caption h4 {
            white-space: nowrap;
        }

        .thumbnail img {
            width: 100%;
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
                <li class="active"><a href="FrontPage.php">Home</a></li>
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




        <div class="container" style="height: auto; background-color: #fdfdfd;">
                <h1>Welcome to Swap Shop</h1>
                <p>Your one-stop shop for almost anything!</p>
                <hr>

                    <div class="row">
                        <?php
                        $query = "SELECT * FROM items ORDER BY RAND() LIMIT 3 ";
                        $result = $con->query($query);
                        if($result->num_rows>0) {

                            while ($row = $result -> fetch_assoc()) {

                                ?>
                                <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="padding: 15px"><b><?php echo $row['iname'];
                                                $row['iname']; ?></b>
                                            <?php if(isset($_SESSION['email'])) {
                                                if ($_SESSION['email'] == $row['contact']) { ?>
                                                    <div style="float: right; position: relative;">
                                                        <form action="EditItem.php" method="post" class="form-inline"
                                                              style="display:inline-block; ">
                                                            <button id="edit" type="submit" class="btn btn-danger"
                                                                    style="font-weight: bold; font-size: 10px;" name="edit"
                                                                    value="<?php echo $row['id'] ?>">Edit
                                                            </button>
                                                        </form>

                                                        <form action="DeleteItem.php" method="post" class="form-inline"
                                                              style="display:inline-block;">
                                                            <button type="submit" class="btn btn-danger" name="delete"
                                                                    style="font-weight: bold; font-size: 10px;"
                                                                    value="<?php echo $row['id'] ?>">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                        <div class="panel-body"><img src="<?php echo $row['img']; ?>" class="img-responsive"
                                                                     style="width: 320px; height: 280px" alt="Image not found!"></div>
                                        <?php
                                        if(isset($_SESSION['email'])){
                                            ?>
                                            <div class="panel-footer" style="overflow: hidden; height: 90px"><b>Item Description: </b><?php echo $row['descr']; ?></div>
                                            <div class="panel-footer"><b>Contact Info: </b><?php echo $row['contact']; ?></div>
                                            <div class="panel-footer"><b>Price: </b><?php if($row['price'] !=0 )echo "$".$row['price'];else echo "Seller Did Not Disclose"; ?></div>
                                            <?php
                                        }
                                        ?>
                                    </div>


                                </div>
                                <?php
                            }
                        }

                        ?>

                    </div>
            <div class="row">
            <div style="float: right; margin: 10px;">
                <a href="Items.php"><button class="btn btn-md btn-primary btn-block" >View All Items</button></a>
            </div>
                </div>

<div class="row">
            <hr>
                <?php if(isset($_SESSION['email'])) { ?>
                    <h3 class="alert-success"> Your Requested Items </h3>
                    <?php
                    $em = $_SESSION['email'];
                    $query = "SELECT * FROM items WHERE iname IN (SELECT iname FROM requests WHERE email ='$em') OR descr IN (SELECT iname FROM requests WHERE email ='$em') ";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <div class="col-sm-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><?php echo $row['iname'];
                                        $row['iname']; ?></div>
                                    <div class="panel-body"><img src="<?php echo $row['img']; ?>" class="img-responsive"
                                                                 style="width: 80px; height: 50px" alt="Image not found!"></div>
                                    <?php

                                        ?>
                                        <div class="panel-footer" style="overflow: hidden; height: 90px">Item Description: <?php echo $row['descr']; ?></div>
                                        <div class="panel-footer">Contact Info: <?php echo $row['contact']; ?></div>
                                        <div class="panel-footer"><b>Price: </b><?php if($row['price'] !=0 )echo "$".$row['price'];else echo "Seller Did Not Disclose"; ?></div>
                                            <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }

                ?>
    </div>

    </div>




<footer class="container-fluid text-center">
    <p>© SwapShop 2017</p>
</footer>

</body>
</html>
