<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen Burger Head Master</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="headerContainer">
        <?php 
            include_once 'header.php';
        ?>
    </div>
    <div class="allclasses">
        <h1>Page Gerant</h1>
        <div class='up'>
            <div class='left'>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                        <i class="fas fa-calendar-alt"></i>
                        Absences
                    </a>
                </button>
            </div>

            <div class='right'>
                <form action="traitement-recherche.php" method="GET">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="q" placeholder="Rechercher...">
                </form>
            </div>
        </div>

        <div class='table'>
            <?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "queenburger";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the database to get the employee data
$sql = "SELECT serveur.login, personne.nom, personne.prenom, personne.telephone FROM personne
INNER JOIN serveur ON serveur.information = personne.id";
$result = $conn->query($sql);

// Generate the table HTML
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>nom</th>";
echo "<th>prenom</th>";
echo "<th>tel</th>";
echo "<th>e-mail</th>";
// echo "<th>fonction</th>";
echo "<th>Select</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Loop through the query results and generate a row for each employee
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["prenom"] . "</td>";
    echo "<td>" . $row["telephone"] . "</td>";
    echo "<td>" . $row["login"] . "</td>";
    // echo "<td>" . $row["fonction"] . "</td>";
    echo "<td><input type='checkbox' name='selected[]' value='" . $row["nom"] . "'></td>";
    echo "</tr>";
  }
}

echo "</tbody>";
echo "</table>";

// Close the database connection
$conn->close();
?>

        </div>

        <div class='down'>
            <div class='left'>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                        <i class="fas fa-calendar-alt"></i>
                        Calendrier
                    </a>
                </button>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Modifier
                    </a>
                </button>
            </div>

            <div class='right'>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                        <i class="fa-solid fa-plus"></i>
                        Ajouter
                    </a>
                </button>
                <button class="buttonSHAPE">
                    <a href="/Queen-Burger/HTML/calendar.php">
                        <i class="fa-solid fa-trash"></i>
                        Supprimer
                    </a>
                </button>
            </div>
        </div>

        <div>
        </div>
        <footer>
            <?php 
            include_once 'footer.php';
        ?>
        </footer>

        <style>
        .allclasses {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            margin: 20px;
        }

        .allclasses>* {
            width: 100%;
        }

        /* CSS for section up */
        .up {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .up>div {
            width: 33.33%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .buttonSHAPE {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            text-decoration: none;
            background-color: white;
            border: none;
            color: black;
            padding: 5px;
            font-size: 16px;
            cursor: pointer;
            transition-duration: 0.4s;
            border-radius: 12px;
            border: solid 1px black;
            margin: 3px;
        }

        .buttonSHAPE:hover {
            background-color: #4CAF50;
            color: white;
        }

        .buttonSHAPE i {
            font-size: 24px;
        }
        /* CSS for table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table th,
        table td {
            text-align: left;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        /* CSS for section down */
        .down {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .down>div {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .left > *{
            margin: 3px, 0px;
        }
        .right > *{
            margin: 3px, 0px;
        }
        </style>
        <script src="https://kit.fontawesome.com/97d4053eaa.js" crossorigin="anonymous"></script>
        <script src="/Queen-Burger/JavaScript/app.js" defer></script>
</body>

</html>
