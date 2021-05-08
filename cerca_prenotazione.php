<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);


$codice_fiscale = $rawdata['codiceFiscale'];
$codice = $rawdata['codice'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("SELECT giorno, annullata, codice FROM prenotazione WHERE prenotazione.codice_fiscale = '$codice_fiscale'
AND prenotazione.codice = '$codice'");

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$valori = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($valori == null){
    echo json_encode("Errore");
    exit(0);
}

$valori = $valori[0];

if ($valori['annullata'] == 0){
    $risultato = $valori['giorno'];
    echo json_encode($valori);
    /*
    echo "<h2>Sei prenotato per il giorno: $risultato</h2>";
    echo "<form action='annulla_prenotazione.php' method='post'>
         <input type='submit' value='Annulla la prenotazione'>
         <input type='hidden' name='code' value='$codice'/>
         <input type='hidden' name='codiceFiscale' value='$codice_fiscale'/>
    </form>";
    */
}
else {
    echo json_encode("Annullata");
}

