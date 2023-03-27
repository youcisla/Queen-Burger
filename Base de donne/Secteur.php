<?php
include 'index.php';
function CreateTable(){

    $sql1="CREATE TABLE IF NOT EXISTS Secteur(
        id INT NOT NULL AUTO_INCREMENT,
        CONSTRAINT pk_id PRIMARY KEY (id))";
    $sql2="CREATE TABLE IF NOT EXISTS Tables(
        id INT NOT NULL AUTO_INCREMENT,
        nb_place INT NOT NULL DEFAULT 4,
        emplacement INT NOT NULL,
        CONSTRAINT pk_id PRIMARY KEY (id),
        FOREIGN KEY(emplacement) REFERENCES Secteur(id))";
        bdd()->query($sql1);
        bdd()->query($sql2);



}
function CreateSecteur(){
    $sql = "INSERT INTO Secteur()Values()";
    bdd()->query($sql);

}
function DeleteSecteur($id){
    $sql="DELETE FROM Secteur WHERE id='$id'";
    bdd()->query($sql);
}
function ReadSecteur($id){
    $sql = "SELECT * from Secteur where id = '$id' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function CreateTables($nb_place,$secteur){
    $sql = "INSERT INTO Tables(nb_place,emplacement)Values('$nb_place','$secteur')";
    bdd()->query($sql);
}
function DeleteTables($id){
    $sql="DELETE FROM Tables WHERE id='$id'";
    bdd()->query($sql);
}
function ReadTables($id){
    $sql = "SELECT * from Tables where id = '$id' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
function UpdateTables($id,$nb_place,$secteur){
    $sql = "UPDATE Tables SET
    nb_place='$nb_place',emplacement='$secteur' where id = '$id'";
    bdd()->query($sql);
   
}
?>