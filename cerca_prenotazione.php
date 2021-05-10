<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);


$codice_fiscale = $rawdata['codiceFiscale'];
$codice = $rawdata['codice'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("SELECT prenotazione.giorno, prenotazione.annullata, prenotazione.codice, presidio.nome FROM prenotazione, presidio WHERE prenotazione.id_presidio = presidio.id AND prenotazione.codice_fiscale = '$codice_fiscale'
AND prenotazione.codice = '$codice'");

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$valori = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($valori == null){
    echo json_encode("Errore");
    exit(0);
}

$valori = $valori[0];

if ($valori['annullata'] == 0){
    echo json_encode($valori);
}
else {
    echo json_encode("Annullata");
}

