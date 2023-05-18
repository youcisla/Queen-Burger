<!DOCTYPE html>
<?php 
include_once '../BaseDeDonne/Personne.php';  
include_once "../PHP/verificationConnexion.php";
include_once "../BaseDeDonne/indexx.php";
//redirectionConnexion([1,2], "base.php");
if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 0;
}

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen Burger Head Master</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        include_once "header.php";
    ?>

    <div class="allclasses">
        <h1>Page Gerant</h1>
        <div class='up'>
            <div class='left'>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                    <img src="/Queen-Burger/Images/absence_icone.png">
                        Absences
                    </a>
                </button>
            </div>
            <div class='right'>
                <h2> Rechercher un membre </h2>
                <form method="POST" action="gerant.php">
                    <input type="text" name="recherche" placeholder="Rechercher...">
                    <button type="submit"><img src="/Queen-Burger/Images/loop.png"></button>
                </form>
            </div>
            </div>
            <?php
            // On determine si l'utilisateur a bien rentré des infos de recherche
if(isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    // Des infos sont bien rentrées
    afficheRecherche($recherche);
} else {
    echo "<br>Rien dans la recherche";
}
?>
</div>
<form method='POST' action='gerant.php'>
    <?php if($page > 0) {
        echo sprintf("<button type='submit' name='page' value='%d'> < </button>", intval($page)-1);
    } 
    echo sprintf("<button type='submit' name='page' value='%d'> > </button>", intval($page)+1);?>
    <br>
</form>

<?php
echo sprintf("Page %d :", $page);
affichePage($page);

function motsSeRessemblent($mot1, $mot2) {
    $seuil = 80;
    similar_text($mot1, $mot2, $taux);
    return($taux >= $seuil);
}
?>
</table>
</table>
    <div class='down'>
                <div class='left'>
                    <button class="buttonSHAPE">
                        <a href="/Queen-Burger/HTML/calendar.php">
                        <img src="/Queen-Burger/Images/simple-black-calendar-.png">
                            Calendrier
                        </a>
                    </button>
                    <div class='right'>
                    <button class="buttonSHAPE">
                        <a href="/Queen-Burger/HTML/ajouter.php">
                            <img src="/Queen-Burger/Images/croix.png">
                            Ajouter
                        </a>
                    </button>
</div>
</body>
<footer>
            <?php 
            include_once 'footer.php';
        ?>
        </footer>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
}


/* Main content */
.allclasses {
    margin: 20px;
}

.up {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.left,
.right {
    flex-basis: 50%;
}

.buttonSHAPE {
    background-color: white;
    width:100px;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.buttonSHAPE img {
    vertical-align: middle;
    margin-right: 5px;
}

.right form {
    display: flex;
    align-items: center;
}

.right input[type="text"] {
    padding: 5px;
    width: 200px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.right button[type="submit"] {
    background-color:white;
    width:100px;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.down {
    text-align: center;
    margin-top: 20px;
}

.down .left,
.down .right {
    display: inline-block;
    margin: 10px;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
}
img {
    max-width : 100%;
    height : auto;
}

 </style>
        </html>