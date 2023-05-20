<?php

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

require '..\PHPMailer/src/Exception.php';
require '..\PHPMailer/src/PHPMailer.php';
require '..\PHPMailer/src/SMTP.php';

include_once "../BasedeDonne/personne.php";


function envoyerMail($adresse_dest, $nom_dest, $contenu, $sujet) {

    $mailBurgerQueen = "queen.burger.off@gmail.com";

    $mail = new PHPMailer;

    $mail->CharSet = 'UTF-8';

    //$mail->SMTPDebug = 2; //debugage

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $mailBurgerQueen;
    $mail->Password = 'ysppiarownhksycz';

    $mail->addCustomHeader('MIME-Version', '1.0');
    $mail->addCustomHeader('Content-type', 'text/html; charset=iso-8859-1');

    $mail->setFrom($mailBurgerQueen, 'Queen Burger');
    $mail->addAddress($adresse_dest, $nom_dest);

    $mail->Subject = $sujet;
    $mail->Body =  $contenu;

    if($mail->send()) {
        return true;
    } else {
        print_r($mail->ErrorInfo);
        //print_r($mail->Debugoutput); //debugage
        return false;
    }

}


// destinataire : mail du destinataire
// debut : date debut absence, format yyyy-mm-dd
// fin : date fin absence, format yyyy-mm-dd
// id_serveur : id du serveur absent

function envoieMailAbsence($destinataire, $debut, $fin, $id_serveur) {
    $personne = getPersonne($id_serveur);


    $mailBurgerQueen = "burger.queen.off@gmail.com";

    $sujet = "Absence de " . $personne["nom"] . " " . $personne["prenom"] . ".";

    // a modifier
    $contenu =
    "<html>
        <head>
            <style>
                p {
                    color : red;
                }
            </style>
        </head>
        <body>
            <p>{$personne['nom']} {$personne['prenom']} sera absent du {$debut} jusqu'a {$fin}</p>
        <body>
    </html>";
    
    return envoyerMail($destinataire, $personne['nom'] ." ". $personne['prenom'], $contenu, $sujet);
    
    
}



?>