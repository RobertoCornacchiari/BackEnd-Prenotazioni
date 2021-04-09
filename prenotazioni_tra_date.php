<?php

include_once 'config.php';
require 'vendor/autoload.php';
use League\Plates\Engine;

//Variabili valorizzate tramite POST
$giornoIniziale = $_POST['giornoIniziale'];
$giornoFinale = $_POST['giornoFinale'];

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->query("
SELECT data.gen_date, prenotazioni.quanti
FROM (select * from
(select adddate('1970-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) gen_date from
(select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where gen_date BETWEEN '$giornoIniziale' AND '$giornoFinale') as data
LEFT JOIN (SELECT prenotazioni.giorno, COUNT(*) as quanti FROM prenotazioni
WHERE prenotazioni.giorno BETWEEN '$giornoIniziale' AND '$giornoFinale'
AND prenotazioni.annullata = 0
GROUP BY prenotazioni.giorno
ORDER BY prenotazioni.giorno) as prenotazioni
ON data.gen_Date = prenotazioni.giorno;
");


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$templates = new Engine('./view', 'tpl');

echo $templates->render('prenotazioni_tra_date', ['result' => $result]);
//header('Location:Lista_prenotazioni.php');
//exit(0);

//generatore di date
/*
(select * from
(select adddate('1970-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) gen_date from
(select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where gen_date BETWEEN '$giornoIniziale' AND '$giornoFinale') as date
*/