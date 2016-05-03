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

<div class=dropdown>

    <ul class="nav nav-tabs">
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <h3>Services <span class="caret"></span></h3>
            </a>
            <ul class="dropdown-menu">
                <li><a href="test.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="quote.html">Get a Quote</a></li>
                <li><a href="help.html">Get Help</a></li>
            </ul>
        </li>
    </ul>
</div>
<h1>Welcome, Admin!</h1>
<div class="container">
    <div class="row">
        <div class="bs-component table-responsive">
            <h2>Users</h2>
            <div class="bs-component table-responsive">
                <table class="table table-striped table-hover " id="entries">
                    <thead>
                    <th data-dynatable-column="ID">Map</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<h2>Change Admin Status</h2>
<div class="col-lg-6 col-lg-offset-4">
    <fieldset>
        <form method="POST" action="../../include/adminScript.php">
            <label for="admin">Enter the desired ID number</label><input type="text" id="admin"/><br>
            <input type="submit" class="btn btn-lg" value="Submit">
        </form>
    </fieldset>
</div>
</body>
