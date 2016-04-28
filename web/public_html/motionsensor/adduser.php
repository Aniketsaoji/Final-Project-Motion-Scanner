<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/27/2016
 * Time: 9:01 PM
 */

@include '../../include/dbconn.php';

$dbc = connect_to_db("mitchko");
perform_query_insert_noparam($dbc, 'insert into ACCOUNTS (Email, LastName, FirstName, `password`, `passwordSalt`, isAdmin) values(?,?,?,?,?,?)',
    array("admin@bc.edu", "Test", "Test",
        hash("sha1", "password12345678"), "12345678", 1));