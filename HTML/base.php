<?php 
    include_once 'header.php';
?>

<head>
    <title>Table Management</title>
    <link rel="stylesheet" type="text/css" href="/Queen-Burger/CSS/style.css">
    <script src="../JavaScript/app.js"></script>
</head>

<body>
    <section class="homeBodyDiv">
        <button
            style="padding: 10px 20px; font-size: 18px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
            <a href="/Queen-Burger/HTML/calendar.php">Calendar</a>
        </button>
        <button
            style="padding: 10px 20px; font-size: 18px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
            <a href="/Queen-Burger/HTML/week.html">Week</a>
        </button>
        <div id="core">
            <div>
                <div class="L70percent">text</div>
                <div class="L30percent"></div>
            </div>
            <div>
                <div class="L30percent">
                    <div class='tables'>
                        <div class="button-container">
                            <button class="add-table-btn" onclick="ajouterTable()">Ajouter une table</button>
                            <button class="delete-table-btn" onclick="supprimerTable()">Supprimer la dernière
                                table
                            </button>
                        </div>
                        <br><br>
                        <div id="tables-container"></div>
                        <p>Nombre total de tables: <span id="total-tables">0</span></p>
                    </div>
                </div>
                <div class="L70percent"><img src="/Queen-Burger/Images/burger_queen.png"></div>
            </div>
        </div>
    </section>
    <script src="/Queen-Burger/JavaScript/tables.js" defer></script>
</body>
<?php 
    include_once 'footer.php';
?>