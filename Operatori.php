<?php

include_once "config.php";
$stmt = $pdo->query("SELECT nomeUtente FROM account WHERE account.admin=0 AND account.cancellato=0");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");

echo json_encode($result);