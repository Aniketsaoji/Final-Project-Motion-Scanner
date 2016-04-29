<?php
@include '../../include/user.php';

doLogin();
// TODO: Add logout message when $_GET['logout'] is set
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="create.php">Create Account</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Login</h1>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-xs-6 col-md-4"></div>
            <form class="form-horizontal col-xs-6 col-md-4" action="" method="post" >
                <fieldset>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password" required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary col-lg-12">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
</body>