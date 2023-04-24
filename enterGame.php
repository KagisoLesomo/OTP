<?php

require_once("functions.php");

echo "<pre>";

$id = $_SESSION['player']['id'];

db_update('player', ["checkers" => 1], "id={$id}")

?>


<?php header("Location: matching.php"); ?>


