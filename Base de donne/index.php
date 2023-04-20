<?php
function bdd(){
        $host="localhost";
        $user = "root";
        $pass = "";
        $name="burgerqueen";
        $bdd = new mysqli($host,$user,$pass,$name);
        return $bdd;
}

?>