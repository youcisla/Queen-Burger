<?php
include_once "../BaseDeDonne/indexx.php";
?>
<!DOCTYPE html>
<html lang="en">

<div class="headerContainer">
    <?php 
        include_once 'header.php';
     ?>
</div>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Queen-Burger/CSS/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <!-- <form action="action.php" method="post"> -->
    <div class="principal">
        <div class="burger-top">
            <h1>Se connecter</h1>
        </div>

        <div class="leaf-container">
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
            <div class="leaf"></div>
        </div>
        <form method="POST">

            <div class="mail">
                <label for="mail">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/new-post.png"
                        alt="new-post" />
                </label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/new-post.png" alt="new-post" />
            </div>

            <div class="empty">
                <label for="empty">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/hamburger.png"
                        alt="hamburger" />
                </label>
                <input required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/hamburger.png" alt="hamburger" />
            </div>

            <div class="mot_de_passe">
                <label for="Tmot_de_passe">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png"
                        alt="password" />
                </label>
                <input type="password" id="password" name="password" placeholder="Mots de passe" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png" alt="password" />
            </div>

            <div class="bouton">
                <input type="submit" value="Se connecter">
            </div>

        </form>
    </div>

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

    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>


</body>

</html>