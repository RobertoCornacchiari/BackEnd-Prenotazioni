<select name='dateDisponibili' id='dateDisponibili' placeholder="Data">
<?php foreach($result as $row) :?>
        <?php
            if ($row['quanti'] == 5)?>
                option" . $row["data"] . "</option>;
        ?>
<?php endforeach ?>
</select>

