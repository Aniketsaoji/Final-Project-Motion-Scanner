<?php
/**
 * Created by PhpStorm.
 * User: Tuchman
 * Date: 5/2/16
 * Time: 3:54 PM
 */
include 'dbconnection.php';

$query  = "select * from ACCOUNTS";
$dbc = connect_to_db("mitchko");
$result = perform_query($dbc, $query);
if (mysqli_num_rows($result) == 0) {
    die("bad query $query");
}
$data = array();    // put the rows as objects in an array
while ($obj = mysqli_fetch_object($result)) {
    $data[] = $obj;
}
echo json_encode($data);
disconnect_from_db($dbc, $result);

?>