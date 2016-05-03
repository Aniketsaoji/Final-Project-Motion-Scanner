<?php

@include "../../include/user.php";
/*
if(isloggedin(1)[0] == false){
    redirect('dashboard.php');
}
*/
$passwordsMatch = true;

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
    <script src="js/table.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse" role="navigation">
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1>Welcome, Admin!</h1>
<div class="container">
    <div class="row">
        <div class="bs-component table-responsive">
            <h2>Users</h2>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped" id="entries">
                    <thead class="thead-inverse">
                    <th data-dynatable-column="ID">ID</th>
                    <th data-dynatable-column="Email">Email</th>
                    <th data-dynatable-column="FirstName">First Name</th>
                    <th data-dynatable-column="LastName">Last Name</th>
                    <th data-dynatable-column="isAdmin">Admin Status</th>

                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class = "container">
    <div class = "row">
        <h2>Change Admin Status</h2>
        <fieldset>
            <form method = "POST" action = "../include/adminScript.php" name = "adminStatus">
                <div class = "form-group">
                    <label for = "adminID">User ID</label><br>
                    <input type = "text" id = "adminID" name = "adminID" class = "form-control">
                </div>
                <button type = "submit" class = "btn btn-default">Submit</button>
            </form>
        </fieldset>
    </div>
</div>

<div class = "container">
    <div class = "row">
        <h2>Delete User</h2>
        <fieldset>
            <form method = "POST" action = "../include/dropUser.php" name = "dropUser">
                <div class = "form-group">
                    <label for = "userID">User ID</label><br>
                    <input type = "text" id = "userID" name = "userID" class = "form-control">
                </div>
                <button type = "submit" class = "btn btn-default">Submit</button>
            </form>
        </fieldset>
    </div>
</div>
<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Add User</h1>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-xs-6 col-md-4"></div>
            <form class="form-horizontal col-xs-6 col-md-4" name = "addForm" onsubmit = "return validateForm()" action="../include/addUser.php" method="post" autocomplete="off">
                <fieldset>
                    <legend>Account</legend>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter Password" required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="password" class="form-control" id="password2" name="password2"
                                   placeholder="Confirm Password" required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="first" name="first" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="last" name="last" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="promo" name="promo" placeholder="Promo Code">
                        </div>
                    </div>
                    <legend>Property</legend>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="addr" name="addr" placeholder="Street Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="number" class="form-control" id="zip" name="zip" min="00001" max="99999" step="1" placeholder="Zip Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-danger col-lg-12">Register</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
</body>

<script>
    function validateForm(){
        if ($('[name = first]').val() == "" || $('[name = password]').val() == "" || $('[name = email]').val() == "" || $('[name = password2]').val() == "" || $('[name = zip]').val() == "" || $('[name = addr]').val() == "" ||$('[name = last]').val() == ""){
            alert("Fill out the whole form please!");
            return false;
        }
        else if ($('[name = password]').val() != $('[name = password2]').val()){
            alert("Passwords don't match");
            return false;
        }
        else{
            return true;
        }
    }

</script>