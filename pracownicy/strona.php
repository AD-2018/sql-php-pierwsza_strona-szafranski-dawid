<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/kox.css">
</head>
<body>
    
    <h1>Dawid Szafrański</h1>
<nav>
    <br>
    <a href="https://github.com/AD-2018/sql-php-pierwsza_strona-szafranski-dawid</a>
    <br>
    <br>
    <div class="nav">
           <a href="/index.php">Strona Główna</a> 
         <br>        
         <a href="/pracownicy/pracownicy.php">Pracownicy</a>
         <br>
         <a href="/pracownicy/pracownicy_organizacja.php">Pracownicy i Organizacja</a>   
         <br>
         <a href="/pracownicy/funkcje_agregujace.php">Funkcje Agregujace</a>  
         <br>
         <a href="/pracownicy/data_czas.php">Data i Czas</a>
         <br>
         <a href="/pracownicy/nieobecnosci.php">Nieobecności Pracowników</a>
         <br>
         <a href="/pracownicy/strona.php">Strona</a>
         <br>
         <a href="/pracownicy/DaneBaza.html">Dane Do Bazy</a>
         <br>
	 <a href="/pracownicy/insert.php">insert.php</a>
	<br>
	<a href="/biblioteka/biblioteka.php">biblioteka</a>
    </div>
    <br>
</nav> 
<form action="strona.php" method="POST">
   </br>
	<tr><th>
   <input type="text" name="imie">
   <input type="text" name="nazwisko">
   <input type="text" name="city">
   <input type="text" name="phone">
   <input type="text" name="poscode"></br>
   <input type="submit" value="wyślij do strona.php">
	</th></tr>
</form>
<?php
	echo("jesteś na stronie.php");
	
	echo("<ul>");
	
	echo("<li>".$_POST["imie"]);
	echo("<li>".$_POST["nazwisko"]);
	echo("<li>".$_POST["city"]);
	echo("<li>".$_POST["phone"]);
	echo("<li>".$_POST["poscode"]);
	echo("<ul>");
?>
</body>
</html>


