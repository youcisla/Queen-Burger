<?php
include_once "../BaseDeDonne/indexx.php";

//obtient tout les crenaux dun employé sur plusieur jours
/*
input 
    - id_serveur : id de l'employé
    - dates : tableau contenant une liste de jour format yyyy-mm-dd

ouput
    - creneaux : dictionnaire contenant tout les creneaus
            [
                date1 => [creneau1, creneau2], 
                date2 => [creneau1, creneau2]
            ]
*/

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$creneaux = array();

$id_serveur = $data["id_serveur"];
$dates = $data["dates"];


foreach($dates as $date) {
    $sql = "SELECT * FROM assignation_serveur WHERE id_serveur = $id_serveur AND date = '$date'";
    $result = bdd()->query($sql);
    if($result->num_rows > 0) {

        $return = array();
        while($row = $result->fetch_assoc()) {
            $return[] = $row;
        }  
        $creneaux[$date] = $return;   
    }
}

echo json_encode($creneaux);
?>