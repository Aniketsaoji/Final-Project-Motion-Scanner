<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/27/2016
 * Time: 8:43 PM
 */
@include '../../include/user.php';

$zipCode = 02135;
$spotCrimeAPI = 'http://api.spotcrime.com/crimes.json?radius=0.02&key=.&_=' . time();   // spot crime API => idiots, if you use the API key=. and supply the current timestamp they give you the data lol
// append a lat and lng get parameter to make it work
$googleMapsAPI = 'http://maps.googleapis.com/maps/api/geocode/json?address=';           // Simply append the zip code to get a nice response

$properties;
$user_id;
if (!isloggedin()) {
    header("Location: login.php");
    die();
} else {
    $user_id = isloggedin(true);
    $properties = getUserProperties($user_id);
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
    <script type="text/javascript">
        <?php
        if(isset($properties[0]['ZipCode'])){
        ?>
        $(document).ready(function () {
            doLoad("<?php echo $properties[0]['ZipCode'] ?>", "<?php echo $properties[0]['propertyID'] ?>");
            setTimeout(function(){
                doLoad("<?php echo $properties[0]['ZipCode'] ?>", "<?php echo $properties[0]['propertyID'] ?>");
            }, 60000);
        });
        <?php
        }
        ?>
    </script>
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/jquery.dynatable.css" rel="stylesheet">
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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php
            $i = 1;
            foreach ($properties as $property) {
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Your Property
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                    Property
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="canvas">
                        </canvas>
                    </div>

                    <div class="panel-footer">
                        <?php
                        echo $property['StreetAddress'] . ", " . $property['ZipCode'];
                        ?>
                    </div>
                </div>
                <?php
                ++$i;
            }
            ?>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Report A Crime
                    <div class="pull-right">

                    </div>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crime Near You
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="dropdown">
                                Properties
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table" id="table1">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Map</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</div>
</body>
