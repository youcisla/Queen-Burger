<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <!---->
    <div id="app">
        <div id="header"></div>
        <div id="subApp">
            <div id="detailsBar"></div>
            <div id="main" style="z-index=-1;>
            <div id="weekCal" style="z-index=1;">
                <?php
                    include_once "/Queen-Burger/test8resize/week.html";
                ?>
                </div>
            </div>
            <div id="tools"></div>
        </div>
    </div>
    
    <!---->
    <script src="app.js" defer></script>
</body>
</html>