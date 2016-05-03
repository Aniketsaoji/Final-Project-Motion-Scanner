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

</body>
