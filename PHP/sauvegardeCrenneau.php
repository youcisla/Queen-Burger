<?php

//save un creneau un a un
/*
input 
    - id_serveur : id de l'employé
    - date : date format yyyy-mm-dd
    - heuredebut : format hh-mm-ss, evidement les seconde serons toujours a zero
    - heurefin : format hh-mm-ss, , evidement les seconde serons toujours a zero
    - id_secteur : id du secteur ou le serveur est assigné

ouput
    - valide : retourne true si le creneau a pu etre ajouté
    - raison : juste un string avec la raison
*/


$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

//test si le serveur a donné une absence ce jour

?>