<?php
include_once "../../BaseDeDonne/Secteur.php";

//recupere tout les secteurs
/*
    output : 
        - secteurs : tout les secteurs existant
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$secteurs = ReadAllSecteurs();

echo json_encode($secteurs);
?>