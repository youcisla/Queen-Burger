<?php
include 'indexx.php';
function CreateTable(){


    $sql1="CREATE TABLE IF NOT EXISTS Creneaux(
        id INT NOT NULL AUTO_INCREMENT,
        hdebut TIME,
        hfin TIME,
        date DATE ,
        CONSTRAINT pk_id PRIMARY KEY (id))";
        bdd()->query($sql1);
    }

    function CreateCreneaux($hdebut,$hfin,$date){
        $sql = "INSERT INTO Creneaux(hdebut,hfin,date)Values('$hdebut','$hfin','$date')";
        bdd()->query($sql);
    }
    function DeleteCreneaux($id){
        $sql="DELETE FROM Creneaux WHERE id='$id'";
        bdd()->query($sql);
    }
    function ReadCreneaux($id){
        $sql = "SELECT * from Creneaux where id = '$id' ";
        $result=bdd()->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    function UpdateCreneaux($id,$hdebut,$hfin,$date){
        $sql = "UPDATE Creneaux SET
        nhdebut='$hdebut',hfin='$hfin',date='$date' where id = '$id'";
        bdd()->query($sql);
       
    }





?>