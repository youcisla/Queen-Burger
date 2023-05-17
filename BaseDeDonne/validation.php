<?php
include_once 'Client.php';
include_once 'Personne.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!empty($_POST)){
    if(
        isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"],$_POST["login"],$_POST["mot_de_passe"],$_POST["confirmation"])
        &&!empty($_POST["nom"]) &&!empty($_POST["prenom"]) &&!empty($_POST["telephone"]) &&!empty($_POST["mail"])
        &&!empty($_POST["login"]) &&!empty($_POST["mot_de_passe"]) &&!empty($_POST["confirmation"])
    ){
        if($_POST["mot_de_passe"]==$_POST["confirmation"]){

            $nom=strip_tags($_POST["nom"]);
            $prenom=strip_tags($_POST["prenom"]);
            $telephone=strip_tags($_POST["telephone"]);
            $mail=strip_tags($_POST["mail"]);
            $login=strip_tags($_POST["login"]);
            $mot_de_passe=strip_tags($_POST["mot_de_passe"]);
           
            //id
            $id_personne = CreatePersonne($nom,$prenom,$telephone,$mail,$mot_de_passe);
            CreateClient($login,$id_personne);
            $_SESSION["id"] = $id_personne;
            header("Location: /Queen-Burger/HTML/base.php");
        }
        else
        {die("formulaire incomplet mots de passe");
        }
    }
    else {die("formulaire incomplet");}
}
?>
