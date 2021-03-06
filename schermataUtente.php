<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
    <h1>Portale prenotazioni</h1>
    <form action="prenota.php" method="post">
        <fieldset>
            <legend>Inserisci la prenotazione</legend>
            <label for="codice">Codice Fiscale</label>
            <input type="text" id="codice" placeholder="Codice Fiscale" name="codice"/>
            <label for="giorno">Giorno</label>
            <?php
                include('dateDisponibili.php');
            ?>
            <input type="submit" value="Invia la tua richiesta">
        </fieldset>
    </form>
    <h2>Ricerca la tua prenotazione</h2>
    <form action="cerca_prenotazione.php" method="post">
        <fieldset>
            <legend>Inserisci la prenotazione</legend>
            <label for="codiceFiscale">Codice Fiscale</label>
            <input type="text" id="codiceFiscale" placeholder="Codice Fiscale" name="codiceFiscale"/>
            <label for="code">Codice prenotazione</label>
            <input type="text" id="code" placeholder="Codice" name="code"/>
            <input type="submit" value="Cerca la tua prenotazione">
        </fieldset>
    </form>

</body>
</html>