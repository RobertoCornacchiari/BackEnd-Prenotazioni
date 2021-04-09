<?php

include_once 'config.php';

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codiceFiscale'];
$codice = $_POST['code'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("SELECT giorno, annullata FROM prenotazioni WHERE prenotazioni.codice_fiscale = $codice_fiscale
AND prenotazioni.codice = '$codice'");

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)

if ($stmt->rowCount() == 0){
    echo "<h2>Valori inseriti non trovati</h2>";
    exit(0);
}

$valori = $stmt->fetch(PDO::FETCH_ASSOC);
if ($valori['annullata'] == 0){
    $risultato = $valori['giorno'];

    echo "<h2>Sei prenotato per il giorno: $risultato</h2>";
    echo "<form action='annulla_prenotazione.php' method='post'>
         <input type='submit' value='Annulla la prenotazione'>
         <input type='hidden' name='code' value='$codice'/>
         <input type='hidden' name='codiceFiscale' value='$codice_fiscale'/>
    </form>";
}
else {
    echo "<h2>La tua prenotazione è stata annullata; eseguirne una nuova</h2>";
}

