<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Club Home Page</title>
</head>
<body>

</body>
</html>
<?php

include("../../include/dbconn.php");
handler();

function handler() { 
	$p1 = $_POST['password'];
	$p2 = $_POST['password2'];
	$e1 = $_POST['email'];

	$p1 = sha1($p1);
	
	$query = "INSERT INTO ACCOUNTS (`Email`, `Password`)VALUES ('$e1','$p1')";
	
	$dbc = connect_to_db("mitchko");
	$result = perform_query( $dbc, $query);
	if ($result == 1)
		echo "Thank You";
}

?>