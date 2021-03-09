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

//Query
$sql = "SELECT * FROM prenotazioni";

$stmt = $pdo->query($sql);
echo "<pre>";
var_dump($stmt->fetchAll());
echo "</pre>";
