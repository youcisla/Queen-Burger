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
<div class="time">Time</div>
    <div id="app">
        <div id = "date">
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
            <div class="jour"><p></p><p></p></div>
        </div>
        <div id="main">
            <div id="calendar" class="calendar"></div>
            <div id="calendar1" class="calendar"></div>
        </div>
        <div id="addTask"></div>
    </div>
    <div class="right">
    <div class="up">Tools</div>
    <div class="down">Forums</div>
    </div>
    <script src="../JavaScript/date.js" defer></script>
    <script src="../JavaScript/calendar.js" defer></script>
</body>
</html>