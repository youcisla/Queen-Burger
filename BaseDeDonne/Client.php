<?php
include_once 'indexx.php';
function CreateClient($login,$mot_de_passe,$information){
    $sql = "INSERT INTO Client (login, mot_de_passe, information) 
					VALUES ('$login', '$mot_de_passe', '$information')";
                    bdd()->query($sql);
}