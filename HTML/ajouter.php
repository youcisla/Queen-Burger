<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Queen-Burger/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="/Queen-Burger/CSS/ajouter.css">
    <title>Document</title>
</head>

<body>
    <div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>
    <h1>Inscription</h1>
    <form class="form" method="POST" action="/Queen-Burger/BaseDeDonne/inscription_serveur.php">
        <div class="together">
            <label class="label" for="Tnom">Nom</label><br />
            <input class="input" type="text" id="nom" name="nom" required><br />
        </div>

        <div class="together">
            <label class="label" for="Tprenom">Prenom</label><br />
            <input class="input" type="text" id="prenom" name="prenom" required><br />
        </div>

        <div class="together">
            <label class="label" for="telephone">Telephone</label><br />
            <input class="input" type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required><br />
        </div>

        <div class="together">
            <label class="label" for="mail">email</label><br />
            <input class="input" type="mail" id="mail" name="mail" required><br />
        </div>

        <div class="together">
            <label class="label" for="login">Login</label><br />
            <input class="input" type="login" id="login" name="login" required><br />
        </div>

        <div class="together">
            <label class="label" for="mot_de_passe">Mots de passes</label><br />
            <input class="input" type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" required><br />
        </div>
        <div class="together">
            <label class="label" for="role">Role</label><br />
            <select class="select" name="role" value>
                <option class="option" value="serveur"> Serveur </option>
                <option class="option" value="cuisinier"> Cuisinier </option>
                <option class="option" value="client"> Client </option>
                <option class="option" value="gerant"> Gerant </option>
            </select>
        </div>
        <br />

        </div>
        <button class="buttonForm" type="submit">Creer mon compte </button>

    </form>
    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>
</body>

</html>