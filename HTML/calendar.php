<?php 
    include_once 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="/Queen-Burger/CSS/Calendar.css">
</head>
<body>
        <!---->
    <div id="app">
        <div id="header"></div>
        <div id="subApp">
            <div id="detailsBar"></div>
            <div id="main">
                <!-- Add this div to display the calendar -->
                <div id="calendar"></div>
            </div>
            <div id="tools"></div>
        </div>
    </div>
    
    <!---->
    <!-- Load the script at the end of the body tag -->
    <script src="../JavaScript/app.js" defer></script>
</body>
</html>
<?php 
    include_once 'footer.php';
?>
