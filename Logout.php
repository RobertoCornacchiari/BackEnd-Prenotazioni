<?php

require 'vendor/autoload.php';
include_once "config.php";

use League\Plates\Engine;

//Distruzione sul server del file
session_destroy();

//Distruzione in memoria della SESSION
$_SESSION = array();

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

echo $templates->render('logout');