<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../BaseDeDonne/indexx.php";
include_once "../BaseDeDonne/personne.php";

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

/* retourne le role de la personne
  - gerant
  - cuisinier
  - serveur
  - client  
*/
function roleConnexion() {
    if(!estConnecte()) {
        return 'none';
    }

    $id_personne = idConnexion();
    $res = getPersonne($id_personne)['role'];
    return $res;
}

/**
 * test si la personne est connecté et a le bon role, 
 * si non elle est redirigé
 * 
 * redirection : chemin de la page ou rediriger si mauvais role
 * roles : liste des roles autorisés
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