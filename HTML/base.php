<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once '../BaseDeDonne/indexx.php'; 
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM Personne WHERE Personne.id = $id";
    $result = bdd()->query($sql);
    $personne = $result->fetch_assoc();
    echo "Welcome, " . $personne['prenom'];
}
/* else {
    // echo 'Connectez vous';
    header('Location: connexion.php');
}*/
?>

<html>

<div class="headerContainer">
    <?php 
        include_once 'header.php';
     ?>
</div>

<head>
    <title>Table Management</title>
    <link rel="stylesheet" type="text/css" href="/Queen-Burger/CSS/style.css">
</head>

<body>
    <section class="homeBodyDiv">
        <div id="core">
            <div class="L70_30">
                <div class="L70percent">
                    <p class='descriprionHome'>
                        Bienvenue sur le site de Queen Burger, l'endroit idéal pour déguster des hamburgers de
                        qualité
                        supérieure dans un cadre confortable et convivial. Réservez votre table dès maintenant et
                        profitez de notre menu alléchant qui comprend des ingrédients frais et des recettes
                        innovantes
                        pour tous les goûts. Notre personnel attentionné sera heureux de vous accueillir et de
                        rendre
                        votre expérience chez Queen Burger inoubliable.
                        Bienvenue sur le site de Queen Burger, l'endroit idéal pour déguster des hamburgers de
                        qualité supérieure dans un cadre confortable et convivial. Réservez votre table dès
                        maintenant et profitez de notre menu alléchant qui comprend des ingrédients frais et des
                        recettes innovantes pour tous les goûts. Notre personnel attentionné sera heureux de vous
                        accueillir et de rendre votre expérience chez Queen Burger inoubliable.
                    </p>
                </div>
                <div class="L30percent">
                    <img src="/Queen-Burger/Images/bg.png">
                </div>
            </div>
            </br>
            <h2>Nos Burgers</h2>
            </br>
            <div class="L70_30">
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Cheeseburger</h2>
                        <ul>
                            <li>Viande hachée</li>
                            <li>Pains à hamburger</li>
                            <li>Tranches de fromage</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Ketchup</li>
                            <li>Moutarde</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>

                </div>
                <div class="L70percent">
                    <div class="recettePIC cheeseburger"></div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L70percent">
                    <div class="recettePIC hamburger"></div>
                </div>
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Hamburger</h2>
                        <ul>
                            <li>Steak haché</li>
                            <li>Pain à hamburger</li>
                            <li>Fromage</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Ketchup</li>
                            <li>Moutarde</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Fish-Burger</h2>
                        <ul>
                            <li>Poisson</li>
                            <li>Pains à hamburger</li>
                            <li>Sauce tartare</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
                <div class="L70percent">
                    <div class="recettePIC Fish-Burger"></div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L70percent">
                    <div class="recettePIC Chicken-Burger"></div>
                </div>
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Chicken-Burger</h2>
                        <ul>
                            <li>Poulet</li>
                            <li>Pains à hamburger</li>
                            <li>Sauce spéciale</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Double-Cheeseburger</h2>
                        <ul>
                            <li>Double portion de viande hachée</li>
                            <li>Pains à hamburger</li>
                            <li>Double portion de tranches de fromage</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Ketchup</li>
                            <li>Moutarde</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
                <div class="L70percent">
                    <div class="recettePIC Double-Cheeseburger"></div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L70percent">
                    <div class="recettePIC Bacon-Cheeseburger"></div>
                </div>
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Bacon-Cheeseburger</h2>
                        <ul>
                            <li>Viande hachée</li>
                            <li>Pains à hamburger</li>
                            <li>Tranches de fromage</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Tranches de bacon</li>
                            <li>Ketchup</li>
                            <li>Moutarde</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
            </div>
            </br>
            <div class="L70_30">
                <div class="L30percent">
                    <div class="recette">
                        <h2>Ingrédients du Veggie-Burger</h2>
                        <ul>
                            <li>Steak végétarien</li>
                            <li>Pains à hamburger</li>
                            <li>Fromage végétalien</li>
                            <li>Laitue</li>
                            <li>Tranches de tomates</li>
                            <li>Tranches d'oignons</li>
                            <li>Cornichons</li>
                            <li>Ketchup</li>
                            <li>Moutarde</li>
                            <li>Sel et poivre</li>
                        </ul>
                    </div>
                </div>
                <div class="L70percent">
                    <div class="recettePIC Veggie-Burger"></div>
                </div>
            </div>

        </div>
    </section>
    <script src="/Queen-Burger/JavaScript/tables.js" defer></script>
    <script src="/Queen-Burger/JavaScript/app.js" defer></script>

    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>
</body>


</html>



<!-- <div class="L30percent">
                    <div class='tables'>
                        <div class="button-container">
                            <button class="add-table-btn" onclick="ajouterTable()">
                                <button class="add-table-btn" onclick="ajouterTable()">
                                    Add a table
                                </button>
                                <button class="delete-table-btn" onclick="supprimerTable()">
                                    <button class="delete-table-btn" onclick="supprimerTable()">
                                        Delete last table
                                    </button>
                        </div>
                        <br><br>
                        <div id="tables-container"></div>
                        <p class='nbTables'>
                            Nombre total de tables:
                            <span id="total-tables">
                                0
                            </span>
                        </p>
                    </div>
                </div> -->