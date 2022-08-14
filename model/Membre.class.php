<?php
class Membre {
    public  function  __construct(){
        $this->bdd = bdd();
    }


    // Read


    public function addMmebre($date_mb,$nom,$prenom,$slug,$email,$mot_de_passe){
        $query = "INSERT INTO membre(date_membre,nom,prenom,slug,email,mot_de_passe)
            VALUES (:date_mb,:nom,:prenom,:slug,:email,:mot_de_passe)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_mb" => $date_mb,
            "nom" => $nom,
            "prenom" => $prenom,
            "slug" => $slug,
            "email" => $email,
            "mot_de_passe" => $mot_de_passe
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    public function getMembreByEmail($mail){

        $query = "SELECT * FROM membre
        WHERE email = :mail";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "mail" => $mail
        ));

        return $rs;
    }
  public function getMmembreById($id){

        $query = "SELECT * FROM membre
        WHERE id_membre = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

//Update

    // Update MP
    public function updatePassword($password,$id){
        $query = "UPDATE membre
            SET mot_de_passe = :password WHERE id_membre = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "password" => $password,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }
    public function updateMembrePhoto($photo,$id){
        $query = "UPDATE membre
            SET photo = :photo
            WHERE id_membre = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "photo" => $photo,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }
    // Verification valeur existant
    public function verifMembre($propriete,$val){

        $query = "SELECT * FROM membre WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}
// Instance

$membre = new Membre();