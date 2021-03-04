<?php
$servername = $_SERVER["servername"];
$username = $_SERVER["username"];
$password = $_SERVER["password"];
$dbname = $_SERVER["dbname"];

$conn = new mysqli ($servername, $username, $password, $dbname);
?>
