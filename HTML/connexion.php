<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
// Add this line to start the session

include '../BaseDeDonne/indexx.php';
include '../BaseDeDonne/Personne.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Establish a database connection

  // Query the database to get the person's ID
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT id FROM `personne` WHERE personne.mail = ? AND Personne.mot_de_passe = ?";
  $stmt = bdd()->prepare($sql);
  $stmt->bind_param('ss', $email, $password);
  $stmt->execute();

  $result = $stmt->get_result();

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION["id"] = $row["id"];
    header("Location: base.php");
  }
  
}

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
    <div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>

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
                <p>Vous n'avez pas un compte ?</p>
                <button class="burgerButton" onclick="goToSignUp()">Inscription</button>
            </div>

        </form>
    </div>

    <script src="/Queen-Burger/JavaScript/app.js" defer></script>

    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>
</body>

</html>