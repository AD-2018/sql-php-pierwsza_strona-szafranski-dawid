<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="kox.css">
</head>
<body>
    <a href="https://github.com/AD-2018/sql-php-pierwsza_strona-szafranski-dawid">github</a>
    <h1>Dawid Szafrański</h1>
    
    <div class = "nav">
        <a href="index.php">Strona Główna</a>
        <br>
        <a href="pracownicy_organizacja.php">Pracownicy Organizacja</a>
        <br>
        <a href="funkcje_agregujace.php">Funkcje Agregujace</a>
        <br>
        <a href="data_czas.php">Data i Czas</a>
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
    
    echo("<h3> ZAD 1</h3>");
$sql = "SELECT * ,YEAR(curdate())-YEAR(data_urodzenia) AS wiek FROM pracownicy;";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>wiek</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["wiek"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
       echo("<h3> ZAD 2</h3>");
$sql = "SELECT * ,YEAR(curdate())-YEAR(data_urodzenia) AS wiek FROM pracownicy, organizacja WHERE id_org=dzial and nazwa_dzial='serwis'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>wiek</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["wiek"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 3 </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma_lat from pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>Suma Lat</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["suma_lat"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 4 </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma from pracownicy,organizacja WHERE id_org=dzial and nazwa_dzial='handel'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>Suma_lat_dzialu_handel</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["suma"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 5 </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma_lat_kobiet from pracownicy WHERE imie LIKE '%a'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>Suma_lat_kobiet</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["suma_lat_kobiet"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 6 </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma_lat_mezczyzn from pracownicy WHERE imie not LIKE '%a'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>Suma_lat_mezczyzn</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["suma_lat_mezczyzn"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 7 </h3>");
$sql = "SELECT AVG(YEAR(CURDATE()) - YEAR(data_urodzenia)) as srednia, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY dzial";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>srednia</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["srednia"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 8 </h3>");
$sql = "SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma_lat, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY dzial";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>suma_lat</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["suma_lat"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 9 </h3>");
$sql = "SELECT imie, MAX(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY dzial";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>wiek</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["wiek"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 10 </h3>");
$sql = "SELECT imie, MIN(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial and (nazwa_dzial='handel' or nazwa_dzial='serwis') GROUP BY dzial";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>wiek</th><th>nazwa_dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["wiek"].'</td><td>'.$row["nazwa_dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    
    echo("<h3> ZAD 11 </h3>");
$sql = "SELECT imie,DATEDIFF(CURDATE(),data_urodzenia) AS dni_zycia FROM pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>dni_zycia</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["dni_zycia"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
  echo("<h3> ZAD 12 </h3>");
$sql = "SELECT * FROM pracownicy WHERE imie NOT LIKE '%a' ORDER BY data_urodzenia ASC LIMIT 1";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>zarobki</th><th>data_urodzenia</th><th>dzial</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["zarobki"].'</td><td>'.$row["data_urodzenia"].'</td><td>'.$row["dzial"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo ("<h3>FORMATOWANIE DAT </h3>");
    
     echo("<h3> ZAD 1 </h3>");
    $sql = "SELECT *, DATE_FORMAT(data_urodzenia,'%W-%m-%Y') as wiek from pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>wiek</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["wiek"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 2 </h3>");
    $sql1 = "SET lc_time_names = 'pl_PL'";
    $sql2 ="SELECT DATE_FORMAT(CURDATE(), '%W')as data";
    echo ("<li>".$sql."</li><br><br>");
    $result = mysqli_query($conn, $sql1);
    $result = mysqli_query($conn, $sql2);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>data</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["data"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 3 </h3>");
    $sql ="SELECT *, DATE_FORMAT(data_urodzenia,'%W-%M-%Y') as data from pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>data</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["data"].'</td><td>');
                echo ('</tr>');
        }echo ('</table>');
    
      echo("<h3> ZAD 4 </h3>");
    $sql ="SELECT curtime(4) as data";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>data</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["data"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 5 </h3>");
    $sql ="SELECT *, DATE_FORMAT(data_urodzenia,'%Y-%M-%W') as data from pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>data</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["data"].'</td><td>');
                echo ('</tr>');
        }echo ('</table>');
    
    echo("<h3> ZAD 6 </h3>");
    $sql ="SELECT imie,DATEDIFF(CURDATE(),data_urodzenia) as dni, DATEDIFF(CURDATE(),data_urodzenia)*24 as godziny, DATEDIFF(CURDATE(),data_urodzenia)*24*60 as minuty FROM pracownicy";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>imie</th><th>dni</th><th>godziny</th><th>minuty</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["imie"].'</td><td>'.$row["dni"].'</td><td>'.$row["godziny"].'</td><td>'.$row["minuty"].'</td><td>');
                echo ('</tr>');
        }echo ('</table>');
    
   echo("<h3> ZAD 8 </h3>");
$sql = "SELECT DATE_FORMAT(data_urodzenia,'%W') as dzien, imie, data_urodzenia FROM pracownicy ORDER BY CASE
          WHEN dzien = 'Poniedziałek' THEN 1
          WHEN dzien = 'Wtorek' THEN 2
          WHEN dzien = 'Środa' THEN 3
          WHEN dzien= 'Czwartek' THEN 4
          WHEN dzien = 'Piątek' THEN 5
          WHEN dzien = 'Sobota' THEN 6
          WHEN dzien = 'niedziela' THEN 7
       END ASC";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>dzien</th><th>imie</th><th>data_urodzenia</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["dzien"].'</td><td>'.$row["imie"].'</td><td>'.$row["data_urodzenia"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
       
    echo("<h3> ZAD 9 </h3>");
    $sql ="SELECT Count(DATE_FORMAT(data_urodzenia, '%W')) as urodzenia_pon FROM pracownicy where DATE_FORMAT(data_urodzenia, '%W')='Poniedziałek'";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>urodzenia_pon</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["urodzenia_pon"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
      echo("<h3> ZAD 10 </h3>");
$sql = "SELECT DATE_FORMAT(data_urodzenia,'%W') as dzien, count(date_format(data_urodzenia, '%W')) as liczba FROM pracownicy GROUP BY dzien ORDER BY CASE
          WHEN dzien = 'Poniedziałek' THEN 1
          WHEN dzien = 'Wtorek' THEN 2
          WHEN dzien = 'Środa' THEN 3
          WHEN dzien = 'Czwartek' THEN 4
          WHEN dzien = 'Piątek' THEN 5
          WHEN dzien = 'Sobota' THEN 6
          WHEN dzien = 'Niedziela' THEN 7
          END ASC";
    echo ("<li>".$sql."</li><br><br>");
$result = mysqli_query($conn, $sql);
    echo ('<table border = "1" class = "moja_tabelka">');
    echo ("<tr><th>dzien</th><th>liczba</th></tr>");
        while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>'.$row["dzien"].'</td><td>'.$row["liczba"].'</td>');
                echo ('</tr>');
        }echo ('</table>');
    
    ?>
        </body>
        </html>
