<?php
include_once 'Personne.php';
include_once 'Serveur.php';

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
           
            //id
            $id_personne = CreatePersonne($nom,$prenom,$telephone,$mail,$mot_de_passe);
            CreateServeur($login,$id_personne);
            header("Location: /Queen-Burger/HTML/test.php");

        }
        else{
            echo "un argument n'est pas correct"; 
            header("Location: /Queen-Burger/HTML/ajouter.php");
              }
        }else{echo "Problème du serveur";
            header("Location: /Queen-Burger/HTML/ajouter.php");}

        ?>
