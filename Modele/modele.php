<?php 
    require_once('connexpdo.inc.php');

    abstract class Modele{
        

        public function executerRequete($sql, $params = null) {
            if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
            }
            else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
            }
            return $resultat;
            }
            
            private function getBdd(){
                
                    $db=connexpdo('pokemon');

                
                return $db;
            }
    }
    

?>