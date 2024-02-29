<?php
    require_once('modele.php');
    require_once('typePokemon.php');

    class Pokemon extends Modele{
        private $id;
        private $nom;
        private $taille;
        private $poids;
        
        private $type ;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Set the value of taille
         *
         * @return  self
         */ 
        public function setTaille($taille)
        {
                $this->taille = $taille;

                return $this;
        }

        /**
         * Set the value of poids
         *
         * @return  self
         */ 
        public function setPoids($poids)
        {
                $this->poids = $poids;

                return $this;
        }

        public function remplirType()
        {
                if($this->id!=null)
                {
                    $type=new Type();
                    
                    $this->type=$type->getTypesPok($this->id);
                }
        }
        public function getPokemon(){
            $sql="select pok_id as id, pok_name as nom, pok_height as poids ,pok_weight as taille from pokemon order by nom ";
            $resultat=$this->executerRequete($sql); 
            return $resultat;
        
        }
        public function modifier($nom,$taille,$poids)
        {
                $sql='update pokemon set  pok_height=:poids ,pok_weight=:taille where pok_name=:nom';
                $par=array('nom'=>$nom,'taille'=>$taille,'poids'=>$poids);
                $this->executerRequete($sql,$par);
        }
        public function getPokmonByNom($nom){
                $sql='select pok_id as id, pok_name as nom, pok_height as poids, pok_weight as taille from pokemon where pok_name=:nom';
                $resul=$this->executerRequete($sql,array('nom'=>$nom));
                return $resul->fetch();


        }

        public function getpokByType($id_type){
                $sql="SELECT p.pok_name as nom, p.pok_height as taille, p.pok_weight as poids FROM pokemon_types t JOIN pokemon p ON t.pok_id=p.pok_id WHERE t.type_id=?";
                $op=[$id_type];
                $rep=$this->executerRequete($sql,$op);

                return $rep->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
    }

    
        
   

?>