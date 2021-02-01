<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="kox.css">
</head>
<body>
    <a href="https://github.com/AD-2018/sql-php-pierwsza_strona-szafranski-dawid">github</a>
    <h1>Szafrański Dawid</h1>
    
    <div class = "nav">
         <a href="index.php">Strona Główna</a> 
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
    </div>
<?php
$servername = "mysql-kcz.alwaysdata.net";
$username = "kcz";
$password = "zaq1@WSX";
$dbname = "kcz_20";

$conn = new mysqli($servername, $username, $password, $dbname);
    echo("<h3> PIERWOWZÓR </h3>");
$sql = "SELECT * FROM pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>zarobki</th><th>data_urodzenia</th><th>dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["zarobki"].'</td><td>'.$row["data_urodzenia"].'</td><td>'.$row["dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
  
    echo("<h3> ZAD 1 </h3>");
$sql = "SELECT imie, nazwa_dzial FROM pracownicy,organizacja where id_org=dzial";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
 
       echo("<h3> ZAD 2 </h3>");
$sql = "SELECT imie, nazwa_dzial FROM pracownicy,organizacja where id_org=dzial and (dzial=1 or dzial=4) ";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 4 </h3>");
$sql = "SELECT  * FROM pracownicy,organizacja WHERE dzial = id_org  and imie like '%a'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');

   echo("<h3> ZAD 5 </h3>");
$sql = "SELECT * FROM pracownicy,organizacja WHERE dzial = id_org and imie NOT LIKE '%a'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
   
   echo("<h3> ZAD 6 </h3>");
$sql = "SELECT  * FROM pracownicy,organizacja WHERE id_org=dzial order by imie desc";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 7 </h3>");
$sql = "SELECT  * FROM pracownicy,organizacja WHERE id_org=dzial order by imie asc";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    ?>
</body>
</html>
