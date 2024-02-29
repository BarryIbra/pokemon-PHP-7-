<?php 
   require_once('Vue/Vue.php');
  class donHist{

      public function vueHistorique()
      {
         $voir=[];
         $modifier=[];
         $autre=[];
         if($ops=simplexml_load_file('Modele/histo.xml'))
         {
            foreach($ops->operation as $op )
            {
               $ar=[];
               $ar['horaire']=$op->horodate;
                  $ar['desc']=$op->desc;
               if($op->type=='other')
               {
                  $autre[]=$ar;
               }
               elseif($op->type=='voir')
               {
                  $voir[]=$ar;

               }
               else{
                  $modifier[]=$ar;
               }
            }
         }
         else{
            throw new Exception('aucune operation effectuée');
         }
         $vue=new Vue('historique');
         $vue->generer(array('voir'=>$voir,'modifier'=>$modifier,'autre'=>$autre));
      }
  }


?>