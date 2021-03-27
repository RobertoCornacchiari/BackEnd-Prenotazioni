<?php $this->layout('main', ['argomento' => 'Lista delle prenotazioni']) ?>

    <h2>Lista delle prenotazioni</h2>

    <table>
        <thead><tr><td>Codice Fiscale</td><td>Data</td></tr></thead>
        <tbody>
        <?php foreach($result as $row) :?>
        <tr><td><strong><?php echo $row['codice_fiscale']?></strong></td><td>
                <?php
                    if ($row['quanti'] == null)
                        echo 0;
                    else
                        echo $row['quanti'];?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>