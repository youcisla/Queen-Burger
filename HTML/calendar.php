<!DOCTYPE html>
<html lang="en">
<div class="headerContainer">
    <?php 
        include_once 'header.php';
    ?>
</div>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Calendar.css">
</head>

<body>
    <div id="app">
        <div id="date">
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
        </div>
        <div id="main">
            <div id="calendar" class="calendar"></div>
            <div id="calendar1" class="calendar"></div>
        </div>
    </div>
    <script src="../JavaScript/date.js" defer></script>
    <script src="../JavaScript/calendar.js" defer></script>
    <script src="../JavaScript/app.js" defer></script>
</body>
<?php 
    include_once 'footer.php';
?>

</html>