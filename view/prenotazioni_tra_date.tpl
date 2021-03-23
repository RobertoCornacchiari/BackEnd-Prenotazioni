<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
<h1>Portale prenotazioni</h1>
<h2>Prenotazioni tra 2 date</h2>

<table>
    <thead><tr><td>Data</td><td>Prenotazioni</td></tr></thead>
    <tbody>
    <?php foreach($result as $row) :?>
    <tr><td><strong><?php echo $row['gen_date']?></strong></td><td>
            <?php echo $row['quanti']?></td></tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>