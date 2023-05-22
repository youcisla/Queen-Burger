<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Secteurs</title>
    <link rel="stylesheet" href="../CSS/secteur.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #tables, #secteurs {
            margin-bottom: 20px;
        }

        #liste_tables, #liste_secteurs {
            margin-bottom: 10px;
        }

        .option {
            display: flex;
            align-items: center;
        }

        .option > div {
            margin-right: 10px;
        }

        .option button {
            padding: 5px 10px;
            font-size: 16px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .option input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../JavaScript/requeteSecteur.js" defer></script>
    <script src="../JavaScript/secteur.js" defer></script>

    <main>
        <div id="tables">
            <div id="liste_tables"></div>
            <div class="option">
                <button id="add_table">+</button>
            </div>
        </div>

        <div id="secteurs">
            <div id="liste_secteurs"></div>
            <div class="option">
                <div>
                    <button id="add_secteur">+</button>
                    <input type="text" id="nom_secteur"> 
                </div>
                <button id="del_secteur">-</button>
                <button id="reload_secteurs">*</button>
            </div>
        </div>
    </main>
</body>
</html>
