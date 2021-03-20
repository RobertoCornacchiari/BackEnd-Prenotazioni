<?php

include_once "config.php";
require 'vendor/autoload.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$stmt = $pdo->query("SELECT codice_fiscale, giorno FROM prenotazioni WHERE DAY(giorno) = DAY(now())");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $templates->render('lista_prenotazioni_giornaliere', ['result' => $result]);

?>