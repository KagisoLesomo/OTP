<?php
$hostName = "10.100.15.216";
$userName = "student";
$password = "soole7ah";
$databaseName = "codingstatus";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>