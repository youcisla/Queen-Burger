<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion secteurs</title>
    <link rel="stylesheet" href="../CSS/secteur.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../JavaScript/requeteSecteur.js" defer></script>
    <script src="../JavaScript/secteur.js" defer></script>
    

    <main>
        <div id = "tables">
            <div id ="liste_tables">
                
            </div>
            <div class = "option">
                <button id = "add_table">+</button>            </div>
        </div>

        <div id = "secteurs">
            <div id ="liste_secteurs">
                
            </div>
            <div class = "option">
                <div>
                    <button id = "add_secteur">+</button>
                    <input type = "text" id = "nom_secteur"> 
                </div>
                <button id = "del_secteur">-</button>
                <button id = "reload_secteurs">*</button>
            </div>
        </div>
    </main>
</body>
</html>