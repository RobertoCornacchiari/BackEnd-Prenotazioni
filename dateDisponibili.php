<?php

include_once "config.php";

$giornoIniziale = new DateTime();
$giornoFinale = new DateTime();
date_add($giornoFinale, date_interval_create_from_date_string('7 days'));
$giornoIniziale = $giornoIniziale->format("Y-m-d");
$giornoFinale = $giornoFinale->format("Y-m-d");

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

echo "<select name='dateDisponibili' id='dateDisponibili'>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data = $row['gen_date'];
    if ($row['quanti'] < 5){
        echo "<option value=" . $data.date_format("dd-MM-yy") . ">" . $data . "</option>";
    }
}
echo "</select>";




