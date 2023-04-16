<?php 
    include_once 'header.php';
?>
<head>
  <title>Table Management</title>
  <link rel="stylesheet" type="text/css" href="/Queen-Burger/CSS/style.css">
  <script src="../JavaScript/app.js"></script>
</head>
<body>
  <button onclick="ajouterTable()">Ajouter une table</button>
  <button onclick="supprimerTable()">Supprimer la dernière table</button>
  <div id="tables-container"></div>
  <p>Nombre total de tables: <span id="total-tables">0</span></p>
</body>
<?php 
    include_once 'footer.php';
?>