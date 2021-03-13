<?php

include_once "config.php";


$stmt = $pdo->query("SELECT codice_fiscale, giorno FROM prenotazioni");
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



