<?php 
    require_once('Modele/Pokemon.php');
    require_once('Vue/Vue.php');
    class ModifierPokemon{
        private $pokemon;


        public function __construct()
        {
            $this->pokemon=new Pokemon();
        }
        public function modifier($nom,$taille,$poids)
        {
            $this->pokemon->modifier($nom,$taille,$poids);

        }


        public function getOption(){
            $resBrut= $this->pokemon->getPokemon();
            $tab=[];
            while($donne=$resBrut->fetch())
            {
                $tab[]=$donne['nom'];
            }
            function opti(&$don,$cle)
            {
                $don='<option>'.$don.'</option>';
            }

            array_walk_recursive($tab,'opti');

            return $tab;

        }
        public function vueModifierPokemon(){
            $tab=$this->getOption();
            $vue=new Vue('modifyPokemon');
            $vue->generer(array('tab'=>$tab));
        }



    }
?>