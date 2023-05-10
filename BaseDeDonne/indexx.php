<?php
function bdd(){
        $conn = new mysqli('localhost','root','','base-de-donne');
        if( $conn->connect_error ) {
                die("Erreur : 1conn->connect_error");
                }
        return $conn;
}

?>