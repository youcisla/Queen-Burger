
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>
    
</body>
</html>
<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "queenburger";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=1;
// Query the database to get the employee data
$sql = "SELECT serveur.login,serveur.mot_de_passe,personne.nom, personne.prenom, personne.telephone,personne.mail FROM personne
INNER JOIN serveur ON serveur.information = personne.id WHERE serveur.id='$id'";
$result = $conn->query($sql);
?>
<div class="principal">
    <h1>Page Gerant</h1>
    <p>	
        <?php if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Accéder aux données individuelles
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $tel = $row['telephone'];
        $mail = $row['mail'];
        $login = $row['login'];
        $mdp = $row['mot_de_passe'];

        // Effectuer les opérations nécessaires avec les données
        // ...
    }
} else {
    // Gérer l'erreur de la requête
    echo "Erreur de requête : " . $mysqli->error;
}
$conn->close();
?>
        <form action="/Queen-Burger/BaseDeDonne/modifier_post.php" method="POST">


            <label for="nom">Nom</label><br/>
                <input type="text" name="nom" id= "nom" value="<?php echo $nom ;?>" required><br/>
            <label for="prenom">Prenom</label><br/>
                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>" required><br/>
            <label for="telephone">Telephone</label><br/>
                <input type="tel" name="telephone" id="telephone"  value="<?php echo $tel;?>" required><br/>
            <label for="mail">Mail</label><br/>
                <input type="text" name="mail" id="mail" value="<?php echo $mail;?>" required><br/>
            <label for="login">Login</label><br/>
                <input type="text" name="login" id="login" value="<?php echo $login;?>" required><br/>
            <label for="mot_de_passe">Mots de passe</label><br/>
                <input type="text" name="mot_de_passe" id="mot_de_passe" value="<?php echo $mdp;?>" required><br/>
            <button type="submit">Modifier</button>

        </form>
    </p>
</div>
<footer>
            <?php 
            include_once 'footer.php';
        ?>
</footer>