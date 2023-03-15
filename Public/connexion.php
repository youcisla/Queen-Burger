<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="connexion" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="Style/connexion.css">
</head>
<body>
    <main>
        <form action="connexion.php" method="POST">
                <div>
                    <label for="login">Login : </label>
                    <input type="text" name="login" id="login" required>
                    
                </div>
                <div>
                    <label for="mdp">Mot de passe : </label>
                    <input type="password" name="mdp" id="mdp" required>      
                </div>
                <div>
                    <input type="submit" value="connexion">
                </div>
        </form>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>