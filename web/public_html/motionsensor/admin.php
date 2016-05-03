<?php
/**
 * Created by PhpStorm.
 * User: Tuchman
 * Date: 5/2/16
 * Time: 3:17 PM
 */



?>

<!DOCTYPE html>
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
    <script src = "js/table.js"></script>

    <div class = dropdown>

        <ul class="nav nav-tabs">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <h3>Services <span class="caret"></span> </h3>
                </a>
                <ul class="dropdown-menu">
                    <li><a href = "test.html">Home</a></li>
                    <li><a href ="login.php">Login</a></li>
                    <li><a href ="quote.html">Get a Quote</a></li>
                    <li><a href ="help.html">Get Help</a></li>
                </ul>
            </li>
        </ul>
    </div>
</head>
<body>
<h1>Welcome, Admin!</h1>
    <div class="container">
        <div class="row">
            <div class="bs-component table-responsive">
                <h2>Users</h2>
                <table class="table table-striped table-hover" id="myTable">
                    <thead class = "thead-inverse">
                    <tr>
                        <th data-dyntable-column ="ID">ID</th>
                        <th data-dyntable-column ="Email">Email</th>
                        <th data-dyntable-column ="LastName">Last Name</th>
                        <th data-dyntable-column ="FirstName">First Name</th>
                        <th data-dyntable-column ="isAdmin">Admin Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
