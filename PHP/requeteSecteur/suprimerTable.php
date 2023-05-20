<?php
include_once "../BaseDeDonne/secteur.php";

//suprime une table
/*
input 
    - id_table : table a suprimer
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$id_table = $data["id_table"];

DeleteTable($id_table);
?>