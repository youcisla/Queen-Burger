<?php

include_once "../BaseDeDonne/indexx.php";

//modifie le secteut d'un creneau
/*
input 
    - id_creneau : id du creneau
    - id_secteur : id du secteur
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$return = array();

$id_creneau = $data["id_creneau"];
$id_secteur = $data["id_secteur"];


$sql = "UPDATE assignation_serveur SET id_secteur = $id_secteur WHERE id = $id_secteur";
bdd()->query($sql);
?>