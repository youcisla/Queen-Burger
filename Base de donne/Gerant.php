<?php
include 'indexx.php';
include 'Personne.php';
function CreateTable(){


    $sql1="CREATE TABLE IF NOT EXISTS Gerant(
        id INT NOT NULL AUTO_INCREMENT,
        login VARCHAR(100) NOT NULL UNIQUE,
        mot_de_passe VARCHAR(100) NOT NULL ,
        information INT NOT NULL,
        CONSTRAINT pk_id PRIMARY KEY (id),
        FOREIGN KEY (information) REFERENCES Personne(id))";
        bdd()->query($sql1);
    }
    function CreateGerant($login,$mot_de_passe,$information){
        $sql = "INSERT INTO Gerant (login, mot_de_passe, information) 
                        VALUES ('$login', '$mot_de_passe', '$information')";
                        bdd()->query($sql);
    }
    
    function ReadGerant($id){
        $sql = "SELECT * from Gerant where id = '$id' ";
        $result=bdd()->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    function UpdateGerant($id,$login,$mot_de_passe){
        $sql="UPDATE Gerant SET login='$login',
        mot_de_passe='$mot_de_passe'
        WHERE id='$id'";
        bdd()->query($sql);
    }
    function DeleteGerant($id){
        $sql="DELETE FROM Gerant WHERE id='$id'";
        bdd()->query($sql);
    }




?>