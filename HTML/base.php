<?php
include_once "HTML/header.php";
?>
<form action="." method="post">
    <div class="container">
        <div class="card">
            Queen Burger
            <div class="cardBody">
                Choose Your Menu
            </div>
        </div>
    </div>
</form>
<div id="tables-container">
  <h2>Tables</h2>
  <p>Total : <span id="total-tables"></span></p>
  <button onclick="ajouterTable()">Ajouter une table</button>
  <button onclick="supprimerTable()">Supprimer une table</button>
</div>

<?php
include_once "HTML/footer.php";
?>