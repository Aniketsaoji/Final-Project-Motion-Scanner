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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Properties
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
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
                    <canvas id="canvas">
                    </canvas>
                </div>

                <div class="panel-footer">
                    Change Property
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Crime Near You
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
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
				<div class = "col-lg-8">
					<h2>Test</h2>
					<?php
					$response = file_get_contents('http://ziptasticapi.com/02135');
					echo $response . "<br>";
					$info = json_encode($response);
					echo $info->city . "<br>";

					
					
					$myChoice2 = "http://s3.spotcrime.com/cache/rss/kalamazoo-westnedge-hill.xml";				
					$rss =  simplexml_load_file($myChoice2);
					$title =  $rss->channel->title;
					echo "<h5>$title</h5>";
					$items = $rss->channel->item; # try, works some versions
					if (!$items)
						$items = $rss->item; # works other versions
					foreach ($items as $item) {
						echo $item->pubDate . "<br>";
						echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
						echo $item->description . "<br>";
					}
					?>
					
				</div>
                <div class="panel-body">
                    <canvas id="canvas">
                    </canvas>
                </div>

                <div class="panel-footer">
                    Change Property
                </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4">
        </div>
    </div>
    <div>
    </div>
</div>
</body>
