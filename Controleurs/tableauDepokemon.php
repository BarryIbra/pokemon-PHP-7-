<?php
    require_once('../Modele/Pokemon.php');
    require_once('../Modele/historique.php');
    $id=$_POST['id'] ;
    $hist=new Histo();
    $hist->afficher($id);
    $pok=new Pokemon();
    $tab=$pok->getpokByType($id);
    echo json_encode($tab)

?>