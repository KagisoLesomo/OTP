<?php

require_once("functions.php");

echo "<pre>";

$id = $_SESSION['player']['id'];

if (db_update('player', ["checkers" => 1], "id={$id}")){
    header("Location: matching.php");
}else{
    print_r("Check your code :(");
}