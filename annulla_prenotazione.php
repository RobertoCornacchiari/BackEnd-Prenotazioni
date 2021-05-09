<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$codice = $rawdata['codice'];

//Inviamo la query al database che la tiene in pancia
$sql = "UPDATE prenotazione SET prenotazione.annullata = 1 WHERE prenotazione.codice = :codice";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'codice'=>$codice]);