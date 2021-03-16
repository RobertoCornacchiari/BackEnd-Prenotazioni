<?php

include_once "config.php";
require 'vendor/autoload.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$stmt = $pdo->query("SELECT codice_fiscale, giorno FROM prenotazioni");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $templates->render('lista_prenotazioni', ['result' => $result]);

//Rendo un template che mi visualizza la tabella

/*
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

*/
?>



