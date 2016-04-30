<?php
@include '../../include/user.php';

$adminCode = 'bcrules01';
$passwordsMatch = true;
if (isloggedin()) {
    redirect('dashboard.php');
}

function checkVariables(array $filterVariables)
{
    foreach ($filterVariables as $var) {
        if ($var == null || $var == false) {
            return false;
        }
    }
    return true;
}

function creationVariablesSet()
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'addr', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);
    $admin_code = filter_input(INPUT_POST, 'promo', FILTER_SANITIZE_STRING);
    $createAdmin = 0;
    global $adminCode;
    global $passwordsMatch;
    if (checkVariables(array($email, $password, $password2, $firstName, $lastName, $address, $zip))) {
        if ($admin_code != false && $admin_code != null) {
            if (strcmp($adminCode, $admin_code) == 0) {
                $createAdmin = 1;
            }
        }
        if (strcmp($password, $password2) == 0) {
            $passwordsMatch = true;
            return array('email' => $email, 'password' => $password, 'firstName' => $firstName, 'lastName' => $lastName, 'admin' => $createAdmin, 'address' => $address, 'zip' => $zip);
        } else {
            $passwordsMatch = false;
            return false;
        }
    }
    return false;
}

$POST_vars = creationVariablesSet();

if(is_array($POST_vars)){
    $dbc = connect_to_db("mitchko");
    $id = createUser($dbc, $POST_vars);
    createProperty($dbc, $POST_vars, $id);
    redirect('dashboard.php');
} else if($POST_vars == false){
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Register</h1>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-xs-6 col-md-4"></div>
            <form class="form-horizontal col-xs-6 col-md-4" action="" method="post" autocomplete="off">
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
        <?php
        if (!$passwordsMatch) {
            ?>
            <div class="row">
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Warning!</h4>
                    <p>Your passwords don't match! Fix that to register.</p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>