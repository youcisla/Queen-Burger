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
    $res = getPersonne($id_personne)['role'];
    return $res;
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