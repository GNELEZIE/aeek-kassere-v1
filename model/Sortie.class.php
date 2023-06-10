<?php
class Sortie {
    public  function  __construct(){
        $this->bdd = bdd();
    }


// Create

//Table caofa

    public function addCAOFA($date_caofa,$nom,$phone,$niveau,$message){
        $query = "INSERT INTO caofa(date_caofa,nom,phone,niveau,message)
            VALUES (:date_caofa,:nom,:phone,:niveau,:message)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_caofa" => $date_caofa,
            "nom" => $nom,
            "phone" => $phone,
            "niveau" => $niveau,
            "message" => $message
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    public function verifCaofa($propriete,$val){

        $query = "SELECT * FROM caofa WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }














    public function addSortie($dateSortie,$nom,$phone,$mbre){
        $query = "INSERT INTO sortie(date_sortie,nom,phone,membre)
            VALUES (:dateSortie,:nom,:phone,:mbre)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateSortie" => $dateSortie,
            "nom" => $nom,
            "phone" => $phone,
            "mbre" => $mbre
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }
    // Read




    //Count
    public function getNbrSortie(){
        $query = "SELECT COUNT(*) as nb FROM sortie";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    // Verification valeur existant
    public function verifInscrit($propriete,$val){

        $query = "SELECT * FROM sortie WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }



}
// Instance

$sortie = new Sortie();