<?php

//recupere la date du jour
$dateActuel = date('Y-m-d');
$dateLendemain = date('Y-m-d', strtotime($dateActuel . ' +1 day'));

include_once "../PHP/verificationConnexion.php";

redirectionConnexion(['serveur'], "base.php");
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
    <form method="POST" action="/Queen-Burger/HTML/validationAbsence.php">

        <label for="debutDate">Debut Absence:</label>
        <?php
        echo "
            <input type='date' id='debutDate' name='debutDate' value='{$dateLendemain}' min='{$dateLendemain}'>
            "
        ?>

        <label for="finDate">Fin Absence:</label>
        <?php
        echo "
            <input type='date' id='finDate' name='finDate' value='{$dateLendemain}' min='{$dateLendemain}'>
            "
        ?>

        <input type="submit" id="validation" value = "valider">
    </form>


</body>
</html>