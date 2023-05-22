<?php
include_once "../BaseDeDonne/indexx.php";

// verif si l id dans lhyper lien est valide
if(isset($_GET["serveur"])){
    $id_serveur = $_GET["serveur"];
    $sql = "SELECT * FROM personne WHERE id = $id_serveur AND role = 'serveur'";
    $result = bdd()->query($sql);
    if($result->num_rows <= 0) {
        header("Location: calendar.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Calendar.css">
</head>

<body>
    <div id="app">
        <div class="central">
            <div id="date">
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
                <div class="jour">
                    <p></p>
                    <p></p>
                </div>
            </div>
            <div class="donno">
                <div class="time">Time</div>
                <div id="main">
                    <div id="calendar" class="calendar"></div>
                    <div id="calendar1" class="calendar"></div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="up">
                <a class="homeButton" href='../HTML/base.php'>
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/home.png" alt="home" />
                </a>
                Tools
                <!-- <div id="addTask"></div> -->
            </div>
            <div class="down">
                <form method="get" action="calendar.php">
                    <select name="serveur" id="seveur_select">
                        <?php
                            include_once "../BaseDeDonne/Personne.php";

                            $serveurs = GetAllServeurs();

                            foreach($serveurs as $serveur) {
                                echo "<option value='{$serveur['id']}'>{$serveur['nom']} {$serveur['prenom']}</option>";
                            }
                        ?>
                    </select>
                
                    <input type = "submit" value = "valider">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../JavaScript/date.js" defer></script>
    <script src="../JavaScript/calendarServeur.js" defer></script>
    <script src="../JavaScript/mainCalendar.js" defer></script>

    <script src="../JavaScript/requeteCalendrier.js"></script>
</body>

</html>