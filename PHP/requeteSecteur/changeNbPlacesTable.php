<?php
include_once "../BaseDeDonne/secteur.php";

//change le nombre de place dune table
/*
input 
    - id_table : table a modifier
    - nb_places : nouveau nombre de place
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$id_table = $data["id_table"];
$nb_places = $data["nb_places"];

UpdateNbPlacesTable($id_table, $nb_places);
?>