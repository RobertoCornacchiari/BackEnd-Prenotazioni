<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$codice = $rawdata['codice'];
$presidio = $rawdata['presidio'];

$stmt = $pdo->query("SELECT prenotazione.giorno, presidio.value, prenotazione.annullata FROM prenotazione, presidio WHERE prenotazione.id_presidio = presidio.id AND prenotazione.codice = '$codice'");

$valori = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($valori == null){
    echo json_encode("NonTrovato");
    exit(0);
}

$valori = $valori[0];

if ($valori['annullata'] == 1){
    echo json_encode("Annullata");
}
else if ($valori['value'] != $presidio){
    echo json_encode("PresidioSbagliato");
}
else if ($valori['giorno'] != date("Y-m-d")) {
    echo json_encode("GiornoSbagliato");
}
else {
    echo json_encode("Oggi");
}
