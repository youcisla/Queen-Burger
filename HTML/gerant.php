<!DOCTYPE html>

<?php 
include_once '../BaseDeDonne/Personne.php';  
include_once "../PHP/verificationConnexion.php";
include_once "../BaseDeDonne/indexx.php";
//redirectionConnexion([1,2], "base.php");
if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

?>

<h1> Page gerant </h1>

<form method='POST' action='gerant.php'>
    <?php if($page > 0) {
        echo sprintf("<button type='submit' name='page' value='%d'> < </button>", intval($page)-1);
    } 
    echo sprintf("<button type='submit' name='page' value='%d'> > </button>", intval($page)+1);
    ?>
    <br>
</form>

<?php
echo sprintf("Page %d :", $page);

affichePage($page);
?>

<br><br>
<h2> Rechercher un membre </h2>
<form method="POST" action="gerant.php">
    <input type="text" name="recherche">
    <button type="submit"> Rechercher </button>
</form>

<?php 

function motsSeRessemblent($mot1, $mot2) {
    $seuil = 80;
    similar_text($mot1, $mot2, $taux);
    return($taux >= $seuil);
}

// On determine si l'utilisateur a bien rentré des infos de recherche
if(isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    // Des infos sont bien rentrées
    afficheRecherche($recherche);
} else {
    echo "<br>Rien dans la recherche";
}
?>
</table>
