
<header id="header" class="header_return">
    <?php
    include_once "../PHP/verificationConnexion.php";

    //acueil
    echo "<button class='burgerButton' onclick='goToHome()'>Acceuil</button>";

    if(estConnecte()) {
        // connecté

        $role = roleConnexion();

        // ajoute des liens dans le header en fonction du role
        if($role == "gerant") {
            //gerant connecté
            
            echo "<button class = 'burgerButton' onclick = 'goToSecteurs()'>Secteurs</button>";
            
            //gestion serveur
            echo "<button class = 'burgerButton' onclick = 'goToServers()'>Serveurs</button>";

            //emploie du temps
            echo "<button class = 'burgerButton' onclick = 'goToCalendar()'>Calendar</button>";
        }

        if($role == "cuisinier") {
            //cuisinier connecté
            
            echo "<button class = 'burgerButton' onclick = 'goToSecteurs()'>Secteurs</button>";

            //gestion serveur
            echo "<button class='burgerButton' onclick='goToServers()'>Serveurs</button>";

            //emploie du temps
            echo "<button class='burgerButton' onclick='goToCalendar()''>Calendar</button>";
        }

        if($role == "serveur") {
            //serveur connecté
            
            //secteur
            //echo "<button class = 'burgerButton' onclick = 'goToSecteurs()'>Secteurs</button>";

            echo "<button class='burgerButton' onclick='openPopup()''>Absence</button>";
            //emploie du temps
            echo "<button class='burgerButton' onclick='goToCalendarServeur()''>Calendar</button>";
        }

        if($role == "client") {
            //client connecté
        }

        //deconnection
        echo "<button class='burgerButton' onclick='goToLogOut()'>Déconnexion</button>";

    } else {
        // pas connecté

        //inscription
        echo "<button class='burgerButton' onclick='goToSignUp()'>Inscription</button>";
        //connexion
        echo "<button class='burgerButton' onclick='goToSignIn()'>Connexion</button>";
    }

    ?>

<script src="/Queen-Burger/JavaScript/header.js" defer></script>
<script src="/Queen-Burger/JavaScript/app.js" defer></script>
<script src="../JavaScript/absence.js" defer></script>

</header>
