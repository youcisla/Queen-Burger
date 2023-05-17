<?php
// La base de donnée
include_once 'indexx.php';
include_once 'Personne.php';
include_once 'Secteur.php';
function serveur(){

    $sql1="CREATE TABLE IF NOT EXISTS Serveur(
        id INT NOT NULL AUTO_INCREMENT,
        login VARCHAR(100) NOT NULL UNIQUE,
        mot_de_passe VARCHAR(100) NOT NULL ,
        information INT NOT NULL,
        CONSTRAINT pk_id PRIMARY KEY (id),
        FOREIGN KEY(information) REFERENCES Personne(id))";
    
    $sql2="CREATE TABLE IF NOT EXISTS Secteur_Heure(
        id INT NOT NULL,
        id_serveur INT NOT NULL,
        id_crenaux INT NOT NULL,
        secteur INT NOT NULL,
        FOREIGN KEY(id_serveur) REFERENCES Serveur(id),
        FOREIGN KEY(secteur) REFERENCES Secteur(id),
        FOREIGN KEY(id_crenaux) REFERENCES Creneaux(id),
        PRIMARY KEY (id))";

        bdd()->query($sql1);
        bdd()->query($sql2);
}
//creer un serveur

function CreateServeur($login,$id_personne){
    $sql = "INSERT INTO Serveur (login, id_personne) VALUES ('$login', '$id_personne')";
    bdd()->query($sql);
    return bdd()->insert_id;
}

function ReadServeur($id){
    $sql = "SELECT * from Serveur where id = '$id' ";
    $result=bdd()->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function UpdateServeur($id,$login,$mot_de_passe){
    $sql="UPDATE Serveur SET login='$login',
    mot_de_passe='$mot_de_passe'
    WHERE id='$id'";
    bdd()->query($sql);
}
function DeleteServeur($id){
    $sql="DELETE FROM Serveur WHERE id='$id'";
    bdd()->query($sql);
}
function CreateSecteur_Heure($id_serveur,$id_crenaux,$secteur){
    $sql="INSERT INTO Secteur_Heure (id_serveur,id_crenaux,secteur)VALUES ('$id_serveur','$id_crenaux','$secteur')";
    bdd()->query($sql);
}
function ReadSecteur_Heure($id){
    $sql = "SELECT h.hdebut,h.hfin,h.date,h.secteur,p.nom,p.prenom from Horraire_Serveur AS hs JOIN Creneaux AS h ON h.id= hs.id_crenaux 
    JOIN Serveur AS s ON s.id=hs.id_serveur JOIN Personne AS p ON s.id=p.information where id_serveur = '$id' ";
    $result = bdd()->query($sql);
		while ( $row = $result->fetch_assoc() ) {
            $datas[]=array($row["nom"],$row["prenom"],$row["secteur"],$row["date"],$row["hdebut"],$row["hfin"]);
        }
        return $datas;
}
//zebi
function DeleteSecteur_Heure($id){
    $sql="DELETE FROM Secteur_Heure WHERE id='$id'";
    bdd()->query($sql);
}


function GetInformationServeur($id_serveur) {
    $sql = "SELECT personne.mail, personne.prenom, personne.nom, personne.telephone, serveur.login FROM serveur WHERE {$id_serveur} = serveur.id
    INNER JOIN personne ON personne.id = serveur.information";

    $result = bdd()->query($sql);

    return $result->fetch_assoc();

}






?>