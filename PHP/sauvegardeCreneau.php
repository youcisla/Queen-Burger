<?php

include_once "../BaseDeDonne/indexx.php";

//save un creneau un a un
/*
input 
    - id_serveur : id de l'employé
    - date : date format yyyy-mm-dd
    - heuredebut : format hh-mm-ss, seconde serons toujours a zero
    - heurefin : format hh-mm-ss, , seconde serons toujours a zero
    - id_secteur : id du secteur ou le serveur est assigné

ouput
    - valide : retourne true si le creneau a pu etre ajouté
    - raison : juste un string avec la raison
        1 : absence ce jour la
        2 : deja un creneau
        3 : creneau valide
    - id : id du creneau cree
*/



$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$return = array();

$id_serveur = $data["id_serveur"];
$date = $data["date"];
$heuredebut = $data["heuredebut"];
$heurefin = $data["heurefin"];
$id_secteur = $data["id_secteur"];

//test si le serveur a donné une absence ce jour
$sql1 = "SELECT * FROM absence WHERE ('{$date}' BETWEEN absence.dateDebut AND absence.dateFin) AND absence.id_serveur = {$id_serveur}";
$result1 = bdd()->query($sql1);

if($result1->num_rows > 0) {
    // le serveur a une absence ce jour
    $return["valide"] = false;
    $return["raison"] = 1;
    $return["id"] = -1;

    echo json_encode($return);
    exit;
}


//test si le serveur est deja prit a cet horaire
$test1 = "('{$heuredebut}' >= hdebut AND '{$heuredebut}' <= hfin)";
$test2 = "('{$heurefin}' >= hdebut AND '{$heurefin}' <= hfin)";


$sql2 = "SELECT * FROM assignation_serveur WHERE ({$test1} OR {$test2}) AND id_serveur = {$id_serveur} AND date = '{$date}'";
$result2 = bdd()->query($sql2);
$return["zzzz"] = $sql2;

if($result2->num_rows > 0) {
    //superposition de creneau a cette date
    $return["valide"] = false;
    $return["raison"] = 2;
    $return["id"] = -1;

    echo json_encode($return);
    exit;
}



// le creneau peut etre ajouté
$sql3 = "INSERT INTO assignation_serveur (id_serveur, id_secteur, hdebut, hfin, date) 
    VALUES ({$id_serveur}, {$id_secteur}, '{$heuredebut}', '{$heurefin}', '{$date}')";
bdd()->query($sql3);
$newid = bdd()->insert_id;

$return["valide"] = true;
$return["raison"] = 3;
$return["id"] = $newid;

echo json_encode($return);
?>