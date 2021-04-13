<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Prenotazioni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('config.php');
if (isset($_SESSION['username'])) {
    echo "<h1>Elenco prenotazioni: </h1>";
        include('prenotazioni.php');
}
else {
    echo "<h1>Utente non autorizzato</h1>";
}
?>

</body>
</html>