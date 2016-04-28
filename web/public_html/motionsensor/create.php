<?php
@include '../../include/user.php';

if(isloggedin()){
    header("Location: index.php");
}

/*Do Adding to Accounts here*/

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
						<li><a href="create.php">Create Account</a></li>
                        <li><a href="quote.html">Get a Quote</a></li>
                        <li><a href="help.html">Get Help</a></li>
                    </ul>
                </li>
            </ul>
			<ul class = "nav navbar-nav navbar-right">
				<div>
					<form method = "POST" class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="exampleInputEmail3">Email address</label>
							<input type="email" class="form-control" name="InputEmail" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label class="sr-only" for="exampleInputPassword3">Password</label>
							<input type="password" class="form-control" id="InputPassword" placeholder="Password"></div>
						<button type="submit" name = "signin" class="btn btn-primary">Sign in</button>
					</form>
				</div>
			</ul>
        </div>
    </div>
</nav>
	<h1>Suh dude! You tryna make an account?</h1>
	<form action ="" class = "form" role = "form" method = "post" onsubmit = "return validate()">
		<div class = "form-group">
		<fieldset class="form-group">
			<legend>Create Account</legend>
			<label>What's your email address?</label>
			<input type="email" id="exampleInputEmail1" name = "email" placeholder="Enter email"><br>
			<label>Enter the password you want</label>
			<input type=password name="password" id = "password" placeholder="Enter password"><span id = "afterPass"></span><br>
			<label>Retype your password</label>
			<input type=password name="password2" id = "password2" placeholder="Retype password"><br>
			<button type="submit" name = "create" class="btn btn-primary">Create Account</button>
		</fieldset>
		</div>
	</form>
</body>