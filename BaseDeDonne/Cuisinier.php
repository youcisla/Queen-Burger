<?php
include_once 'indexx.php';
include_once 'Personne.php';
function Cuisinier(){


    $sql1="CREATE TABLE IF NOT EXISTS Cuisinier(
        id INT NOT NULL AUTO_INCREMENT,
        login VARCHAR(100) NOT NULL UNIQUE,
        mot_de_passe VARCHAR(100) NOT NULL ,
        information INT NOT NULL,
        CONSTRAINT pk_id PRIMARY KEY (id),
        FOREIGN KEY (information) REFERENCES Personne(id))";


        bdd()->query($sql1);
    }
    function CreateCuisinier($login,$mot_de_passe,$information){
        $sql = "INSERT INTO Cuisinier (login, mot_de_passe, information) 
                        VALUES ('$login', '$mot_de_passe', '$information')";
                        bdd()->query($sql);
    }
    
    function ReadCuisinier($id){
        $sql = "SELECT * from Cuisinier where id = '$id' ";
        $result=bdd()->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    function UpdateCuisinier($id,$login,$mot_de_passe){
        $sql="UPDATE Cuisinier SET login='$login',
        mot_de_passe='$mot_de_passe'
        WHERE id='$id'";
        bdd()->query($sql);
    }
    function DeleteGerant($id){
        $sql="DELETE FROM Cuisinier WHERE id='$id'";
        bdd()->query($sql);
    }


    function GetAllCuisinierMail() {
        $sql = "SELECT login FROM Cuisinier";

        $return = array();
        $result = bdd()->query($sql);
        while($row =  $result->fetch_assoc()) {
            $return[] = $row["login"];
        }



        return $return;
    }


?>