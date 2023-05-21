<?php
include_once 'indexx.php';
function secteur(){

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
function CreateSecteur($nom){
    $sql = "INSERT INTO Secteur(nom)Values('$nom')";
    bdd()->query($sql);
    return bdd()->insert_id;
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

function ReadAllSecteurs() {
    $sql = "SELECT * FROM secteur";
    $result = bdd()->query($sql);

    $return = array();

    while($row = $result->fetch_assoc()) {
        $return[] = $row;
    }

    return $return;
}


function CreateTables($nb_place,$secteur){
    $sql = "INSERT INTO Tables(nb_place,id_secteur)Values('$nb_place','$secteur')";
    bdd()->query($sql);
    return bdd()->insert_id;
}

function DeleteTable($id){
    $sql="DELETE FROM Tables WHERE id='$id'";
    bdd()->query($sql);
}

function DeleteTablesSecteur($id_secteur) {
    $sql = "DELETE FROM tables WHERE id_secteur = $id_secteur";
    bdd()->query($sql);
}


function ReadTable($id){
    $sql = "SELECT * from Tables where id = $id ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


function ReadAllTables($id_secteur) {
    $sql = "SELECT * FROM tables WHERE id_secteur = $id_secteur";
    $result = bdd()->query($sql);

    $return = array();

    while($row = $result->fetch_assoc()) {
        $return[] = $row;
    }

    return $return;
}

function UpdateTable($id,$nb_place,$secteur){
    $sql = "UPDATE Tables SET nb_place='$nb_place',emplacement='$secteur' where id = '$id'";
    bdd()->query($sql);
}

function UpdateNbPlacesTable($id_table, $nb_places) {
    $sql = "UPDATE Tables SET nb_place = $nb_places where id = $id_table";
    bdd()->query($sql); 
}
?>