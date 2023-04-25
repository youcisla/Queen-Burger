<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<?php // potentille header 
var_dump($_POST);
?>
<body>
    <div class="principal">
        <div class="inscription">
          <h1>Inscription</h1>  
        </div>
            <form method="POST" action="PHP/validation.php">
                <div class="nom">
                <label for="Tnom">Nom</label>
                <input type="text" id="nom" name="nom" required>

                </div>
                <div class="prenom">
                <label for="Tprenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" required>

                </div>
                <div class="telephone">
                <label for="Ttelephone">Telephone</label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{9}" required>

                </div>
                <div class="login">
                <label for="Tlogin">Login</label>
                <input type="login" id="login" name="login" required>

                </div>
                <div class="mot_de_passe">
                <label for="Tmot_de_passe">Mots de passes</label>
                <input type="mot_de_passe" id="mot_de_passe" name="mot_de_passe" required>

                </div>
                <div class="confirmation">
                <label for="Tconfirmation">Confirmation</label>
                <input type="confirmation" id="confirmation" name="confirmation" required>

                </div>
                <button type="submit">
                                    Creer mon compte
                                </button>
            

                </div>
            </form>




    </div>
</body>
</html>

