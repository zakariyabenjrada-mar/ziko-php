<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Panier
 *
 * @author pc
 */
include 'Fruit.php';
class Panier {
	
	
	
	
    private $tableau_fruit;  // 9offa
    function __construct() {
        $this->tableau_fruit=array();
    }
    
    
    // contenu panier
    function getTableau_fruit() {
        return $this->tableau_fruit;
    }
     
    function setTableau_fruit($tableau_fruit) {
        $this->tableau_fruit = $tableau_fruit;
    }
    
    // méthode ajouter :
    
    function Ajouter_fruit(Fruit $f)
    {
        
        $this->tableau_fruit[]=$f;
    }
     
    
     function Prix_total()
    {
        $total=0;
        
        foreach ($this->tableau_fruit as $fruit) {
            $pu=$fruit->getPrix_unitaire();
         $total+= $pu;  
        }
        return $total;
    }







 /*   méthode supprimer du panier */   
    
    
    function supprimer($id)
    {
		
		// 1) Récupérer le tableau actuel des fruits du panier
     $contenu=$this->getTableau_fruit();
          

 // 2) Supprimer l'élément à l'indice donné ($id)		  
            unset($contenu[$id]);
        // 3) Réindexer le tableau pour éviter les trous dans les indices
    // ex: [0,2,3] => [0,1,2]    
            $contenu=array_values($contenu);
			
			
			// 4) Réaffecter de nouveaux IDs aux fruits restants
    // ( chaque fruit possède un id correspondant à sa position)
            $indice=0;
            foreach ($contenu as $frtuit) {
             $frtuit->setId($indice);
             $indice++;
                
            }
            
            
            
           $this->setTableau_fruit($contenu) ;
               
        
        
    }
	
	
	
	
	
	
	// Méthode static authentification
	
static  function checkuser($login,$pass)
{
    $r=0;
    if($login=='DEV101'   &&  $pass=='123')
    {
        $r=1;
    }
    return $r;
}
    
}
