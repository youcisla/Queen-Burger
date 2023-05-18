<?php
include_once 'indexx.php';
//focnrtion non mise a jour :(
function personne(){
    $sql="CREATE TABLE IF NOT EXISTS `personne` (
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `nom` varchar(100) NOT NULL,
        `prenom` varchar(100) NOT NULL,
        `role` enum('client','serveur','cuisinier','gerant') NOT NULL DEFAULT 'client',
        `telephone` varchar(100) NOT NULL,
        `login` varchar(100) NOT NULL,
        `mot_de_passe` varchar(100) NOT NULL,
        `mail` varchar(100) NOT NULL
      )";
bdd()->query($sql);

}


function getPersonne($id) {
    $conn = bdd();

    $sql = "SELECT * FROM personne WHERE id = '$id'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    return $result;
}

// Vérifie que les infos donnée pour l'inscription ne sont pas deja prises
function infoValide($login, $mail) {

    $conn = bdd();

    $sqlLogin = "SELECT * FROM personne WHERE login = '$login'";
    $sqlMail = "SELECT * FROM personne WHERE mail = '$mail'";

    $resultLogin = $conn->query($sqlLogin);
    $resultLogin = $resultLogin -> fetch_assoc();

    $resultMail = $conn->query($sqlMail);
    $resultMail = $resultMail -> fetch_assoc();

    return (empty($resultLogin) && empty($resultMail));

}

// Fonction pour ajouter une personne à la table
function ajouterPersonne($nom, $prenom, $telephone, $login, $mot_de_passe, $mail, $role) {

    $conn = bdd();

    $sql = "INSERT INTO personne (nom, prenom, telephone, login, mot_de_passe, mail, role)
            VALUES ('$nom', '$prenom', '$telephone', '$login', '$mot_de_passe', '$mail', '$role')";

    if ($conn->query($sql) === true) {
        echo "La personne a été ajoutée avec succès.";
        
    } else {
        echo "Erreur lors de l'ajout de la personne: " . $conn->error;
    }

    $conn->close();
}

// Fonction pour supprimer une personne de la table
function supprimerPersonne($id) {

    $conn = bdd();

    $sql = "DELETE FROM personne WHERE id = '$id'";

    if ($conn->query($sql) === true) {
        echo "La personne a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la personne: " . $conn->error;
    }

    $conn->close();
}

// Fonction pour modifier les informations d'une personne dans la table
function modifierPersonne($id, $nouveauNom, $nouveauPrenom, $nouveauRole, $nouveauTelephone, $nouveauLogin, $nouveauMdp, $nouveauMail) {

    $conn = bdd();

    $sql = "UPDATE personne SET nom = '$nouveauNom', prenom = '$nouveauPrenom', role = '$nouveauRole', telephone = '$nouveauTelephone', login = '$nouveauLogin', mot_de_passe = '$nouveauMdp', mail = '$nouveauMail' WHERE id = '$id'";

    if ($conn->query($sql) === true) {
        echo "Les informations de la personne ont été modifiées avec succès.";
    } else {
        echo "Erreur lors de la modification des informations de la personne: " . $conn->error;
    }

    $conn->close();
}

function affichePage($nb) {
    $nb = $nb*5;
    $max = 5;
    $conn = bdd();
    $sql = "SELECT * FROM personne ORDER BY id LIMIT $nb, $max";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Erreur SQL : " . mysqli_error($conn);
        exit;
    }

    if ($result->num_rows > 0) {
        echo "
        <h2> Resultat de la recherche : </h2>
        <table>
            <tr>
                <td> <strong> Nom </strong> </td>
                <td> <strong> Prenom </strong> </td>
                <td> <strong> Mail </strong> </td>
                <td> <strong> Login </strong> </td>
                <td> <strong> Mot de passe </strong> </td>
            </tr>
        ";
        foreach($result as $temp) {
            echo "<tr>";
            echo sprintf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",$temp['nom'],$temp['prenom'],$temp['mail'],$temp['login'],$temp['mot_de_passe']);
            echo sprintf("<td> <form action='modification.php' method='POST'>
                            <button type='submit' name='id_selec' value='%d'> Modifier </button>
                        </form> </td>
                        <td> <form action='/Queen-Burger/BaseDeDonne/suppression.php' method='POST'>
                        <button type='submit' name='id' value='%d'>Supprimer</button>
                    </form> </td>", $temp['id'],$temp['id']);
        }
        echo "</table>";
    } else {
        "Fin des résultats";
    }
}

