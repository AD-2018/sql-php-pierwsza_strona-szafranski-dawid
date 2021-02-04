<?php
$servername = "mysql-kcz.alwaysdata.net";
$username = "kcz";
$password = "zaq1@WSX";
$dbname = "kcz_20";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>k
