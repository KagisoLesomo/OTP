<?php

require_once("functions.php");

db_update('player', ['checkers' => 0, 'gameOpp' => '0', 'gameId' => 0, 'gameColor' => '0', 'upRight' => 0, 'upLeft' => 0, 'downLeft' => 0, 'downRight' => 0, 'attack' => 0], "id = {$_SESSION['player']['id']}");
db_update('player', ['checkers' => 0, 'gameOpp' => '0', 'gameId' => 0, 'gameColor' => '0', 'upRight' => 0, 'upLeft' => 0, 'downLeft' => 0, 'downRight' => 0, 'attack' => 0], "id = {$_SESSION['opponent']['id']}");

$_SESSION['opponent'] = null;

header("Location: homepage.php");