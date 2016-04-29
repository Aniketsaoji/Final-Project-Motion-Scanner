<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/27/2016
 * Time: 8:43 PM
 */
@include '../../include/user.php';

$loggedIn = false;

if (!isloggedin()) {
    header("Location: login.php");
} else {
    $loggedIn = true;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AntiTickler Security</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dynatable.js"></script>
    <script src="js/main.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/jquery.dynatable.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Anti-Tickler Security</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="test.html">Home</a></li>
                        <li><a href="quote.html">Get a Quote</a></li>
                        <li><a href="help.html">Get Help</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            // Added so that the login button doesn't show up
            if (!$loggedIn) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Login</a></li>
                </ul>
                <?php
            } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-xs-6 col-md-4">
        <canvas id="canvas">
        </canvas>
    </div>
    <div class="col-xs-6 col-lg-4">
    </div>
    <div class="col-xs-6 col-lg-4">
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-lg-4">
        <canvas id="chart2">
        </canvas>
    </div>
</div>
</body>
