<?php

require_once("functions.php");

// $username=trim($_POST['username']);
$password=trim($_POST['password']);
function trimUsername(){
    return trim($_POST['username']);
}
$username = trimUsername();

if (login_user($username, $password)) {
    header("Location: homepage.php");
} else {
    header("Location: login.html");
}