<?php

ini_set('display_errors', '1');
ini_set('log_errors', '0');

$host = 'localhost';
$db = 'Tamponi';
$user = 'root';
$pass = '';
$charset = 'utf8';

//Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

//Oggetto che rappresenta la connessione al database
$pdo = new PDO($dsn, $user, $pass);

//Query
$sql = "SELECT codice_fiscale, giorno FROM prenotazioni";

$stmt = $pdo->query($sql);
$tabella = '';
echo "<ol>\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $stringa = $row['codice_fiscale'] . ", " . $row['giorno'];
    $tabella = $tabella . "<tr><td>" . $row['codice_fiscale'] . "</td><td>" . $row['giorno'] . "</td></tr>\n";
    echo "<li>" . $stringa . "</li>";
}
echo "</ol>\n";

echo "<table>\n";
echo "<thead><tr><td>" . "Codice Fiscale" . "</td><td>" . "Data" . "</td></tr></thead>\n";
echo "<tbody>";
echo $tabella;
echo "</tbody>";
echo "</table>\n";
?>



