<?php
include_once "../PHP/verificationConnexion.php";
redirectionConnexion(["serveur"], "base.php");

$id_serveur = idConnexion();

// pardonnez moi pour ca
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/CalendarServeur.css">
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
            </div>
        </div>
    </div>

    <script>
        // pardonnez moi pour ca  
        let ID_SERVEUR = <?= $id_serveur?>;
    </script>
        
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../JavaScript/requeteCalendrier.js" defer></script>
    <script src="../JavaScript/date.js" defer></script>
    <script src="../JavaScript/calendarServeur.js" defer></script>
    <script src="../JavaScript/requeteCalendrier.js"></script>
</body>

</html>