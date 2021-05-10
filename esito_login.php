<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$nomeUtente = $rawdata['nomeUtente'];
$password = $rawdata['password'];
echo $password;

$riga = $pdo->query("SELECT count(*) as quanti, account.nomeUtente, account.password, account.admin FROM account WHERE account.nomeUtente = '$nomeUtente'");
$riga = $riga->fetch(PDO::FETCH_ASSOC);
if ($riga['quanti'] == "0"){
    echo json_encode("Errore 1 ");
}
else {
    $pass_hash = $riga['password'];
    echo json_encode($pass_hash);
    if (password_verify($password, $pass_hash)) {
        //La password è corretta
        $autorizzazione['nomeUtente'] = $nomeUtente;
        $autorizzazione['admin'] = $riga['admin'];
        echo json_encode($autorizzazione);
    } else {
        //La password è sbagliata
        echo json_encode("Errore 2");
    }
}