<?php include_once '../BaseDeDonne/Personne.php';  ?>
<!DOCTYPE html>
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
                        <i class="fas fa-calendar-alt"></i>
                        Absences
                    </a>
                </button>
            </div>

            <div class='right'>
                <form action="traitement-recherche.php" method="GET">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="q" placeholder="Rechercher...">
                </form>
            </div>
        </div>
</div>
<?php 
afficheRole("serveur");
afficheRole("cuisinier");
afficheRole("client");
afficheRole("gerant");
 ?>

</table>
</body>
<footer>
            <?php 
            include_once 'footer.php';
        ?>
        </footer>

        </html>