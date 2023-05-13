<?php
include_once 'indexx.php';
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
function CreatePersonne($nom,$prenom,$telephone,$mail){
    $sql = "INSERT INTO Personne(nom,prenom,telephone,mail)Values('$nom','$prenom','$telephone','$mail')";
    bdd()->query($sql);
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
function UpdatePersonne($id,$nom,$prenom,$telephone,$mail){
    $sql = "UPDATE Personne SET
    nom='$nom',prenom='$prenom',telephone='$telephone',mail=$mail where id = '$id'";
    bdd()->query($sql);
   
}
function iDPersonne($nom,$prenom){
    $sql = "SELECT id from Personne where nom = '$nom' AND prenom ='$prenom' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
?>