function afficheRecherche($recherche) {
    $conn = bdd();
    $sql = "SELECT * FROM personne WHERE nom LIKE '$recherche' OR prenom LIKE '$recherche'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Erreur SQL : " . mysqli_error($conn);
        exit;
    }

    if ($result->num_rows > 0) {
        echo "
        <h2> Resultat de la recherche : </h2>
        <table>
            <tr>
                <td> <strong> Nom </strong> </td>
                <td> <strong> Prenom </strong> </td>
                <td> <strong> Mail </strong> </td>
                <td> <strong> Login </strong> </td>
                <td> <strong> Mot de passe </strong> </td>
            </tr>
        ";
        foreach($result as $temp) {
            echo "<tr>";
            echo sprintf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",$temp['nom'],$temp['prenom'],$temp['mail'],$temp['login'],$temp['mot_de_passe']);
            echo sprintf("<td> <form action='modification.php' method='POST'>
                            <button type='submit' name='id_selec' value='%d'> Modifier </button>
                        </form> </td>
                        <td> <form action='/Queen-Burger/BaseDeDonne/suppression.php' method='POST'>
                        <button type='submit' name='id' value='%d'>Supprimer</button>
                    </form> </td>", $temp['id'],$temp['id']);
        }
        echo "</table>";
    } else {
        "Aucun resultat";
    }

}

function genererLogin($prenom, $nom) {
    $prenom = strtolower($prenom);
    $nom = strtolower($nom);
    $login = $nom . substr($prenom, 0, 1);
    return $login;
}

function randomUserBDD($nb) {
    $conn = bdd();

    $prenoms = ['Jean', 'Marie', 'Luc', 'Sophie', 'Pierre', 'Julie', 'Paul', 'Isabelle', 'François', 'Alice', 'Antoine', 'Emilie', 'Michel', 'Claire', 'Thomas', 'Charlotte', 'David', 'Valerie', 'Mathieu', 'Caroline'];

    $noms = ['Martin', 'Dubois', 'Lefebvre', 'Bernard', 'Thomas', 'Petit', 'Robert', 'Richard', 'Durand', 'Dufour', 'Moreau', 'Gagnon', 'Girard', 'Tremblay', 'Roy', 'Fortin', 'Morin', 'Lavoie', 'Pelletier', 'Bouchard'];

    while($nb > 0) {
        $prenom = $prenoms[array_rand($prenoms)];
        $nom = $noms[array_rand($noms)];
        $login = genererLogin($prenom, $nom);
        $sql = sprintf("INSERT INTO `personne` (`id`, `nom`, `prenom`, `role`, `telephone`, `login`, `mot_de_passe`, `mail`) VALUES (NULL, '%s', '%s', 'client', '0987654321', '%s', 'password', 'password');", $nom, $prenom, $login);
        $conn->query($sql);
        $nb = $nb - 1;
    }
}

function afficheRole($role) {

    $conn = bdd();
    $sql = "SELECT * FROM personne WHERE role = '$role'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Erreur SQL : " . mysqli_error($conn);
        exit;
    }

    if ($result->num_rows > 0) {
        echo sprintf("
        <h2> Liste des %ss : </h2>
        <table>
            <tr>
                <td> <strong> Nom </strong> </td>
                <td> <strong> Prenom </strong> </td>
                <td> <strong> Mail </strong> </td>
                <td> <strong> Login </strong> </td>
                <td> <strong> Mot de passe </strong> </td>
            </tr>
        ", $role);
        foreach($result as $temp) {
            echo "<tr>";
            echo sprintf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",$temp['nom'],$temp['prenom'],$temp['mail'],$temp['login'],$temp['mot_de_passe']);
            echo sprintf("<td> <form action='modification.php' method='POST'>
                            <button type='submit' name='id_selec' value='%d'> Modifier </button>
                        </form> </td>
                        <td> <form action='/Queen-Burger/BaseDeDonne/suppression.php' method='POST'>
                        <button type='submit' name='id' value='%d'>Supprimer</button>
                    </form> </td>", $temp['id'],$temp['id']);
        }
        echo "</table>";
    }
}

// Fonction pour obtenir le rôle d'une personne
function obtenirRole($id) {

    $conn = bdd();

    $sql = "SELECT role FROM personne WHERE id = '$id'";

    $resultat = $conn->query($sql);

    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        echo "Le rôle de la personne avec l'ID $id est : " . $row["role"];
    } else {
        echo "Aucun enregistrement trouvé pour l'ID $id.";
    }

    $conn->close();
}
?>