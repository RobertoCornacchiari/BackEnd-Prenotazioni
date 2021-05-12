<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$codice = $rawdata['codice'];
$esito = $rawdata['esito'];
$operatore = $rawdata['operatore'];

$id = $pdo->query("SELECT account.id FROM account WHERE account.nomeUtente='$operatore'");
$id = $id->fetch();
$id = $id['id'];

$stmt = $pdo->query("SELECT prenotazione.giorno, prenotazione.annullata, prenotazione.codice, presidio.nome FROM prenotazione, presidio WHERE prenotazione.id_presidio = presidio.id
AND prenotazione.codice = '$codice'");

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$valori = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($valori == null){
    echo json_encode("Errore");
    exit(0);
}

$sql = "UPDATE tampone SET tampone.esito = :esito, tampone.id_sanitario=:id WHERE tampone.id_prenotazione = (SELECT prenotazione.id FROM prenotazione WHERE prenotazione.codice=:codice)";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'esito'=>$esito, 'id'=>$id, 'codice'=>$codice]);
echo json_encode("Fatto");