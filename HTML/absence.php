<?php

//recupere la date du jour
$dateActuel = date('Y-m-d');
$dateLendemain = date('Y-m-d', strtotime($dateActuel . ' +1 day'));
?>


<!-- ----- La page html ----- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="../JavaScript/absence.js"></script>
</head>
<body>
    <label for="debutDate">Debut Absence:</label>

    <?php
    echo "
        <input type='date' id='debutDate' name='trip-start' value='{$dateActuel}' min='{$dateActuel}'>
         "
    ?>

    <label for="finDate">Fin Absence:</label>
    <?php
    echo "
        <input type='date' id='finDate' name='trip-start' value='{$dateLendemain}' min='{$dateLendemain}'>
         "
    ?>

    <input type="button" id="validation" value = "valider">


</body>
</html>