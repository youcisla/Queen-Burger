<?php
// modif de la connexion, avant on cree une connexion par appel de la fonction
// retour de insert_id
$connection = NULL;

function bdd() {
    global $connection;
    if($connection != NULL) {
        return $connection;
    } else {
        $connection = new mysqli('localhost','root','root','queenburger');
        if( $connection->connect_error ) {
            die($connection->connect_error);
        }
        return $connection;
    }
}
?>