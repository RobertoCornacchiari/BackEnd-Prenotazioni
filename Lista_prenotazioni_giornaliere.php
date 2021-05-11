<?php

include_once "config.php";

$stmt = $pdo->query("SELECT codice_fiscale, codice, presidio.nome FROM prenotazione, presidio WHERE prenotazione.id_presidio=presidio.id AND DAY(giorno) = DAY(now()) ORDER BY presidio.nome");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");

echo json_encode($result);

?>