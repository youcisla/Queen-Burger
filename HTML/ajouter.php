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
          <h1>Inscription</h1>  
            <form method="POST" action="/Queen-Burger/BaseDeDonne/inscription_serveur.php">
                <label for="Tnom">Nom</label><br/>
                <input type="text" id="nom" name="nom" required><br/>

                <label for="Tprenom">Prenom</label><br/>
                <input type="text" id="prenom" name="prenom" required><br/>

                <label for="telephone">Telephone</label><br/>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required><br/>

                <label for="mail">email</label><br/>
                <input type="mail" id="mail" name="mail" required><br/>

                <label for="login">Login</label><br/>
                <input type="login" id="login" name="login" required><br/>

                <label for="mot_de_passe">Mots de passes</label><br/>
                <input type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" required><br/>
                <label for="role">Role</label><br/>
                <select name="role" value>
                    <option value="serveur"> Serveur </option>
                    <option value="cuisinier"> Cuisinier </option>
                    <option value="client"> Client </option>
                    <option value="gerant"> Gerant </option>
                </select>
                <br/>

                </div>
                <button type="submit">Creer mon compte </button>

            </form>
            <footer>
            <?php 
            include_once 'footer.php';
        ?>
</footer>
</body>
</html>
