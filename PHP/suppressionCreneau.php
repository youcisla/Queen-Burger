<?php

include_once "../BaseDeDonne/indexx.php";

//supprime un creneau
/*
input 
    - id_crenneau : id de l'employé
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);



$id= $data["id_crenneau"];


$sql = "DELETE FROM assignation_serveur WHERE id = {$id}";
bdd()->query($sql);

?>