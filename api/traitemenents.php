<?php
function displayinfosintohtmltable($num,$nom,$prenom,$ville,$dn,$sexe,$loisirs,$loisirs2,$infos){


echo "<h2>Informations de l'étudiant</h2>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr><th>Champ</th><th>Valeur</th></tr>";

echo "<tr><td>Numéro</td><td>$num</td></tr>";
echo "<tr><td>Nom</td><td>$nom</td></tr>";
echo "<tr><td>Prénom</td><td>$prenom</td></tr>";
echo "<tr><td>Ville</td><td>$ville</td></tr>";
echo "<tr><td>Date de naissance</td><td>$dn</td></tr>";

$an=explode("-",$dn)[0];
$age=getAge($an);
echo "<tr><td>Age</td><td>$age</td></tr>";




echo "<tr><td>Sexe</td><td>$sexe</td></tr>";
echo "<tr><td>Loisirs</td><td>$loisirs</td></tr>";

// lecture tableau des loisirs 
echo"<tr>";
echo"<td>Loisirs2</td>";
     echo"<td>";


          echo"<ul>";
            foreach($loisirs2 as $loi)
                {
            echo"<li>$loi</li>";
                }

          echo"</li>";

     echo"</ul>";

echo"</tr>";



echo "<tr><td>Infos complémentaires</td><td>$infos</td></tr>";

echo "</table>";




}









?>