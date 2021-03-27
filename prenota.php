<?php

include_once "config.php";

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['dateDisponibili'];
$sql_numero= "SELECT COUNT(*) AS n_prenotazioni FROM prenotazioni WHERE DAY(prenotazioni.giorno) = DAY('$giorno')";

$n_prenotazioni = $pdo->query($sql_numero)->fetchAll()[0]["n_prenotazioni"];

if ($n_prenotazioni >= 5){
    echo "Impossibile prenotare in questo giorno per numero di prenotazioni massimo raggiunto";
    exit(0);
}

require("./phpqrcode/qrlib.php");
$errorCorrectionLevel = 'L';
$matrixPointSize = 10;

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$codice = generateRandomString();

$filename = 'qrcode'.md5($codice.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';

QRcode::png($codice, $filename, $errorCorrectionLevel. $matrixPointSize, 2);

//Query di inserimento preparata
$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno, :codice)";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$stmt->execute(['codice_fiscale'=>$codice_fiscale, 'giorno'=>$giorno, 'codice'=>$codice]);

//header('Location:Lista_prenotazioni.php');
//exit(0);

echo "<h2>Il tuo codice prenotazione è:$codice</h2>";

echo "<img src='$filename' width='300px' height='300px'/>";