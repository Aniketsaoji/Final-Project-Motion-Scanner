<?php
@include '../../include/user.php';

if(!isloggedin()){
   header("Location: login.php");
} else {
    header("Location: dashboard.php");
}