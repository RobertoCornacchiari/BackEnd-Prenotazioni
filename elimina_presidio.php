<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$presidio = $rawdata['presidio'];

$sql = "UPDATE presidio SET presidio.dismesso = 1 WHERE presidio.value = :value";
$stmt = $pdo->prepare($sql);
$stmt->execute([ 'value'=>$presidio]);