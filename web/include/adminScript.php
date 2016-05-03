<?php
/**
 * Created by PhpStorm.
 * User: Tuchman
 * Date: 5/2/16
 * Time: 8:03 PM
 */
@include 'dbconnection.php';

$id = $_POST['adminID'];
$query = "Update ACCOUNTS SET isAdmin = NOT isAdmin WHERE ID = $id";
$dbc = connect_to_db("mitchko");
$result = perform_query($dbc, $query);
header("Location: ../motionsensor/admin.php");



