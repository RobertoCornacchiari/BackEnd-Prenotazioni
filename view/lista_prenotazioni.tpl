<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
    <h1>Portale prenotazioni</h1>
    <h2>Lista delle prenotazioni</h2>

    <table>
        <thead><tr><td>Codice Fiscale</td><td>Data</td></tr></thead>
        <tbody>
        <?php foreach($result as $row) :?>
        <tr><td><strong><?php echo $row['codice_fiscale']?></strong></td><td>
                <?php echo $row['giorno']?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>