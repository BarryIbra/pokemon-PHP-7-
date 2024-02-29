<?php 
    class Histo{
        function creer_operation($types,$contenu)
        {

            $dom=new DOMDocument();
            if ($dom->load(__DIR__.'/histo.xml')) {
                $ops=$dom->getElementsByTagName('operations')->item(0);
               $op=$dom->createElement('operation');
               $ops->appendChild($op);
               $type=$dom->createElement('type',$types);
               $horadate=$dom->createElement('horodate',date("Y-m-d H:i:s"));
               $des=$dom->createElement('desc',$contenu);
               $op->appendChild($type);
               $op->appendChild($horadate);
               $op->appendChild($des);
               $dom->save(__DIR__.'/histo.xml');


            
            } else
             {
                $dom->appendChild($dom->implementation->createDocumentType('operations','',__DIR__.'/../data/histo.dtd'));
                $ops=$dom->createElement('operations');
                $op=$dom->createElement('operation');
                $ops->appendChild($op);
               $type=$dom->createElement('type','other');
               $horadate=$dom->createElement('horodate',date("Y-m-d H:i:s"));
               $des=$dom->createElement('desc','Création du fichier XML');
               $op->appendChild($type);
               $op->appendChild($horadate);
               $op->appendChild($des);
               $dom->appendChild($ops);


                
                $op=$dom->createElement('operation');
               $type=$dom->createElement('type',$types);
               $horadate=$dom->createElement('horodate',date("Y-m-d H:i:s"));
               $des=$dom->createElement('desc',$contenu);
               $op->appendChild($type);
               $op->appendChild($horadate);
               $op->appendChild($des);
               $ops->appendChild($op);

               
               $dom->save(__DIR__.'/histo.xml');
           
            }
        }

        public function AjoutLigneM($id,$nom,$poidsA,$poidsN,$tailleA,$tailleN){
           
            $con='La taille ('.$tailleA.'->'.$tailleN.') et le poids ('.$poidsA.'->'.$poidsN.') de '.$nom.' [id='.$id.'] modifiés.';
            $this->creer_operation('modifier',$con);

        }
        public function afficher($id=0){
            $con='Récupération des tous les Pokemon et leurs types en base.';
            if($id!==0)
                $con="Récupération des Pokémon pour le type d'id=".$id;
            $this->creer_operation('voir',$con);
        }
    }


?>
