<?php
include_once "../../BaseDeDonne/Secteur.php";

//suprimer un secteur et toute ses tables
/*
input 
    - id_secteur : secteur a suprimer
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$id_secteur = $data["id_secteur"];

DeleteTablesSecteur($id_secteur);
DeleteSecteur($id_secteur);
?>