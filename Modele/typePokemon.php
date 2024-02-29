<?php
    require_once('modele.php');

    class Type extends Modele{
        private $id;
        private $nom;

        public function __construct(){
            
        }


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
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
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
        public function __set($at,$val )
        {
            $this->at=$val;
        }
        public function getTypesPok($id)
        {
            if($id!=null)
            {
                $sql="SELECT type_id as id, type_name as nom from types
            where type_id in (SELECT type_id FROM pokemon_types WHERE pok_id=:pok_id)";
            $par=array('pok_id'=>$id);
            $resultat=$this->executerRequete($sql,$par);
            $tab=$resultat->fetchAll(PDO::FETCH_CLASS,get_class($this));
            return $tab;

            }
            
            

        }
    }
    
?>