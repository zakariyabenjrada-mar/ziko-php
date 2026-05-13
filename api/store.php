<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
         include_once 'Panier.php';
		session_start();
        if (isset($_SESSION['cpanier'])) {
    $p = $_SESSION['cpanier'];
	$id=$_SESSION['cid'];
    $contenu = count($p->getTableau_fruit());
} else {
    $contenu = 0;
}
        ?>
       
        <h1>Votre Panier contient :<?=$contenu?> fruits</h1>
         <form action="store.php" method ="POST" >
               <fieldset><legend>Panier à créer :</legend>
               <label for="nb_pommes">Nombres de pommes : </label>
               <input type="number" name="nb_pommes"  required/>
               <label for="nb_poires">Nombres de poires : </label>
        <input type="number" name="nb_poires"  required/>
        <label for="nb_bananes">Nombres de bananes : </label>
        <input type="number" name="nb_bananes"  required/>
        <input type="submit" name="actionadd" value="Ajouter au panier" />
    </fieldset></form>
    
    <a href="store.php?actionlist=all"><h1>Contenu du Panier </h1></a>
    <a href="store.php?actiondec=dec"><h1>Deconnection </h1></a>    
        
        
        
        
        <?php
      // action add
        
        if(isset($_POST['actionadd']))
        {
            $nbpommes=$_POST['nb_pommes'];
            $nbpoires=$_POST['nb_poires'];
            $nbbananes=$_POST['nb_bananes'];
            
                         
            
            for ($ipm = 0; $ipm <$nbpommes; $ipm++) 
            {
              $pomme=new Fruit($_SESSION['cid'],"pomme", 1, 'images/pomme.jpg') ; 
              $p->Ajouter_fruit($pomme);
			  $_SESSION['cid']++;
            }
            for ($ipr = 0; $ipr <$nbpoires; $ipr++) 
            {
              $poire=new Fruit($_SESSION['cid'],"poire", 1.5, 'images/poire.jpg') ; 
             $p-> Ajouter_fruit($poire);
			 $_SESSION['cid']++;
            }
            for ($ibn = 0; $ibn <$nbbananes; $ibn++) 
            {
              $banane=new Fruit($_SESSION['cid'],"banane", 2, 'images/banane.jpg') ; 
              $p->Ajouter_fruit($banane);
			  $_SESSION['cid']++;
            }
            
           header("Location:store.php"); 
                   
        }
         // action List
        if(isset($_GET['actionlist']))
        {
            $contenu=$p->getTableau_fruit();
             echo "<table border='2'>";
                   echo "<tr>";
                    
                             echo "<th>nom</th>";
                             echo "<th>prix</th>";
                             echo "<th>photo</th>";
                
                   echo "</tr>";
            foreach ($contenu as $fruit) {
                
                echo "<tr>";
				     $id=$fruit->getId();
                     $nom=$fruit->getNom();
                     $prix=$fruit->getPrix_unitaire();
                     $photo=$fruit->getPhoto();
                             echo "<td>$nom</td>";
                             echo "<td>$prix</td>";
                             echo "<td><img src='$photo'  width='50'  height='50'></td>";
                             echo "<td><a href='store.php?actionsup=$id'>Supprimer</a></td>";
                   
                 echo "</tr>";
            }
             echo "</table>";
             $total=$p->Prix_total();
             echo "<h1>Toal à payer :$total DH</h1>";
        }
          // action deconnection
        if(isset($_GET['actiondec']))
        {
            session_destroy();
            header("Location:connection.php");
        }
        // action supprimer
         if(isset($_GET['actionsup']))
        {
            $id=$_GET['actionsup'];
            $p->supprimer($id);
           
            $_SESSION['cid']--;
            
            
            header("Location:store.php"); 
            
            
            
        }
        ?>
     
    </body>
</html>
