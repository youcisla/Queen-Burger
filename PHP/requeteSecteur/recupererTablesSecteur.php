<?php
include_once "../../BaseDeDonne/Secteur.php";

//recupere toute les tables d'un secteur
/*
    input : 
        - id_secteur : id du secteur

    output : 
        - tables : toute les tables du secteur
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$id_secteur = $data["id_secteur"];

$tables = ReadAllTables($id_secteur);

echo json_encode($tables);
?>