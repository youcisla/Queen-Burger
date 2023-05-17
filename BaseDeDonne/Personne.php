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

// Fonction pour se connecter à la base de données
function seConnecterBDD() {
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "root";
    $baseDeDonnees = "queenburger";

    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Erreur de connexion à la base de données: " . $connexion->connect_error);
    }

    return $connexion;
}

function getPersonne($id) {
    $conn = seConnecterBDD();

    $sql = "SELECT * FROM personne WHERE id = '$id'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    return $result;
}

// Vérifie que les infos donnée pour l'inscription ne sont pas deja prises
function infoValide($login, $mail) {

    $conn = seConnecterBDD();

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

    $conn = seConnecterBDD();

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

    $conn = seConnecterBDD();

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

    $conn = seConnecterBDD();

    $sql = "UPDATE personne SET nom = '$nouveauNom', prenom = '$nouveauPrenom', role = '$nouveauRole', telephone = '$nouveauTelephone', login = '$nouveauLogin', mot_de_passe = '$nouveauMdp', mail = '$nouveauMail' WHERE id = '$id'";

    if ($conn->query($sql) === true) {
        echo "Les informations de la personne ont été modifiées avec succès.";
    } else {
        echo "Erreur lors de la modification des informations de la personne: " . $conn->error;
    }

    $conn->close();
}

// Fonction pour obtenir le rôle d'une personne
function obtenirRole($id) {

    $conn = seConnecterBDD();

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