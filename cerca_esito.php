<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);


$codice_fiscale = $rawdata['codiceFiscale'];
$codice = $rawdata['codice'];

$stmt = $pdo->query("SELECT prenotazione.codice, prenotazione.giorno, presidio.nome, prenotazione.annullata, tampone.esito FROM prenotazione, tampone, presidio WHERE tampone.id_prenotazione = prenotazione.id
AND presidio.id = prenotazione.id_presidio AND prenotazione.codice_fiscale = '$codice_fiscale' AND prenotazione.codice = '$codice'");

$risultati = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($risultati == null){
    echo json_encode("Errore");
    exit(0);
}
$risultati = $risultati[0];
if ($risultati['annullata'] == 0){
    echo json_encode($risultati);
} else {
    echo json_encode('Annnullata');
}

