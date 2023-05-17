<?php
include_once "../BaseDeDonne/Absence.php";
include_once "envoieMail.php";
include_once "../BaseDeDonne/Cuisinier.php";


//verif si la personne est co a ajouter
$id_serveur = 1; // 0 zero pour le moment, a modifier avec l id de la personne connecté



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
        header("Location: ../calendar.php");
    }
}




?>