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
                <button class="homeButton" onclick="goToHome()">
                    <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/home.png" alt="home" />
                </button>
                Tools
                <!-- <div id="addTask"></div> -->
            </div>
            <div class="down">
                Forums
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="../JavaScript/date.js" defer></script>
    <script src="../JavaScript/calendar.js" defer></script>
    <script src="../JavaScript/requeteCalendrier.js"></script>
</body>

</html>