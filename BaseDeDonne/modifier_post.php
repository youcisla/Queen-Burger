
<?php
include_once 'indexx.php';
include_once 'Personne.php';


function estValide() {
    return (isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"],$_POST["login"],$_POST["mot_de_passe"])
    && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["telephone"]) && !empty($_POST["mail"])
    && !empty($_POST["login"]) && !empty($_POST["mot_de_passe"]));
}



if(!empty($_POST)){
    if(estValide()) {
            $nom = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);
            $telephone = strip_tags($_POST["telephone"]);
            $mail = strip_tags($_POST["mail"]);
            $login = strip_tags($_POST["login"]);
            $mot_de_passe = strip_tags($_POST["mot_de_passe"]);
            $id = strip_tags($_POST["id"]);
            $role = $_POST["role"];

            modifierPersonne($id ,$nom, $prenom, $role, $telephone, $login, $mot_de_passe, $mail);
            header("Location: /Queen-Burger/HTML/gerant.php");

        }
        else{
            echo "Un argument ou plus n'est pas correcte"; 
            header("Location: /Queen-Burger/HTML/modification.php");
              }
        } else { echo "Problème du serveur";
            header("Location: /Queen-Burger/HTML/modification.php");}

        ?>
