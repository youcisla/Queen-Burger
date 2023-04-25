<?php
include 'indexx.php';
function CreateTable(){
    $sql="CREATE TABLE IF NOT EXISTS Personne(
        id INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(100) NOT NULL UNIQUE,
        prenom VARCHAR(100) NOT NULL ,
        telephone VARCHAR(13) NOT NULL ,
        CONSTRAINT pk_id PRIMARY KEY (id))";
bdd()->query($sql);

}
function CreatePersonne($nom,$prenom,$telephone){
    $sql = "INSERT INTO Personne(nom,prenom,telephone)Values('$nom','$prenom','$telephone')";
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
function UpdatePersonne($id,$nom,$prenom,$telephone){
    $sql = "UPDATE Personne SET
    nom='$nom',prenom='$prenom',telephone='$telephone' where id = '$id'";
    bdd()->query($sql);
   
}
function iDPersonne($nom,$prenom){
    $sql = "SELECT id from Personne where nom = '$nom' AND prenom ='$prenom' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
?>