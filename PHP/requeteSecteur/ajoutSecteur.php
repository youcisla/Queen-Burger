<?php
include_once "../../BaseDeDonne/Secteur.php";

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

$sql = "SELECT * FROM secteur WHERE nom = '$nom'";
$return = bdd()->query($sql);
if($return->num_rows > 0) {
    $id = -1;
} else {
    $id = CreateSecteur($nom);
}

echo json_encode($id);
?>