<?php
class Membre {
    public  function  __construct(){
        $this->bdd = bdd();
    }


    public function addMmebreReunion($date_mb,$nom,$prenom,$email,$phone,$ville){
        $query = "INSERT INTO reunion(date_reunion,nom,prenom,email,phone,ville)
            VALUES (:date_mb,:nom,:prenom,:email,:phone,:ville)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_mb" => $date_mb,
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "phone" => $phone,
            "ville" => $ville
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

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

    public function addMmebres($date_mb,$nom,$prenom,$slug,$phone,$isoPhone,$dialPhone,$ville,$pwd,$photo,$piece){
        $query = "INSERT INTO membre(date_membre,nom,prenom,slug,phone,iso_phone,dial_phone,ville,mot_de_passe,photo,piece)
            VALUES (:date_mb,:nom,:prenom,:slug,:phone,:isoPhone,:dialPhone,:ville,:pwd,:photo,:piece)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_mb" => $date_mb,
            "nom" => $nom,
            "prenom" => $prenom,
            "slug" => $slug,
            "phone" => $phone,
            "isoPhone" => $isoPhone,
            "dialPhone" => $dialPhone,
            "ville" => $ville,
            "pwd" => $pwd,
            "photo" => $photo,
            "piece" => $piece
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    public function getMembreByPhone($phone){

        $query = "SELECT * FROM membre
        WHERE phone = :phone";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "phone" => $phone
        ));

        return $rs;
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

    //Count

    public function nbrMmembre(){
        $query = "SELECT COUNT(*) as nb FROM membre";
        $rs = $this->bdd->query($query);
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


    public function getData2($propriete1,$val1,$propriete2,$val2){

        $query = "SELECT * FROM membre WHERE $propriete1 = :val1 and $propriete2 = :val2";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2
        ));

        return $rs;
    }

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