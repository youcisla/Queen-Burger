<?php
function bdd(){
        $conn = new mysqli('localhost','root','','queenburger');
        if( $conn->connect_error ) {
                die("Erreur : 1conn->connect_error");
                }
        return $conn;
}

?>