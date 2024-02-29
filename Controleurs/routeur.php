<?php 
    require_once('test.php');
    require_once('modifier.php');
    require_once('Modele/historique.php');
    require_once('donnehistorique.php');
    require_once('afficherpokemon.php');

    class Routeur{
        private $ctltest;
        private $modifierP;

        private $pagehistorique;
        private $affType;
        public function __construct() {
            $this->ctltest=new ControlTest();
            $this->modifierP=new ModifierPokemon();
            $this->pagehistorique=new donHist();
            $this->affType=new afficherPokType();
            }
            
            public function routerRequete() {
                try {
                if (isset($_GET['action'])) {
                if ($_GET['action'] == 'test') {
                    $hist=new Histo();
                    $hist->afficher();
                    
                $this->ctltest->vuetest();
                }
                elseif($_GET['action'] == 'modifyPokemon' )
               {
                    $this->modifierP->vueModifierPokemon();

                }
                elseif($_GET['action'] == 'historique' )
                {
                     $this->pagehistorique->vueHistorique();
 
                 }
                 elseif($_GET['action'] == 'printPokemon')
                 {
                    $this->affType->vue();

                 }
                
                else
                throw new Exception("Action non valide");
                }
                elseif(isset($_POST['idPokemon'],$_POST['taillePokemon'],$_POST['poidsPokemon']))
                {
                    $nom=htmlspecialchars($_POST['idPokemon']);
                    $poids=htmlspecialchars($_POST['poidsPokemon']);
                    $taille=htmlspecialchars($_POST['taillePokemon']);
                    $pok=new Pokemon();
                    $res=$pok->getPokmonByNom($nom);
                    $id=$res['id'];
                    $poidsA=$res['poids'];
                    $tailleA=$res['taille'];
                    $hist=new Histo();
                    $hist->AjoutLigneM($id,$nom,$poidsA,$poids,$tailleA,$taille);
                    $this->modifierP->vueModifierPokemon();

                   
                      
                        $this->modifierP->modifier($nom,$taille,$poids);

                    
                }
                else { // aucune action définie : affichage de l'accueil
                    $vue=new Vue('Acceuil');
                    $vue->generer();
                }
                }catch(Exception $e){
                   $vueE=new Vue('Erreur');
                   $vueE->generer(array('erreur'=>$e->getMessage()));

                }
                

            }
        }
    
?>