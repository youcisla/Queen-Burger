<?php
include_once 'Client.php';
include_once 'Personne.php';
include_once 'indexx.php';
if(!empty($_POST)){
    if(
        isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["login"],$_POST["mot_de_passe"],$_POST["confirmation"])
        &&!empty($_POST["nom"]) &&!empty($_POST["prenom"]) &&!empty($_POST["telephone"]) 
        &&!empty($_POST["login"]) &&!empty($_POST["mot_de_passe"]) &&!empty($_POST["confirmation"])
    ){
        if($_POST["mot_de_passe"]==$_POST["confirmation"]){
            $nom=strip_tags($_POST["nom"]);
            $prenom=strip_tags($_POST["prenom"]);
            $telephone=strip_tags($_POST["telephone"]);
            $login=strip_tags($_POST["login"]);
            $mot_de_passe=strip_tags($_POST["mot_de_passe"]);
           
            CreatePersonne($nom,$prenom,$telephone);
            //id
            $information=bdd()->lastInsertId();
            CreateClient($login,$mot_de_passe,$information);
            die("Client enregistré");
            


        }
        else
        {die("formulaire incomplet mots de passe");
        }
    }
    else {die("formulaire incomplet");}
}
?>
