<?php
include_once "../BaseDeDonne/secteur.php";

//cree une nouvelle table
/*
input 
    - id_secteur : id du secteur
    - nb_places : nombre de place
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$nb_places = $data["nb_places"];
$id_secteur = $data["id_secteur"];

$id = CreateTables($nb_places, $id_secteur);

echo json_encode($id);
?>