<?php $this->layout('main', ['argomento' => 'Prenotazioni tra 2 date']) ?>

<table>
    <thead><tr><td>Data</td><td>Prenotazioni</td></tr></thead>
    <tbody>
    <?php foreach($result as $row) :?>
    <tr><td><strong><?php echo $row['gen_date']?></strong></td><td>
            <?php echo $row['quanti']?></td></tr>
    <?php endforeach ?>
    </tbody>
</table>
