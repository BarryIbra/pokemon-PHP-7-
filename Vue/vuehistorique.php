<?php $this->titre="Historisation";?>
<h2>Modifier</h2>
<table>
    <thead><tr><th>Horodatage</th><th>Description</th></tr></thead>
    <tbody>
        <?php
                foreach($modifier as $m)
                { ?>
                    <tr><td><?= $m['horaire'];?></td><td><?= $m['desc'];?></td></tr>

               <?php } 
        ?>

    </tbody>
</table>

<h2>Voir</h2>
<table>
    <thead><tr><th>Horodatage</th><th>Description</th></tr></thead>
    <tbody>
    <?php
                foreach($voir as $v)
                { ?>
                    <tr><td><?= $v['horaire'];?></td><td><?= $v['desc'];?></td></tr>

               <?php } 
        ?>

    </tbody>
</table>

<h2>Autre</h2>
<table>
    <thead><tr><th>Horodatage</th><th>Description</th></tr></thead>
    <tbody>
    <?php
                foreach($autre as $a)
                { ?>
                    <tr><td><?= $a['horaire'];?></td><td><?= $a['desc'];?></td></tr>

               <?php } 
        ?>

    </tbody>
</table>


