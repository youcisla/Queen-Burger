<?php
include_once "../BasedeDonne/Personne.php";

// destinataire : mail du destinataire
// absence : {id, personne, dateDebut, dateFIn}

function envoieMailAbsence($destinataire, $debut, $fin, $id_personne) {
    $personne = ReadPersonne($id_personne);

    print_r($personne);

    $mailBurgerQueen = "burger.queen.off@gmail.com";

    $sujet = "Absence de " . $personne["nom"] . " " . $personne["prenom"] . ".";

    $headers = array();
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = "From: BurgerQueen {$mailBurgerQueen}";

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
    
    return mail($destinataire, $sujet, $contenu, implode("\r\n", $headers));
    
    
}



?>