<?php 
    require_once('Modele/typePokemon.php');
    require_once('Vue/Vue.php');
    class afficherPokType{

        private $type;

        public function __construct(){
            $this->type=new Type();

        }
        public function vue(){
            $sql="SELECT t.type_id  as id	, t.type_name as nom from types t order by nom ";
        $res=$this->type->executerRequete($sql);
        $tabr=$res->fetchAll(PDO::FETCH_ASSOC); 
        $tabv=[];
        foreach($tabr as $i )
        {
            $tabv[]='<option value="'.$i['id'].'">'.$i['nom'].'</option>';
        
        }
        $vue= new Vue('printPokemon');
        $vue->generer(array('tabv'=>$tabv));

        }
    


    }
    

?>