<?php
include_once 'indexx.php';
include_once 'Personne.php';
if(!empty($_POST)){
    if(isset($_POST["id"])) {
        $id = strip_tags($_POST["id"]);
        supprimerPersonne($id);
        header("Location: /Queen-Burger/HTML/gerant.php");
    }
    else{header("Location: /Queen-Burger/HTML/gerant.php");}
}
?>