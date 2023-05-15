<?php
include_once 'indexx.php';
include_once 'Personne.php';

function absence(){
    $sql1="CREATE TABLE IF NOT EXISTS Absence(
    id INT NOT NULL AUTO_INCREMENT,
    dateDebut DATE,
    dateFin DATE,
    id_serveur INT NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY (id),
    FOREIGN KEY(id_serveur) REFERENCES id_serveur(id))";
    bdd()->query($sql1);
}

function CreateAbsence($dateDebut,$dateFin,$id_serveur){
    $sql = "INSERT INTO Absence(dateDebut,dateFin,id_serveur)Values('$dateDebut','$dateFin','$id_serveur')";
    bdd()->query($sql);
}

function DeleteAbsence($id){
    $sql="DELETE FROM Absence WHERE id='$id'";
    bdd()->query($sql);
}

function ReadAbsence($id){
    $sql = "SELECT * from Absence where id = '$id' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function UpdateAbsence($id,$dateDebut,$dateFin){
    $sql = "UPDATE Absence SET
    dateDebut='$dateDebut',dateFin='$dateFin'where id = '$id'";
    bdd()->query($sql);
    
}



?>