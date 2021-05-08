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
/*
$filename = 'qrcode'.md5($codice.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';

QRcode::png($codice, $filename, $errorCorrectionLevel. $matrixPointSize, 2);

$data = $codice;
$options = new QROptions([
    'version'    => 5,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'eccLevel'   => QRCode::ECC_L,
]);

$qrcode = new QRCode($options);
$qrcode->render($data);
*/

if ($codice_fiscale != "" && $giorno != null && $presidio != null) {
    //Query di inserimento preparata
    $sql = "INSERT INTO prenotazione VALUES(null, :giorno, :codice_fiscale,  :codice, :annullata, :presidio)";
    $numero = $pdo->query("SELECT presidio.id FROM presidio WHERE presidio.value='$presidio'");
    $numero = $numero->fetchAll(PDO::FETCH_ASSOC);
//Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);
//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
    $stmt->execute(['giorno'=>$giorno, 'codice_fiscale'=>$codice_fiscale, 'codice'=>$codice, 'annullata'=>0, 'presidio'=>$numero[0]['id']]);
    echo json_encode($codice);
//header('Location:Lista_prenotazioni.php');
//exit(0);

//echo "<img src='$filename' width='300px' height='300px'/>";
}
else {
    echo json_encode("Errore");
}
