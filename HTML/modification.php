
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
<div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>
    
<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "queenburger";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id_selec = $_POST['id_selec'];
$sql = "SELECT * FROM personne WHERE id = '$id_selec'";
$result = $conn->query($sql);
$result = $result->fetch_assoc();

?>

<div class="principal">
    <h1> <?php echo sprintf("Modification des informations de %s %s", $result['nom'], $result['prenom']) ?> </h1>
    <p>	
<?php 
    if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Accéder aux données individuelles
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $tel = $row['telephone'];
        $mail = $row['mail'];
        $mdp = $row['mot_de_passe'];

        // Effectuer les opérations nécessaires avec les données
        // ...
    }
} else {
    // Gérer l'erreur de la requête
    echo "Erreur de requête : " . $conn->error;
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
            <label for="mot_de_passe">Mot de passe</label><br/>
                <input type="text" name="mot_de_passe" id="mot_de_passe" value="<?php echo $mdp;?>" required><br/>
            <label for="role">Role</label><br/>
                <select name="role" value>
                    <option value="client"> Client </option>
                    <option value="serveur"> Serveur </option>
                    <option value="cuisinier"> Cuisinier </option>
                    <option value="gerant"> Gerant </option>
                </select>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit">Modifier</button>

        </form>
    </p>
</div>
<footer>
            <?php 
            include_once 'footer.php';
        ?>
</footer>
</body>
</html>