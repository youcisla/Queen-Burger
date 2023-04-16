<header>

    <img src="Public/Images/burger_queen.png">
    <h1> Burger Queen </h1>

    <?php 
        //test si la personne est connecté

        //pour le moment je laisse ca
        if(false) {
            echo "<a> espace staff </a>";       
        } else {
            echo "<a href = 'Public/connexion.php'>Connexion</a>";
        }
    ?>

</header>

<style>

    header {
        background-color: gray;
        position: sticky;
        top: 0;
        width: 100%;
        height: 10vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    header img {
        height: 10vh;
    }


</style>