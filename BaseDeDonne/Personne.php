<?php
include_once 'indexx.php';
//focnrtion non mise a jour :(
function personne(){
    $sql="CREATE TABLE IF NOT EXISTS Personne(
        id INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(100) NOT NULL UNIQUE,
        prenom VARCHAR(100) NOT NULL ,
        telephone VARCHAR(13) NOT NULL ,
        mail VARCHAR(250),
        CONSTRAINT pk_id PRIMARY KEY (id))";
bdd()->query($sql);

}
function CreatePersonne($nom,$prenom,$telephone,$mail,$mot_de_passe){
    $sql = "INSERT INTO Personne(nom,prenom,telephone,mail,mot_de_passe)Values('$nom','$prenom','$telephone','$mail','$mot_de_passe')";
    bdd()->query($sql);
    return bdd()->insert_id;
}
function DeletePersonne($id){
    $sql="DELETE FROM Personne WHERE id='$id'";
    bdd()->query($sql);
}
function ReadPersonne($id){
    $sql = "SELECT * from Personne where id = '$id'";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
function UpdatePersonne($id,$nom,$prenom,$telephone,$mail,$mot_de_passe){
    $sql = "UPDATE Personne SET
    nom='$nom',prenom='$prenom',telephone='$telephone',mail='$mail' where id = '$id'";
    bdd()->query($sql);
   
}
function iDPersonne($nom,$prenom){
    $sql = "SELECT id from Personne where nom = '$nom' AND prenom ='$prenom' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

/* retourne un entier corespondant a un role
  - 1 : gerant
  - 2 : cuisinier
  - 3 : serveur
  - 4 : client  
  - 0 : pas trouvé dans la base de donné
*/
function obtenirRolePersonne($id_personne) {
    $sql1 = "SELECT * FROM gerant WHERE id_personne = {$id_personne}";
    $result1 = bdd()->query($sql1);
    if ($result1->num_rows > 0) {
        return 1;
    }

    $sql2 = "SELECT * FROM cuisinier WHERE id_personne = {$id_personne}";
    $result2 = bdd()->query($sql2);
    if ($result2->num_rows > 0) {
        return 2;
    }

    $sql3 = "SELECT * FROM serveur WHERE id_personne = {$id_personne}";
    $result3 = bdd()->query($sql3);
    if ($result3->num_rows > 0) {
        return 3;
    }

    $sql4 = "SELECT * FROM client WHERE id_personne = {$id_personne}";
    $result4 = bdd()->query($sql4);
    if ($result4->num_rows > 0) {
        return 4;
    }

    return 0;
}




?>