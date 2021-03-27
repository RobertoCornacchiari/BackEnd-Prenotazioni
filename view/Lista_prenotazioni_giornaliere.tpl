<?php $this->layout('main', ['argomento' => 'Lista delle prenotazioni giornaliere']) ?>

    <table>
        <thead><tr><td>Codice Fiscale</td><td>Data</td></tr></thead>
        <tbody>
        <?php foreach($result as $row) :?>
        <tr><td><strong><?php echo $row['codice_fiscale']?></strong></td><td>
                <?php echo $row['giorno']?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
