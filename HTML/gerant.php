<!DOCTYPE html>
<?php
include_once '../BaseDeDonne/Personne.php';
include_once "../PHP/verificationConnexion.php";
include_once "../BaseDeDonne/indexx.php";
//redirectionConnexion(['gerant','cuisinier'], "base.php");
if (isset($_POST['page'])) {
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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/gerant.css">
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
                    <a class="link" href="/Queen-Burger/HTML/calendar.php">
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
        if (isset($_POST['recherche'])) {
            $recherche = $_POST['recherche'];
            // Des infos sont bien rentrées
            afficheRecherche($recherche);
        } else {
            echo "<br>Rien dans la recherche";
        }
        ?>
    </div>
    <form class='form' method='POST' action='gerant.php'>
        <?php if ($page > 0) {
            echo sprintf("<button type='submit' name='page' value='%d' class='buttonForm'> < </button>", intval($page) - 1);
        }
        echo sprintf("<button type='submit' name='page' value='%d' class='buttonForm'> > </button>", intval($page) + 1);
        ?>
        <br>
    </form>

    <?php
    echo sprintf("Page %d :", $page);
    affichePage($page);

    function motsSeRessemblent($mot1, $mot2)
    {
        $seuil = 80;
        similar_text($mot1, $mot2, $taux);
        return ($taux >= $seuil);
    }
    ?>
    <!-- </table>
    </table> -->
    <div class='down'>
        <div class='left'>
            <button class="buttonSHAPE">
                <a class="link" href="/Queen-Burger/HTML/calendar.php">
                    <img src="/Queen-Burger/Images/simple-black-calendar-.png">
                    Calendrier
                </a>
            </button>
        </div>
        <div class='right'>
            <button class="buttonSHAPE">
                <a class="link" href="/Queen-Burger/HTML/ajouter.php">
                    <img src="/Queen-Burger/Images/croix.png">
                    Ajouter
                </a>
            </button>
        </div>
    </div>
    <!-- <script src="../JavaScript/header.js" defer></script> -->
</body>
<footer>
    <?php
    include_once 'footer.php';
    ?>
</footer>

</html>