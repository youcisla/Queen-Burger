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
    <!-- <form action="action.php" method="post"> -->
    <form method="post">
        <h2>Se connecter</h2>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Se connecter">
    </form>

    <?php
session_start(); // Add this line to start the session
include_once "../BaseDeDonne/indexx.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Establish a database connection
  $c = bdd();

  // Query the database to get the employee data
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `Gerant` WHERE `Gerant`.`login` = ? AND `Gerant`.`mot_de_passe` = ?";
  $stmt = $c->prepare($sql);
  $stmt->bind_param('ss', $email, $password);
  $stmt->execute();

  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  if ($row) {
    // After successful login/authentication
    $_SESSION['gerant_id'] = $row['id']; // Corrected to use $row['id']
    // Successful login, redirect to base.php
    header('Location: base.php');
    exit();
  } else {
    // Failed login, show error message
    echo 'Invalid email or password';
  }
}
?>




</body>

</html>