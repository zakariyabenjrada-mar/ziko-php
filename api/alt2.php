
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Étudiant</title>
</head>
<body>

<h2>Inscription Étudiant</h2>

<form method="POST" action="traitement.php">
    
    <label>Numéro d'inscription</label><br>
    <input type="text" name="numero"><br><br>

    <label>Nom</label><br>
    <input type="text" name="nom"><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Ville</label><br>
    <input type="text" name="ville"><br><br>

    <label>Date de naissance</label><br>
    <input type="date" name="date_naissance"><br><br>

    <label>Sexe</label><br>
    <input type="radio" name="sexe" value="Homme"> Homme
    <input type="radio" name="sexe" value="Femme"> Femme<br><br>

    <label>Loisirs</label><br>
    <select name="loisir">
        <option value="Sport">Sport</option>
        <option value="Lecture">Lecture</option>
        <option value="Music">Music</option>
        <option value="Travelling">Travelling</option>
    </select><br><br>

    <label>Loisirs 2</label><br>
    <input type="checkbox" name="loisirs2[]" value="Sport"> Sport<br>
    <input type="checkbox" name="loisirs2[]" value="Lecture"> Lecture<br>
    <input type="checkbox" name="loisirs2[]" value="Music"> Music<br>
    <input type="checkbox" name="loisirs2[]" value="Travelling"> Travelling<br><br>

    <label>Informations complémentaires</label><br>
    <textarea name="info"></textarea><br><br>

    <button type="submit">S'inscrire</button>

</form>
<?php
include_once 'Traitements.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $date = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $loisir = $_POST['loisir'];
    $info = $_POST['info'];

    $loisirs2 = "";
    if (isset($_POST['loisirs2'])) {
        $loisirs2 = implode(", ", $_POST['loisirs2']);
    }

    echo "<h2>Informations reçues :</h2>";
    echo "Numéro: $numero <br>";
    echo "Nom: $nom <br>";
    echo "Prénom: $prenom <br>";
    echo "Ville: $ville <br>";
    echo "Date de naissance: $date <br>";
    echo "Sexe: $sexe <br>";
    echo "Loisir: $loisir <br>";
    echo "Loisirs 2: $loisirs2 <br>";
    echo "Infos: $info <br>";
}
?>

</body>
</html>