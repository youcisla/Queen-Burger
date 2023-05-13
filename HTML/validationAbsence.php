<?php
include_once "../BaseDeDonne/Absence.php";
include_once "envoieMail.php";
include_once "../BaseDeDonne/Cuisinier.php";


//verif si la personne est co a ajouter

$id_personne = 1; // 0 zero pour le moment, a modifier avec l id de la personne connecté



if(!isset($_POST["debutDate"],  $_POST["finDate"])) {
    // pas de date dans le post ???
    header("Location: ../HTML/creationAbsence.php");


} else {
    $dateDebut = $_POST["debutDate"];
    $dateFin = $_POST["finDate"];

    if($dateDebut > $dateFin) {
        //date invalide
        header("Location: ../HTML/creationAbsence.php");
        

    } else {

        //envoei du mail

        //recupe le mail de tout les cuisto
        $mails = GetAllCuisinierMail();
        print_r($mails);

        foreach($mails as $mail) {
            if(!envoieMailAbsence($mail, $dateDebut, $dateFin, $id_personne)) {
                
                exit;
            }
        }
        
        //ajout de l'absence a la bdd
        CreateAbsence($dateDebut,$dateFin,$id_personne);

        //redirection a changer
        header("Location: ../index.php");
    }
}




?>