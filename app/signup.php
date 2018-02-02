
<?php
session_start();
require 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var checkuser = function() {
            $.post('http://localhost/LoginWithDB/checkUsername.php', {user: $('#inputEmail').val()},
                function(data, status) {
                    if (data == 'yes'){
                        $('#inputdiv').addClass('has-error');
                        $('#message').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>");
                    }
                    else{
                        $('#inputdiv').removeClass('has-error');
                        $('#message').html('');
                    }

                });
        };
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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




            <div class="container" style="height: auto; padding-bottom: 80px; background-color: #fdfdfd;">

                    <form class="form-signin" action="saveuser.php"  method="post">
                        <center><h2 class="form-signin-heading">SwapShop Sign Up</h2></center>
                        <div class="row" style="margin-top: 30px">
                            <div class="col-xs-0">
                                <label for="inputFirst" class="sr-only">First Name</label>
                            </div>

                            <input type="text" id="inputFirst" class="form-control" placeholder="First Name" name="firstname" required autofocus
                                   onblur="checkuser()" style="margin-bottom: 10px;">

                            <div id="message" class="col-xs-2"></div>

                        </div>
                        <div class="row">
                            <div class="col-xs-0">
                                <label for="inputLast" class="sr-only">Last Name</label>
                            </div>

                            <input type="text" id="inputLast" class="form-control" placeholder="Last Name" name="lastname" required autofocus
                                   onblur="checkuser()" style="margin-bottom: 10px;">

                            <div id="message" class="col-xs-2"></div>

                        </div>
                        <div class="row">
                            <div class="col-xs-0">
                                <label for="inputEmail" class="sr-only">Email</label>
                            </div>

                            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus
                                   onblur="checkuser()" style="margin-bottom: 10px;">

                            <div id="message" class="col-xs-2"></div>

                        </div>
                        <div class="row">
                            <div class="col-xs-0">
                                <label for="inputUser" class="sr-only">Username</label>
                            </div>

                            <input type="text" id="inputUser" class="form-control" placeholder="Username" name="username" required autofocus
                                   onblur="checkuser()" style="margin-bottom: 10px;">

                            <div id="message" class="col-xs-2"></div>

                        </div>
                        <div class="row">
                            <label for="inputPassword" class="sr-only ">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required style="margin-bottom: 10px;">
                        </div>
                        <div style="padding-right: 30%; padding-left: 30%">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                         </div>
                    </form>

                </div>






<footer class="container-fluid text-center">
    <p>© SwapShop 2017</p>
</footer>

</body>
</html>



