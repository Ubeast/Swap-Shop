<?php
session_start();
require_once 'CONFIG-DB.php';
$con=  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if(mysqli_connect_errno()!=0)
    die("Fail to connect to DB server: ".mysqli_connect_error ());
$Email = $_SESSION['email'];

$query = "SELECT * FROM users WHERE Email = '".$Email."'";

$result = mysqli_query($con, $query);
if($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $row['Username'];
        $_SESSION['fname'] = $row['fName'];
        $_SESSION['lname'] = $row['lName'];
        $_SESSION['pass'] = $row['Pass'];
        $_SESSION['uid'] = $row['id'];
    }
}
?>
<html lang="en">
<head>
    <title>Profile</title>
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
<body>
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
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['email'])){
                    echo "<li><a href='login.php'><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-log-in'></span>Login</button></a></li>";
                }
                else{
                    echo "<div></div>";
                    echo "<li class='active'><a href='UserPage.php' ><button type='button' class='btn btn-default btn-sm'>
                     <span class='glyphicon glyphicon-user'></span> Hi, ";

                    $query = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";
                    $result = $con->query($query);
                    if($result->num_rows>0)
                        while ($row = $result -> fetch_assoc())

                            echo $row['fName'];
                    echo "</button></a></li>";
                    echo "</li>";

                    echo "<li><a href='signout.php'><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-log-out'></span> Logout</button></a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left" style="padding-top: 40px;padding-left: 40px;padding-right: 40px">
            <center><h1>Your Information</h1></center>
            <div style="padding-left: 350px;">
            <h2 style="display: inline">Name : <h3 style="color:blue;display: inline"><?php echo $_SESSION['fname']." "; echo $_SESSION['lname'];?></h3></h2>
            <div></div>
            <h2 style="display: inline">Username : <h3 style="color:blue;display: inline"><?php echo $_SESSION['user']; ?></h3></h2>
            <div></div>
            <h2 style="display: inline">E-mail : <h3 style="color:blue;display: inline"><?php echo $_SESSION['email']; ?></h3></h2>
        </div>
            <div style="padding-top: 40px">
            <center><form action="EditInfo.php"  method="post">
                <button type="submit" class="btn" name="editUser" value="<?php echo $_SESSION['uid']; ?>">Edit Info</button>
            </form>
            <form action="Terminate Acc.php"  method="post">
                <button type="submit" class="btn-danger" name="terminate" value="<?php echo $_SESSION['uid']; ?>">Terminate Account</button>
            </form>
            </center>
            </div>
        </div>
        <div class="col-sm-2 sidenav">

        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>© SwapShop 2017</p>
</footer>

</body>
</html>

