<?php
class Voter {
    public  function  __construct(){
        $this->bdd = bdd();
    }


// Create

    public function voterSave($dateVote ,$candidat_id,$nom,$dial_phone,$phone,$an){
        $ip   = $_SERVER['REMOTE_ADDR'];
        $query = "INSERT INTO voter(date_vote,candidat_id ,nom_votant,dial_votant,phone_votant,an,ip)
            VALUES (:dateVote,:candidat_id,:nom,:dial_phone,:phone,:an,:ip)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateVote" => $dateVote,
            "candidat_id" => $candidat_id,
            "nom" => $nom,
            "dial_phone" => $dial_phone,
            "phone" => $phone,
            "an" => $an,
            "ip" => $ip
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    public function voterAdd($dateVote ,$id_candidat){
        $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
        $query = "INSERT INTO voter(date_vote,ip ,id_candidat)
            VALUES (:dateVote,:ip,:id_candidat)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateVote" => $dateVote,
            "ip" => $ip,
            "id_candidat" => $id_candidat
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }
    // Read



    public function getVoterByPhone($phone){

        $query = "SELECT * FROM voter
        WHERE phone_votant = :phone";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "phone" => $phone
        ));

        return $rs;
    }

    public function getVoterByIp($id){

        $query = "SELECT * FROM voter
        WHERE ip = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }


    public function getAllvoters(){
        $query = "SELECT * FROM voter
          ORDER BY id_voter DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getAllVote(){
        $query = "SELECT * FROM voter";
        $rs = $this->bdd->query($query);

        return $rs;
    }


    //Count
    public function getNbrVoteByCandidat($id){
        $query = "SELECT COUNT(*) as nb FROM voter
                  WHERE candidat_id =:id AND an = 23";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getNbrVote(){
        $query = "SELECT COUNT(*) as nb FROM voter
                  WHERE an = 23";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    // Verification valeur existant
    public function verifUtilisateur($propriete,$val){

        $query = "SELECT * FROM admin WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}
// Instance

$voter = new Voter();