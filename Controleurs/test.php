<?php
require_once('Modele/Pokemon.php');
require_once('Vue/Vue.php');
class ControlTest{
    private $pokemon;
    public function __construct() {
        $this->pokemon=new Pokemon(); 
    }
    public function vuetest()
    {
        $tabpk=$this->pokemon->getPokemon()->fetchAll(PDO::FETCH_CLASS,'Pokemon');
    $final=[];
    foreach($tabpk as $el)
    {
        $el->remplirType();
        $final[$el->getId()]=$el;

        
    }
   
        $vue=new Vue("test");
        $vue->generer(array('final'=>$final));

    }
}

?>