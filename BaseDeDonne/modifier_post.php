<?php
include_once 'Serveur.php';
include_once 'Personne.php';
$id=1;
if(!empty($_POST)){
    if(
        isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"],$_POST["login"],$_POST["mot_de_passe"])
        &&!empty($_POST["nom"]) &&!empty($_POST["prenom"]) &&!empty($_POST["telephone"]) &&!empty($_POST["mail"])
        &&!empty($_POST["login"]) &&!empty($_POST["mot_de_passe"])){
            $nom=strip_tags($_POST["nom"]);
            $prenom=strip_tags($_POST["prenom"]);
            $telephone=strip_tags($_POST["telephone"]);
            $mail=strip_tags($_POST["mail"]);
            $login=strip_tags($_POST["login"]);
            $mot_de_passe=strip_tags($_POST["mot_de_passe"]);
            $idp=ReadServeur($id)["information"];
            UpdatePersonne($idp,$nom,$prenom,$telephone,$mail);
            UpdateServeur($id,$login,$mot_de_passe);
            header("Location: /Queen-Burger/HTML/test.php");

        }
        else{
            echo "un argument n'est pas correcte"; 
            header("Location: /Queen-Burger/HTML/modification.php");
              }
        }else{echo "Problème du serveur";
            header("Location: /Queen-Burger/HTML/modification.php");}

        ?>
