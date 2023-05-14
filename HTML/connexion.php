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
include_once "../BaseDeDonne/indexx.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Establish a database connection
  $c = bdd(); //?????

  // Query the database to get the employee data
  $sql = "SELECT * FROM `gerant` WHERE `gerant`.`login` = ? AND `gerant`.`mot_de_passe` = ?";
  $stmt = $c->prepare($sql);
  $stmt->bind_param('ss', $_POST['email'], $_POST['password']);
  $stmt->execute();

  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  if ($row) {
    // Successful login, redirect to dashboard.php
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
