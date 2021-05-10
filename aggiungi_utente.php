<?php

include_once 'config.php';

//Variabili valorizzate tramite POST
$nomeUtente = 'Roberto';
$password = "Roberto";
$ripetipassword = 'Roberto';

if ($password == $ripetipassword) {
    $quanti = $pdo->query("SELECT count(*) as quanti FROM account WHERE account.nomeUtente = '$nomeUtente'");
    $quanti = $quanti->fetchAll(PDO::FETCH_ASSOC);
    if ($quanti[0]['quanti'] == "0"){
        $sql = "INSERT INTO account VALUES(null, :nomeUtente, :password, :admin)";
        $stmt = $pdo->prepare($sql);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo $hash;
        $stmt->execute(['nomeUtente'=>$nomeUtente, 'password'=>$hash, 'admin'=>0]);
        echo "<h2>Registrazione avvenuta con successo</h2>";
    }
    else {
        echo "<h2>Nome utente già utilizzato</h2>";
    }
}
else {
    echo "<h2>Le due password non coincidono, riprovare</h2>";
}

