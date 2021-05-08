<?php

include_once "config.php";

$presidio = $_GET['presidio'];

$giornoIniziale = new DateTime();
$giornoFinale = new DateTime();
date_add($giornoFinale, date_interval_create_from_date_string('7 days'));
$giornoIniziale = $giornoIniziale->format("Y-m-d");
$giornoFinale = $giornoFinale->format("Y-m-d");

$stmt = $pdo->query(" SELECT tabella.gen_date as data FROM (
SELECT data.gen_date, prenotazioni.quanti
FROM (select * from
(select adddate('1970-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) gen_date from
(select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where gen_date BETWEEN '$giornoIniziale' AND '$giornoFinale') as data
LEFT JOIN (SELECT prenotazione.giorno, COUNT(*) as quanti FROM prenotazione, presidio
WHERE prenotazione.giorno BETWEEN '$giornoIniziale' AND '$giornoFinale'
AND prenotazione.id_presidio = presidio.id
AND presidio.value = '$presidio'
AND prenotazione.annullata = 0
GROUP BY prenotazione.giorno
ORDER BY prenotazione.giorno) as prenotazioni
ON data.gen_Date = prenotazioni.giorno) as tabella
WHERE (tabella.quanti <=5 OR tabella.quanti IS NULL)

");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");

echo json_encode($result);