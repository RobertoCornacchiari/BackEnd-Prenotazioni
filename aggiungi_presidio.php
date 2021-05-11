<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$presidio = $rawdata['presidioNome'];
$value = $rawdata['presidioValue'];

$quanti = $pdo->query("SELECT count(*) as quanti FROM presidio WHERE presidio.nome = '$presidio'");
$quanti = $quanti->fetchAll(PDO::FETCH_ASSOC);

if ($quanti[0]['quanti'] == "0"){
    $sql = "INSERT INTO presidio VALUES(null, :presidio, :value, :dismesso)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['presidio'=>$presidio, 'value'=>$value, 'dismesso'=>0]);
    echo json_encode("Inserimento effettuato");
}
else {
    echo json_encode("Errore");
}
