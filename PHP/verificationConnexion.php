<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../BaseDeDonne/indexx.php";

function estConnecte() {
    if(isset($_SESSION["id"])) {
        $sql = "SELECT * FROM personne WHERE id = {$_SESSION["id"]}";
        $result = bdd()->query($sql);
        return $result->num_rows > 0;
    }
    return false;
}

function idConnexion() {
    return $_SESSION["id"];
}

/* retourne un entier corespondant a un role
  - 1 : gerant
  - 2 : cuisinier
  - 3 : serveur
  - 4 : client  
  - 0 : pas trouvé dans la base de donné
*/
function roleConnexion() {
    if(!estConnecte()) {
        return 0;
    }

    $id_personne = idConnexion();

    $sql1 = "SELECT * FROM gerant WHERE id_personne = {$id_personne}";
    $result1 = bdd()->query($sql1);
    if ($result1->num_rows > 0) {
        return 1;
    }

    $sql2 = "SELECT * FROM cuisinier WHERE id_personne = {$id_personne}";
    $result2 = bdd()->query($sql2);
    if ($result2->num_rows > 0) {
        return 2;
    }

    $sql3 = "SELECT * FROM serveur WHERE id_personne = {$id_personne}";
    $result3 = bdd()->query($sql3);
    if ($result3->num_rows > 0) {
        return 3;
    }

    $sql4 = "SELECT * FROM client WHERE id_personne = {$id_personne}";
    $result4 = bdd()->query($sql4);
    if ($result4->num_rows > 0) {
        return 4;
    }

    return 0;
}

/**
 * test si la personne est connecté et a le bon role, 
 * si non elle est redirigé
 * 
 * redirection : chemin de la page ou rediriger si mauvais role
 * roles : array contenant les roles autorisé
 */
function redirectionConnexion($roles, $redirection) {
    if(!estConnecte()) {
        // pas connecté
        header("Location: {$redirection}");
    }

    $role = roleConnexion();

    if(!in_array($role, $roles)) {
        //pas le bon role
        header("Location: {$redirection}");
    }
}



?>