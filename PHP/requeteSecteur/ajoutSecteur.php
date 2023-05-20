<?php
include_once "../BaseDeDonne/secteur.php";

//cree un nouveau secteur
/*
input 
    - nom : nom du secteur
output
    - id : id du secteur cree
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$nom = $data["nom"];

$id = CreateSecteur($nom);

echo json_encode($id);
?>