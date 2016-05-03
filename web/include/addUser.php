<?php
/**
 * Created by PhpStorm.
 * User: Tuchman
 * Date: 5/3/16
 * Time: 4:54 AM
 */

@include 'dbconnection.php';

$email = $_POST['email'];
$first = $_POST['first'];
$last = $_POST['last'];
$pw = $_POST['password'];
$addr = $_POST['addr'];
$zip = $_POST['$zip'];
$promo = $_POST['promo'];

if (strcmp($promo, "bcrulez1")== 0){
    $isAdmin = 1;
}
else{
    $isAdmin = 0;
}

$query = "INSERT INTO ACCOUNTS VALUES ('$email','$last','$first', sha1($pw), $isAdmin )";
$dbc = connect_to_db("mitchko");
$result = perform_query($dbc, $query);
header("Location: ../motionsensor/admin.php");