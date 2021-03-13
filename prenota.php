<?php

include_once "config.php";

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];

//Query di inserimento preparata

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$codice = generateRandomString();
$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno, :codice)";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$stmt->execute(['codice_fiscale'=>$codice_fiscale, 'giorno'=>$giorno, 'codice'=>$codice]);

//header('Location:Lista_prenotazioni.php');
//exit(0);

echo "<h2>Il tuo codice prenotazione è:$codice</h2>";