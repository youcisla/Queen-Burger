<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/modification.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JavaScript/header.js" defer></script>
    <title>Modification</title>
</head>

<body>
    <div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>

    <?php
include_once '../BaseDeDonne/indexx.php';
$conn=bdd();
$id_selec = $_POST['id_selec'];
$sql = "SELECT * FROM personne WHERE id = '$id_selec'";
$result = $conn->query($sql);
$result = $result->fetch_assoc();

?>

    <div class="principal">
        <h1> <?php echo sprintf("Modification des informations de %s %s", $result['nom'], $result['prenom']) ?> </h1>
        <p>
            <?php 

    $nom = $result['nom'];
    $prenom = $result['prenom'];
    $tel = $result['telephone'];
    $mail = $result['mail'];
    $mdp = $result['mot_de_passe'];
    $login = $result['login'];
    $id = $result['id'];

$conn->close();
?>
        <form class="form" action="/Queen-Burger/BaseDeDonne/modifier_post.php" method="POST">

            <div class="together">
                <label class="label" for="nom">Nom</label>
                <input class="input" class="input" type="text" name="nom" id="nom" value="<?php echo $nom ;?>" required>
            </div>

            <div class="together">
                <label class="label" for="prenom">Prenom</label>
                <input class="input" type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>" required>
            </div>

            <div class="together">
                <label class="label" for="telephone">Telephone</label>
                <input class="input" type="tel" name="telephone" id="telephone" value="<?php echo $tel;?>" required>
            </div>

            <div class="together">
                <label class="label" for="mail">Mail</label>
                <input class="input" type="text" name="mail" id="mail" value="<?php echo $mail;?>" required>
            </div>

            <div class="together">
                <label class="label" for="login">Login</label>
                <input class="input" type="text" name="login" id="login" value="<?php echo $login;?>" required>
            </div>

            <div class="together">
                <label class="label" for="mot_de_passe">Mot de passe</label>
                <input class="input" type="text" name="mot_de_passe" id="mot_de_passe" value="<?php echo $mdp;?>"
                    required>
            </div>

            <div class="together">
                <label class="label" for="role">Role</label>
                <select class="select" name="role" value>
                    <option class="option" value="serveur"> Serveur </option>
                    <option class="option" value="cuisinier"> Cuisinier </option>
                    <option class="option" value="client"> Client </option>
                    <option class="option" value="gerant"> Gerant </option>
                </select>
            </div>

            <div class="together">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button class="buttonForm" type="submit">Modifier</button>
            </div>

        </form>
        </p>
    </div>
    <footer>
        <?php 
            include_once 'footer.php';
        ?>
    </footer>
    <!-- <script src="../JavaScript/header.js" defer></script> -->
</body>

</html>