
<?php
include_once 'Serveur.php';
include_once 'Personne.php';
$id=1;

function estValide() {
    return (isset($_POST["nom"],$_POST["prenom"],$_POST["telephone"],$_POST["mail"],$_POST["login"],$_POST["mot_de_passe"])
    && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["telephone"]) && !empty($_POST["mail"])
    && !empty($_POST["login"]) && !empty($_POST["mot_de_passe"]));
}

// On retrouver l'id de la personne correspondante au serveur
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "queenburger";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id_personne, login 
        FROM serveur
        WHERE id = '$id'";
$result = $conn->query($sql);
$result = $result -> fetch_assoc();
$idp = $result['id_personne'];

if(!empty($_POST)){
    if(estValide()) {
            $nom = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);
            $telephone = strip_tags($_POST["telephone"]);
            $mail = strip_tags($_POST["mail"]);
            $login = strip_tags($_POST["login"]);
            $mot_de_passe = strip_tags($_POST["mot_de_passe"]);
            UpdatePersonne($idp ,$nom, $prenom, $telephone, $mail, $mot_de_passe);
            UpdateServeur($id, $login);
            header("Location: /Queen-Burger/HTML/test.php");

        }
        else{
            echo "Un argument ou plus n'est pas correcte"; 
            header("Location: /Queen-Burger/HTML/modification.php");
              }
        } else { echo "Problème du serveur";
            header("Location: /Queen-Burger/HTML/modification.php");}

        ?>
