<?php

include_once "config.php";

//Variabili valorizzate tramite POST

$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$rawdata = json_decode($rawdata, true);

$nomeUtente = $rawdata['nomeUtente'];
$password = $rawdata['password'];
$ripetipassword = $rawdata['ripetiPassword'];
$admin = $rawdata['admin'];



if ($password == $ripetipassword) {
    $quanti = $pdo->query("SELECT count(*) as quanti FROM account WHERE account.nomeUtente = '$nomeUtente'");
    $quanti = $quanti->fetchAll(PDO::FETCH_ASSOC);
    if ($quanti[0]['quanti'] == "0"){
        $sql = "INSERT INTO account VALUES(null, :nomeUtente, :password, :admin, :id_admin)";
        $stmt = $pdo->prepare($sql);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $id = $pdo->query("SELECT account.id FROM account WHERE account.nomeUtente='$nomeUtente'");
        $id = $id->fetch();
        $id = $id['id'];
        $stmt->execute(['nomeUtente'=>$nomeUtente, 'password'=>$hash, 'admin'=>0, 'id_admin'=>$id]);
    }
    else {
        echo json_encode("Utilizzato");
    }
}
else {
    echo json_encode("Errore");
}

