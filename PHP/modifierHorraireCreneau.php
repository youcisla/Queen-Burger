<?php

include_once "../BaseDeDonne/indexx.php";

//modifie l horraire dun creneau
/*
input 
    - id_creneau : id du creneau
    - heuredebut : format hh-mm-ss, seconde serons toujours a zero
    - heurefin : format hh-mm-ss, , seconde serons toujours a zero

ouput
    - valide : retourne true si le creneau a pu etre ajouté
    - raison : juste un string avec la raison
        1 : absence ce jour la
        2 : deja un creneau
        3 : creneau valide
*/



$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$return = array();

$id_creneau = $data["id_creneau"];
$heuredebut = $data["heuredebut"];
$heurefin = $data["heurefin"];

$sql = "SELECT * FROM assignation_serveur WHERE id = $id_creneau";
$result = bdd()->query($sql);
$creneau = $result->fetch_assoc();


$date = $creneau["date"];
$id_serveur = $creneau["id_serveur"];



$sqlback = "SELECT hdebut, hfin FROM assignation_serveur WHERE id = $id_creneau";
$resultback = bdd()->query($sqlback);



//test si le serveur a donné une absence ce jour
$sql1 = "SELECT * FROM absence WHERE ('{$date}' BETWEEN absence.dateDebut AND absence.dateFin) AND absence.id_serveur = {$id_serveur}";
$result1 = bdd()->query($sql1);

if($result1->num_rows > 0) {
    // le serveur a une absence ce jour
    $return["valide"] = false;
    $return["raison"] = 1;

    echo json_encode($return);
    exit;
}


//test si le serveur est deja prit a cet horaire
$test1 = "('{$heuredebut}' >= hdebut AND '{$heuredebut}' <= hfin)";
$test2 = "('{$heurefin}' >= hdebut AND '{$heurefin}' <= hfin)";


$sql2 = "SELECT * FROM assignation_serveur WHERE ({$test1} OR {$test2}) AND id_serveur = {$id_serveur} AND date = '{$date}' AND id != {$id_creneau}";
$result2 = bdd()->query($sql2);
$return["zzzz"] = $sql2;

if($result2->num_rows > 0) {
    //superposition de creneau a cette date
    $return["valide"] = false;
    $return["raison"] = 2;

    echo json_encode($return);
    exit;
}



// le creneau peut etre modifié
$sql3 = "UPDATE assignation_serveur SET hdebut = '$heuredebut', hfin = '$heurefin' WHERE id = $id_creneau";
bdd()->query($sql3);

$return["valide"] = true;
$return["raison"] = 3;

echo json_encode($return);
?>