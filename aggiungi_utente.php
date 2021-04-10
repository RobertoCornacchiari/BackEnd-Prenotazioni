<?php

include_once 'config.php';

//Variabili valorizzate tramite POST
$nomeUtente = $_POST['nomeUtente'];
$password = $_POST['password'];
$ripetipassword = $_POST['ripetipassword'];

if ($password == $ripetipassword){
    $quanti = $pdo->query("SELECT count(*) as quanti FROM utenti WHERE utenti.username = '$nomeUtente'");
    $quanti = $quanti->fetchAll(PDO::FETCH_ASSOC);
    if ($quanti[0]['quanti'] == "0"){
        $sql = "INSERT INTO utenti VALUES(null, :nomeUtente, :password)";

        $stmt = $pdo->prepare($sql);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute(['nomeUtente'=>$nomeUtente, 'password'=>$hash]);
        echo "<h2>Registrazione avvenuta con successo</h2>";
    }
    else {
        echo "<h2>Nome utente già utilizzato</h2>";
    }
}
else {
    echo "<h2>Le due password non coincidono, riprovare</h2>";
}

