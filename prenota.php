<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);


$codice_fiscale = $rawdata['codice'];
$giorno = $rawdata['giorno'];
$presidio = $rawdata['presidio'];


function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$codice = generateRandomString();

if ($codice_fiscale != "" && $giorno != null && $presidio != null) {
    //Query di inserimento preparata
    $sql = "INSERT INTO prenotazione VALUES(null, :giorno, :codice_fiscale,  :codice, :annullata, :presidio)";
    $numero = $pdo->query("SELECT presidio.id FROM presidio WHERE presidio.value='$presidio'");
    $numero = $numero->fetchAll(PDO::FETCH_ASSOC);
//Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);
//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
    $stmt->execute(['giorno'=>$giorno, 'codice_fiscale'=>$codice_fiscale, 'codice'=>$codice, 'annullata'=>0, 'presidio'=>$numero[0]['id']]);

    $esito = "INSERT INTO tampone VALUES(null, :esito, :id_sanitario, :id_prenotazione)";
    $prepara = $pdo->prepare($esito);
    $id = $pdo->query("SELECT prenotazione.id FROM prenotazione WHERE prenotazione.codice='$codice' 
                                           AND prenotazione.codice_fiscale='$codice_fiscale'");
    $id = $id->fetchAll(PDO::FETCH_ASSOC);
    $id = $id[0]['id'];

    $prepara->execute(['esito'=>"pending", 'id_sanitario'=>null, 'id_prenotazione'=>$id]);
    echo json_encode($codice);
//header('Location:Lista_prenotazioni.php');
//exit(0);

//echo "<img src='$filename' width='300px' height='300px'/>";
}
else {
    echo json_encode("Errore");
}
