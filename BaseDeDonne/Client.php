<?php
include_once 'indexx.php';

function CreateClient($login,$id_personne){
    $sql = "INSERT INTO Client (login,id_personne) 
	VALUES ('$login', '$id_personne')";
    bdd()->query($sql);
    return bdd()->insert_id;
}