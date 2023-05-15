<?php
include_once "../BaseDeDonne/indexx.php";

//obtient toute les absences dun employé sur plusieur jours
/*
input 
    - id_serveur : id de l'employé
    - jours : tableau contenant une liste de jour format yyyy-mm-dd

ouput
    - absence : dictionnaire contenant tout les absences
            [
                date1 => boolean, 
                date2 => boolean
            ]
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$absences = array();

$id_serveur = $data["id_serveur"];
$jours = $data["jours"];

foreach($jours as $jour) {
    $sql = "SELECT * FROM absence WHERE id_serveur = $id_serveur AND ('$date' BETWEEN datedebut AND datefin)";
    $result = bdd()->query($sql);

    $absences[$jour] = ($result->num_rows));
}

echo json_encode($absences);
?>