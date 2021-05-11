<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$nomeUtente = $rawdata['nomeUtente'];

$sql = "UPDATE account SET account.cancellato = 1 WHERE account.nomeUtente = :nome";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'nome'=>$nomeUtente]);