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
                    <img src="/Queen-Burger/Images/absence_icone.png">
                        Absences
                    </a>
                </button>
            </div>

            <div class='right'>
                <form action="traitement-recherche.php" method="GET">
                    <button type="submit"><img src="/Queen-Burger/Images/loop.png"></button>
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