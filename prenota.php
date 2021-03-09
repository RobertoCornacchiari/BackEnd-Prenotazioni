<?php

ini_set('display_errors', '1');
ini_set('log_errors', '0');

$host = 'localhost';
$db = 'Tamponi';
$user = 'root';
$pass = '';
$charset = 'utf8';

//Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

//Oggetto che rappresenta la connessione al database
$pdo = new PDO($dsn, $user, $pass);

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];

//Query di inserimento preparata
$sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno)";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

//Inviamo i dati concreti che verranno messi al posto dei segnaposto(:...)
$stmt->execute(['codice_fiscale'=>$codice_fiscale, 'giorno'=>$giorno]);

header('Location:lista_prenotazioni.php');
exit(0);