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
    <link rel="stylesheet" href="/Queen-Burger/CSS/inscription.css" />
    <title>Inscription</title>
</head>

<body>
    <div class="principal">
        <div class="burger-top">
            <h1>Inscription</h1>
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
        <form method="POST" action="/Queen-Burger/BaseDeDonne/validation.php">

            <div class="nom">
                <label for="Tnom">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/name.png" alt="name" />
                </label>
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/name.png" alt="name" />
            </div>

            <div class="prenom">
                <label for="Tprenom">
                    <img width="35" height="35" src="https://img.icons8.com/ios/50/name--v1.png" alt="name--v1" />
                </label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                <img width="35" height="35" src="https://img.icons8.com/ios/50/name--v1.png" alt="name--v1" />
            </div>

            <div class="telephone">
                <label for="Ttelephone">
                    <img width="35" height="35" src="https://img.icons8.com/dotty/80/phone-book.png" alt="phone-book" />
                </label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" placeholder="Téléphone" required>
                <img width="35" height="35" src="https://img.icons8.com/dotty/80/phone-book.png" alt="phone-book" />
            </div>

            <div class="mail">
                <label for="mail">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/new-post.png"
                        alt="new-post" />
                </label>
                <input type="email" id="mail" name="mail" placeholder="Email" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/new-post.png" alt="new-post" />
            </div>

            <div class="login">
                <label for="Tlogin">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/login-rounded-right.png"
                        alt="login-rounded-right" />
                </label>
                <input type="text" id="login" name="login" placeholder="Login" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/login-rounded-right.png"
                    alt="login-rounded-right" />
            </div>

            <div class="mot_de_passe">
                <label for="Tmot_de_passe">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png"
                        alt="password" />
                </label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mots de passe" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png" alt="password" />
            </div>

            <div class="confirmation du mot de passe">
                <label for="Tconfirmation">
                    <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png"
                        alt="password" />
                </label>
                <input type="password" id="confirmation" name="confirmation" placeholder="Confirmation" required>
                <img width="35" height="35" src="https://img.icons8.com/ios-filled/50/password.png" alt="password" />
            </div>

            <div class="bouton">
                <button type="submit">Créer Mon Compte</button>

            </div>
        </form>
        <div class = "connexion">
            <p>Vous avez déjà un compte ?</p>
            <button class="burgerButton" onclick="goToSignIn()">Connection</button>
        </div>
    </div>
    <script src="/Queen-Burger/JavaScript/app.js" defer></script>
    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>
</body>

</html>