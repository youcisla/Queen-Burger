<?php
include_once 'Personne.php';
function estValide() {
    return (isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"],$_POST["login"],$_POST["mot_de_passe"],$_POST["role"])
    && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["telephone"]) && !empty($_POST["mail"])
    && !empty($_POST["login"]) && !empty($_POST["mot_de_passe"]) && !empty($_POST["role"]));
}
if(!empty($_POST)){
    if(estValide()) {
            $nom = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);
            $telephone = strip_tags($_POST["telephone"]);
            $mail = strip_tags($_POST["mail"]);
            $login = strip_tags($_POST["login"]);
            $mot_de_passe = strip_tags($_POST["mot_de_passe"]);
            $role = $_POST["role"];
            ajouterPersonne($nom, $prenom, $telephone, $login, $mot_de_passe, $mail, $role);
            header("Location: /Queen-Burger/HTML/gerant.php");

        }
        else{
            echo "Un argument ou plus n'est pas correcte"; 
            header("Location: /Queen-Burger/HTML/ajouter.php");
              }
        } else { echo "Problème du serveur";
            header("Location: /Queen-Burger/HTML/ajouter.php");}

        ?>
