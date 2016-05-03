<?php
@include '../../include/user.php';

if(isloggedin()){
    redirect('dashboard.php');
}


$showDivFlag=false;

if (isset($_POST['lol'])) {
	$showDivFlag=true;
	$quoteVal = $_POST['sqft']*0.3;
}


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
            <ul class="nav navbar-nav navbar-right">
				<li><a href="quote.php">Get a Quote</a></li>
                <li><a href="create.php">Create Account</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Quote</h1>
            </div>
        </div>
    </div>
	<div class="bs-docs-section">
        <div class="row">
            <div class="col-xs-6 col-md-4"></div>
            <form class="form-horizontal col-xs-6 col-md-4" action="" method="post" >
                <fieldset>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="number" class="form-control" id="sqft" placeholder="Square Feet" name="sqft" 
								   value = "<?php 
											if (isset($_POST['sqft'])) {
												echo $_POST['sqft'];
											}else {
												echo "";
											}?>" required>
                        </div>
					</div>
					<div id = resultsed class="form-group" 
						 <?php 
						 if ($showDivFlag===false) {
						 ?> 
						 style="display:none"
						 <?php } ?>>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="result" name="resulted" value ="$<?php echo $quoteVal; ?>">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-lg-12">
							<button type="submit" name = "lol" class="btn btn-primary col-lg-12">Submit</button>
                        </div>
                    </div>
				</fieldset>
			</form>
		</div>
	</div>				
</div>
	