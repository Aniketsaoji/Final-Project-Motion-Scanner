<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/27/2016
 * Time: 8:41 PM
 */

@include 'dbconn.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isloggedin(){
    $dbc = connect_to_db("mitchko");
    $browserCookie = $_COOKIE['session'];
    $rows = perform_query_select($dbc, "select * from mitchko.ACCOUNTS where `currentCookie`=? AND (`currentCookieTimestamp` > DATE_SUB(now(), INTERVAL 30 MINUTE))", array($browserCookie => PDO::PARAM_STR));
    if(sizeof($rows > 0)){
        return true;
    } else {
        return false;
    }
}

function checkLogin(PDO $dbc){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rows = perform_query_select($dbc, "select * from mitchko.ACCOUNTS where `Email`=?", array($email => PDO::PARAM_STR));
    $hash = hash('sha1', filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) . $rows[0]['passwordSalt']);
    if(sizeof($rows)>0){
        if (strcmp($hash, $rows[0]['password'])) {    // Do the password hashes match?
            setLoginCookie($dbc, $rows[0]['ID'], $rows[0]['Email'], $rows[0]['LastName']);
            return true;
        }
    }
    return false;
}

function setLoginCookie($dbc, $id, $email, $lastname){
    $cookieHash = hash('sha1', $id . $email . $lastname. generateRandomString());
    setcookie('session', $cookieHash);
    perform_query_update($dbc, 'update ACCOUNTS set `currentCookie`=?, `currentCookieTimestamp`=now() where `ID`=?', array($cookieHash, $id));
}

function loginVariablesSet(){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    return $email != null && $email != false && $password != null && $password != false;
}

function doLogin($redirect='dashboard.php'){
    if(loginVariablesSet()){
        $dbc = connect_to_db("mitchko");
        if(checkLogin($dbc)){
            header("Location: ". $redirect);
            die();
        }
    }
}