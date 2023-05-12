
<?php
include_once "../BaseDeDonne/indexx.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Queen-Burger/CSS/connexion.css">
    <title>Connexion</title>
</head>
<body>
<form action="action.php" method="post">
        <h2>Se connecter</h2>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Se connecter">
</form>

    <?php
// Establish a database connection
$c = bdd();

// Query the database to get the employee data
$sql = "SELECT * From personne where personne.login = {$_POST['email']} and personne.mot_de_passe = {$_POST['password']}";

$result = $c->query($sql);

$row = $result->fetch_assoc()
?>
    
</body>
</html>