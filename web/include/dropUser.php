<?php
/**
 * Created by PhpStorm.
 * User: Tuchman
 * Date: 5/2/16
 * Time: 9:30 PM
 */

@include 'dbconnection.php';


$id = $_POST['userID'];
$query = "DELETE FROM ACCOUNTS WHERE ID = $id";
$dbc = connect_to_db("mitchko");
$result = perform_query($dbc, $query);
header("Location: ../motionsensor/admin.php");