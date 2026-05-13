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
        
        
        include 'Panier.php';
        if(!empty($_POST['actionlog']))
        {
            $login=$_POST['login'];
            $pass=$_POST['pass'];
            
            $r=Panier::checkuser($login, $pass);
            if($r==1){
              session_start();
            
            $panier=new Panier();
            $_SESSION['cpanier']=$panier;
			$_SESSION['cid']= 0;
            header("Location:store.php");  
            }
            else{
                echo "<h1   style='color:red'>Login ou pass incorrect !!!</h1>";
            }
            
            
            
            
            
        }
        ?>
        
         <form action="connection.php"    method="POST">
        
            login :<input type="text"    name="login"/>
            Password :<input type="password"    name="pass"/>
            <input type="submit"    name="actionlog"    value="connection"/>
           <input type="reset"    value="Annuler"/>
        
        </form>
    </body>
</html>
