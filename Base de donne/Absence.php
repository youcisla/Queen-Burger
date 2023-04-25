<?php
include 'indexx.php';
include 'Personne.php';
function CreateTable(){


    $sql1="CREATE TABLE IF NOT EXISTS Absence(
        id INT NOT NULL AUTO_INCREMENT,
        dateDebut DATE,
        dateFin DATE,
        personne INT NOT NULL,
        CONSTRAINT pk_id PRIMARY KEY (id),
        FOREIGN KEY(personne) REFERENCES Personne(id))";
        bdd()->query($sql1);
    }
    function CreateAbsence($dateDebut,$dateFin,$personne){
        $sql = "INSERT INTO Absence(dateDebut,dateFin,personne)Values('$dateDebut','$dateFin','$personne')";
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