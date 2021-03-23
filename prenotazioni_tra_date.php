<?php

include_once 'config.php';
require 'vendor/autoload.php';
use League\Plates\Engine;

//Variabili valorizzate tramite POST
$giornoIniziale = $_POST['giornoIniziale'];
$giornoFinale = $_POST['giornoFinale'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("SELECT prenotazioni.giorno, COUNT(*) as quanti FROM prenotazioni 
WHERE prenotazioni.giorno BETWEEN '$giornoIniziale' AND '$giornoFinale'
GROUP BY prenotazioni.giorno");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$templates = new Engine('./view', 'tpl');

echo $templates->render('prenotazioni_tra_date', ['result' => $result]);
//header('Location:Lista_prenotazioni.php');
//exit(0);