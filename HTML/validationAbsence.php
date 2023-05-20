<?php
include_once "../BaseDeDonne/Absence.php";
include_once "envoieMail.php";
include_once "../BaseDeDonne/Personne.php";


include_once "../PHP/verificationConnexion.php";
redirectionConnexion(['serveur'], "base.php");


$id_serveur = $_SESSION["id"];



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

        //envoit du mail

        //recupe le mail de tout les cuisto
        $mails = GetAllMail();
        print_r($mails);

        foreach($mails as $mail) {
            if(!envoieMailAbsence($mail, $dateDebut, $dateFin, $id_serveur)) {
                exit;
            }
        }
        
        //ajout de l'absence a la bdd
        CreateAbsence($dateDebut,$dateFin,$id_serveur);

        //supression de tout les creneaux des jours ou l'employé est absent
        $sql = "DELETE FROM creneaux WHERE date between {$dateDebut} and {$dateFin}";

        $sql = "DELETE FROM assignation_serveur WHERE (assignation_serveur.date BETWEEN '{$dateDebut}' AND '{$dateFin}') AND assignation_serveur.id_serveur = {$id_serveur}";
        bdd()->query($sql);


        //redirection a changer
        header("Location: calendar.php");
    }
}




?>