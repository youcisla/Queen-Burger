<?php
function bdd(){
        $pdo = new PDO('mysql:host=localhost;dbname=base-de-donne', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
}

?>