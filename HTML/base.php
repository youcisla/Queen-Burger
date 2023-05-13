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

<?php
if(isset($_SESSION['gerant_id'])){
    $gerant_id = $_SESSION['gerant_id'];
    include_once '/Queen-Burger/BaseDeDonne/Gerant.php';
    $gerant = ReadGerant($gerant_id);
    $sql = "SELECT gerant.login, personne.nom, personne.prenom, personne.telephone FROM personne
        INNER JOIN gerant ON gerant.information = $gerant[3]";
    $result = $conn->query($sql);
    $res = mysqli_fetch_assoc($result);
    echo "Welcome, " . $res['login'];
} else {
    // header("Location: /Queen-Burger/HTML/connexion.php");
    echo 'not connected';
    // exit;
}
?>

<body>
    <section class="homeBodyDiv">
        <div class="buttonsUp">
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/calendar.php">
                    Calendar PHP
                </a>
            </button>
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/calendar.html">
                    Calendar HTML
                </a>
            </button>
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/connexion.php">
                    connexion
                </a>
            </button>
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/test.php">
                    test
                </a>
            </button>
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/creatAbsence.php">
                    Absence
                </a>
            </button>
            <button class="buttonCalendar hvr-float-shadow">
                <a href="/Queen-Burger/HTML/envoieMail.php">
                    Email
                </a>
            </button>
        </div>
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
            <div class="L70_30">
                <div class="L30percent">
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
                </div>
                <div class="L70percent">
                    <img src="/Queen-Burger/Images/bg.png">
                </div>
            </div>
            <div class="L70_30">
                <div class="L70percent">
                    <img src="/Queen-Burger/Images/bg.png">
                </div>
                <div class="L30percent">
                    text
                </div>
            </div>
            <div class="L70_30">
                <div class="L30percent">
                    text
                </div>
                <div class="L70percent">
                    <img src="/Queen-Burger/Images/bg.png">
                </div>
            </div>

            <div id="json-data">
                <div class="json-data-header">
                    <h2>Burger Types</h2>
                </div>
                <div id="json-data-body">
                </div>
            </div>


        </div>
    </section>
    <script src="/Queen-Burger/JavaScript/tables.js" defer></script>
    <script src="/Queen-Burger/JavaScript/app.js" defer></script>

    <?php 
    include_once 'footer.php';
?>
</body>


</html>
