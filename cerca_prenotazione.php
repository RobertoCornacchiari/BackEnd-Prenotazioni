<?php

include_once "config.php";

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codiceFiscale'];
$codice = $_POST['code'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("SELECT giorno FROM prenotazioni WHERE prenotazioni.codice_fiscale = $codice_fiscale
AND prenotazioni.codice = '$codice'");

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)

if ($stmt->rowCount() == 0){
    echo "<h2>Valori inseriti non trovati</h2>";
    exit(0);
}

$giorno = $stmt->fetch(PDO::FETCH_ASSOC);
$risultato = $giorno['giorno'];

echo "<h2>Sei prenotato per il giorno: $risultato</h2>";
//header('Location:Lista_prenotazioni.php');
//exit(0);