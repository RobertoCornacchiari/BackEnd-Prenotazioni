<?php

include_once 'config.php';
require 'vendor/autoload.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');
//Variabili valorizzate tramite POST
$nomeUtente = $_POST['nomeUtente'];
$password = $_POST['password'];

$riga = $pdo->query("SELECT count(*) as quanti, utenti.username, utenti.password FROM utenti WHERE utenti.username = '$nomeUtente'");
$riga = $riga->fetch(PDO::FETCH_ASSOC);
if ($riga['quanti'] == "0"){
    echo $templates->render('login_fallito', ['username' => $nomeUtente]);
}
else {
    $pass_hash = $riga['password'];
    if (password_verify($password, $pass_hash)) {
        //La password è corretta
        $_SESSION['username'] = $nomeUtente;
        echo $templates->render('utente_autenticato', ['username' => $nomeUtente]);
    } else {
        //La password è sbagliata
        echo $templates->render('login_fallito', ['username' => $nomeUtente]);
    }
}