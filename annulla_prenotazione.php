<?php

include_once 'config.php';

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codiceFiscale'];
$codice = $_POST['code'];

//Inviamo la query al database che la tiene in pancia
$sql = "UPDATE prenotazioni SET prenotazioni.annullata = 1 WHERE prenotazioni.codice_fiscale = :codice_fiscale AND prenotazioni.codice = :codice";
$stmt = $pdo->prepare($sql);
$stmt->execute(['codice_fiscale'=>$codice_fiscale, 'codice'=>$codice]);
echo "<h2>La tua prenotazione è stata annullata</h2>";