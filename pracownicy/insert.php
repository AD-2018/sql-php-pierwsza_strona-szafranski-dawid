<?php
require_once("connect.php");

$sql = "INSERT INTO pracownicy (id_pracownicy, imie, dzial, zarobki, data_urodzenia) 
       VALUES (null, 'Seba', 1, 76,'2002-08-18')";

$conn->query($sql);

$conn->close();
?>
