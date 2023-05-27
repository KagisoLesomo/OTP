<script>
    console.log("wegoin")
</script>


<?php

require_once("../functions.php");

if(isset($_GET['tile'])) {
    $tile = $_GET['tile'];
    $gameId = $_SESSION['player']['gameId'];
    // $tile = json_encode($tile);
    db_update('checkers', ['moveTile' => $tile], "gameId = {$gameId}");
}

if(isset($_GET['checker'])) {
    $checker = $_GET['checker'];
    $gameId = $_SESSION['player']['gameId'];
    // $tile = json_encode($tile);
    db_update('checkers', ['moveChecker' => $checker], "gameId = {$gameId}");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $gameId = $_SESSION['player']['gameId'];
    // $tile = json_encode($tile);
    db_update('checkers', ['checkerId' => $id], "gameId = {$gameId}");
}

if(isset($_GET['start'])) {
    $start = $_GET['start'];
    $gameId = $_SESSION['player']['gameId'];
    // $tile = json_encode($tile);
    db_update('checkers', ['start' => $start], "gameId = {$gameId}");
}

if(isset($_GET['attack'])) {
    $attack = $_GET['attack'];
    $gameId = $_SESSION['player']['gameId'];
    // $tile = json_encode($tile);
    db_update('checkers', ['attack' => $attack], "gameId = {$gameId}");
}

