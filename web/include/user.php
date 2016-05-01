<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/27/2016
 * Time: 8:41 PM
 */

@include 'dbconn.php';

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isloggedin($returnId=false)
{
    $dbc = connect_to_db("mitchko");
    if (isset($_COOKIE['session'])) {
        $browserCookie = $_COOKIE['session'];
        $rows = perform_query_select($dbc, "SELECT * FROM mitchko.ACCOUNTS WHERE `currentCookieTimestamp` >= DATE_SUB(NOW(), INTERVAL 30 MINUTE ) AND `currentCookie`=?", array($browserCookie => PDO::PARAM_STR));
        if (count($rows) > 0) {
            if(strcmp($browserCookie, $rows[0]['currentCookie']) == 0){
                return $returnId ? $rows[0]['ID'] : true;
            }
        }
    }
    return false;
}

function getLoginCredentials()
{
    $dbc = connect_to_db("mitchko");
    $browserCookie = $_COOKIE['session'];
    $rows = perform_query_select($dbc, "SELECT (`ID`, Email, LastName, FirstName, isAdmin) FROM mitchko.ACCOUNTS WHERE `currentCookie`=? AND (`currentCookieTimestamp` > DATE_SUB(now(), INTERVAL 30 MINUTE))", array($browserCookie => PDO::PARAM_STR));
    if (sizeof($rows > 0)) {
        return $rows[0];
    } else {
        return false;
    }
}

function checkLogin(PDO $dbc)
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rows = perform_query_select($dbc, "SELECT * FROM mitchko.ACCOUNTS WHERE `Email`=?", array($email => PDO::PARAM_STR));
    $hash = hash('sha1', filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) . $rows[0]['passwordSalt']);
    if (sizeof($rows) > 0) {
        if (strcmp($hash, $rows[0]['password'])) {    // Do the password hashes match?
            setLoginCookie($dbc, $rows[0]['ID'], $rows[0]['Email'], $rows[0]['LastName']);
            return true;
        }
    }
    return false;
}

function setLoginCookie($dbc, $id, $email, $lastname)
{
    $cookieHash = hash('sha1', $id . $email . $lastname . generateRandomString());
    setcookie('session', $cookieHash, time() + (86400 * 30), "/");
    perform_query_update($dbc, 'UPDATE ACCOUNTS SET `currentCookie`=?, `currentCookieTimestamp`=now() WHERE `ID`=?', array($cookieHash, $id));
}

function loginVariablesSet()
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    return $email != null && $email != false && $password != null && $password != false;
}

function doLogin($redirect = 'dashboard.php')
{
    if (loginVariablesSet()) {
        $dbc = connect_to_db("mitchko");
        if (checkLogin($dbc)) {
            header("Location: " . $redirect);
            die();
        }
    }
}

function doLogout($redirect = 'login.php')
{
    setcookie('session', '000000000000000000000000000000000000000000000000', time() - 3600, '/');
    header("Location: " . $redirect);
}

function redirect($location)
{
    header("Location: " . $location);
}

function createUser(PDO $dbc, array $postVars)
{
    $salt = generateRandomString(8);
    $passwordHash = hash('sha1', $salt . $postVars['password']);
    perform_query_insert_noparam($dbc, 'INSERT INTO ACCOUNTS (Email, LastName, FirstName, `password`, `passwordSalt`, isAdmin) VALUES(?,?,?,?,?,?)',
        array($postVars['email'], $postVars['lastName'], $postVars['firstName'], $passwordHash, $salt, $postVars['admin']));
    $rows = perform_query_select($dbc, 'SELECT (`ID`) FROM mitchko.ACCOUNTS WHERE `Email`=?', array($postVars['email'] => PDO::PARAM_STR));
    if (count($rows) >0) {
        return $rows[0]['ID'];
    } else {
        return false;
    }
}

function createProperty(PDO $dbc, array $postVars, $id)
{
    perform_query_insert_noparam($dbc, 'insert into mitchko.Properties (StreetAddress, AssociatedAccountID, ZipCode) values(?,?,?)', array($postVars['address'], $id, $postVars['zip']));
}

function getUserProperties($id){
    $dbc = connect_to_db("mitchko");
    return perform_query_select($dbc, 'select * from mitchko.Properties where `AssociatedAccountID`=?', array($id => PDO::PARAM_STR));
}

function getUserZip($id) {
    $dbc = connect_to_db("mitchko");
    return perform_query_select($dbc, 'select ZipCode from mitchko.Properties where `AssociatedAccountID`=?', array($id => PDO::PARAM_STR));
}