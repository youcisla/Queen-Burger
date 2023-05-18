<!DOCTYPE html>

<?php 
include_once '../BaseDeDonne/Personne.php';  
include_once "../PHP/verificationConnexion.php";
//redirectionConnexion([1,2], "base.php");
?>
<h1> Page gerant </h1>

<?php 
afficheRole("serveur");
afficheRole("cuisinier");
afficheRole("client");
afficheRole("gerant");
 ?>

</table>
